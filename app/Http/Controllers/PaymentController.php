<?php

namespace App\Http\Controllers;

use App\Models\MyLibrary;
use Illuminate\Http\Request;
use App\Models\PayPalTransactions;
use Illuminate\Support\Facades\Auth;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaymentController extends Controller
{
    public function handlePayment(Request $request)
    {
        //dd($request->referencia);
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('success.payment'),
                "cancel_url" => route('cancel.payment'),
            ],
            "purchase_units" => [
                0 => [
                    "reference_id" => $request->referencia,
                    "description" => $request->description,
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $request->amount
                    ]
                ]
            ]
        ]);
        if (isset($response['id']) && $response['id'] != null) {
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }
            return redirect()
                ->route('cancel.payment')
                ->with('error', 'Something went wrong.');
        } else {
            return redirect()
                ->route('create.payment')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    public function paymentCancel()
    {
        /* return redirect()
            ->route('create.payment')
            ->with('error', $response['message'] ?? 'You have canceled the transaction.'); */
    }

    public function paymentSuccess(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
        $respuesta = $response['purchase_units'][0]['reference_id'];
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            
            $explode_id = explode('-', $respuesta);

            $book_id = $explode_id[2];

            //dd($book_id);

            $trasaccion = $this->saveTransaccion($response);
            $myPayBookToLibrary = array([
                "book_id" => $book_id,
                "user_id" => Auth::user()->id,
                "created_at" => now(),
                "updated_at" => now()
            ]);
            $saveToMyLinrary = MyLibrary::insert($myPayBookToLibrary);
            return redirect()
                ->route('my-library')
                ->with('success', "Transaction complete. $respuesta");
        } else {
            return redirect()
                ->route('my-library')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    public function saveTransaccion($response)
    {
        $thisResponse = json_encode($response);
        $explode_id = explode('-', $response['purchase_units'][0]['reference_id']);
        $book_id = $explode_id[2];
        $comisionTP = OperationServicesController::comisionTP($response['purchase_units'][0]['payments']['captures'][0]['seller_receivable_breakdown']['net_amount']['value'], 10);
        $netAmountAutor = $response['purchase_units'][0]['payments']['captures'][0]['seller_receivable_breakdown']['net_amount']['value'] - $comisionTP;
        $transaction = array([
            "pp_transaction_id" => $response['id'],
            "pp_status" => $response['status'],
            "cu_email_address" => $response['payment_source']['paypal']['email_address'],
            "cu_account_id" => $response['payment_source']['paypal']['account_id'],
            "cu_name" => $response['payment_source']['paypal']['name']['given_name'] . " " . $response['payment_source']['paypal']['name']['surname'],
            "tp_reference_id" => $response['purchase_units'][0]['reference_id'],
            "pp_payments_id" => $response['purchase_units'][0]['payments']['captures'][0]['id'],
            "pp_payments_status" => $response['purchase_units'][0]['payments']['captures'][0]['status'],
            "pp_payments_amount" => $response['purchase_units'][0]['payments']['captures'][0]['amount']['value'],
            "pp_payments_currency_code" => $response['purchase_units'][0]['payments']['captures'][0]['amount']['currency_code'],
            "pp_payments_paypal_fee" => $response['purchase_units'][0]['payments']['captures'][0]['seller_receivable_breakdown']['paypal_fee']['value'],
            "pp_payments_net_amount" => $response['purchase_units'][0]['payments']['captures'][0]['seller_receivable_breakdown']['net_amount']['value'],
            "pp_payments_create_time" => $response['purchase_units'][0]['payments']['captures'][0]['create_time'],
            "pp_payments_update_time" => $response['purchase_units'][0]['payments']['captures'][0]['update_time'],
            "pp_response" => $thisResponse,
            "created_at" => now(),
            "updated_at" => now(),
            "book_id" => $book_id,
            "tp_comision" => $comisionTP,
            "tp_autor_net_amount" => $netAmountAutor
        ]);
        $save = PayPalTransactions::insert($transaction);
        return $save;
    }
}
