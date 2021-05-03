<?php

namespace App\Http\Controllers;

use App\Models\AccountNumber;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{   
    public function index()
    {
        $orders = Transaction::latest()->with(['transaction_details.product.galleries', 'payment'])
                                ->where('users_id', Auth::user()->id)
                                ->get();
        return view('pages.order', compact('orders'));
    }

    public function getPayment(Request $request)
    {
        return AccountNumber::with('payment')->where('payments_id', $request->id)->get();
    }

    public function getDetail(Request $request)
    {
        return Transaction::with(['transaction_details.product.galleries', 'user.regency', 'user.province', 'payment'])->where('id', $request->id)->get();
    }
}
