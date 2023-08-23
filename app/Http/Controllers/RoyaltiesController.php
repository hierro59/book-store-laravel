<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Books;
use Illuminate\Http\Request;
use App\Models\PayPalTransactions;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RoyaltiesController extends Controller
{
    public function index()
    {
        if (Auth::user()->roles[0]->name == 'autor') {
            $allRoyalties = $this->autorRoyalties(Auth::user()->id);
            $salesHistory = $this->salesHistory(Auth::user()->id);
            
            return view('royalties.index', compact('allRoyalties', 'salesHistory'));
        } else {
            $allRoyalties = $this->allRoyalties();
            $salesHistory = $this->salesHistory();

            $autors = DB::table('model_has_roles')->where('role_id', '=', 4)->get();
            $autores = [];
            for ($i=0; $i < count($autors); $i++) { 
                $findAutor = User::find($autors[$i]->model_id);
                $datos = [
                    'autor_id' => $findAutor->id,
                    'autor_name' => $findAutor->name
                ];
                array_push($autores, $datos);
            }

            return view('royalties.index', compact('allRoyalties', 'salesHistory', 'autores'));
        }
        
        
    }

    static function autorRoyalties($id)
    {
        $total = PayPalTransactions::where('pp_payments_status', '=', 'COMPLETED')
                                    ->where('autor_id', '=', $id)
                                    ->sum('tp_autor_net_amount');
        
        $allSales = PayPalTransactions::where('pp_payments_status', '=', 'COMPLETED')
                                        ->where('autor_id', '=', $id)
                                        ->get();
        $countSales = count($allSales);

        $royalties = [
            'total_sales' => $countSales,
            'total_royalties' => $total
        ];

        $sales = PayPalTransactions::where('pp_payments_status', '=', 'COMPLETED')->get();

        return $royalties;
    }

    static function allRoyalties()
    {
        $allSales = PayPalTransactions::where('pp_payments_status', '=', 'COMPLETED')->get();
        $countSales = count($allSales);

        $total = PayPalTransactions::where('pp_payments_status', '=', 'COMPLETED')->sum('pp_payments_net_amount');

        $royalties = [
            'total_sales' => $countSales,
            'total_royalties' => $total
        ];

        return $royalties;
    }

    static function salesHistory($id = NULL)
    {
        if ($id) {
            $allSales = PayPalTransactions::where('pp_payments_status', '=', 'COMPLETED')
                                        ->where('autor_id', '=', $id)
                                        ->get();
        } else {
            $allSales = PayPalTransactions::where('pp_payments_status', '=', 'COMPLETED')->get();
        }
        $sales = [];
        for ($i=0; $i < count($allSales); $i++) { 
            $book = Books::find($allSales[$i]['book_id']);
            $data = [
                'book_id' => $allSales[$i]['book_id'],
                'fecha' => date('d-m-Y', strtotime($allSales[$i]['created_at'])),
                'obra' => (isset($book->name) ? $book->name : 'Sin nombre'),
                'metodo' => 'PayPal',
                'valor_neto' => $allSales[$i]['pp_payments_amount'],
                'comision_pasarela' => $allSales[$i]['pp_payments_paypal_fee'],
                'impuesto' => '0',
                'comision_tp' => $allSales[$i]['tp_comision'],
                'neto_autor' => $allSales[$i]['tp_autor_net_amount']
            ];
            array_push($sales, $data);
        }
        return $sales;
    }

    public function pay(Request $request)
    {
        
    }
}
