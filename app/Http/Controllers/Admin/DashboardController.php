<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TransactionExport;

class DashboardController extends Controller
{
    public function index()
    {
        $customer = User::count();
        $totalPrice = Transaction::where('transaction_status', 'PAID')->sum('total_price');
        $shippingPrice = Transaction::where('transaction_status', 'PAID')->sum('shipping_price');
        $revenue = $totalPrice + $shippingPrice;
        $transaction = Transaction::count();
        $recents = Transaction::latest()->take(3)->get();
        return view('pages.admin.dashboard', [
            'customer' => $customer,
            'revenue' => $revenue,
            'transaction' => $transaction,
            'recents' => $recents,
        ]);
    }

    public function export()
    {
        return Excel::download(new TransactionExport, 'transactions.xlsx');
    }
}
