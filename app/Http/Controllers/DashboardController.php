<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;
use App\Models\PayPalTransactions;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->roles[0]->name == 'autor') {
            $allRoyalties = $this->autorRoyalties(Auth::user()->id);
        } else {
            $allRoyalties = $this->allRoyalties();
        }

        return view('dashboard', compact('allRoyalties'));
    }

    static function autorRoyalties($id)
    {
        $data = PayPalTransactions::all();

        $autorBooks = Books::where('autor_id', '=', $id)->where('status', '=', 1)->get();
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
}
