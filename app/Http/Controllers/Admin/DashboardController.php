<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $customer = User::count();
        $totalPrice = Transaction::where('transaction_status', 'SUCCESS')->sum('total_price');
        $shippingPrice = Transaction::where('transaction_status', 'SUCCESS')->sum('shipping_price');
        $revenue = $totalPrice + $shippingPrice;
        $transaction = Transaction::count();
        return view('pages.admin.dashboard', [
            'customer' => $customer,
            'revenue' => $revenue,
            'transaction' => $transaction,
        ]);
    }
}
