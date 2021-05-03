<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShipmentRequest;
use App\Models\AccountNumber;
use App\Models\Cart;
use App\Models\Courier;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class CheckoutController extends Controller
{
    public function process(ShipmentRequest $request)
    {
        $data = $request->except(['total_price', 'couriers_id', 'payments_id']);
        Auth::user()->update($data);

        $courier = Courier::where('code', $request->couriers_id)->firstOrFail();

        $process = RajaOngkir::ongkosKirim([
            'origin'        => 151,     
            'destination'   => $request->regencies_id,      
            'weight'        => 800,    
            'courier'       => $request->couriers_id,    
        ])->get();

        $shipping_price = $process[0]['costs'][0]['cost'][0]['value'];

        $code = mt_rand(00000, 99999);
        $carts = Cart::with('product')->where('users_id', Auth::user()->id)->where('selected', 1)->get();

        $transaction = Transaction::create([
            'code' => $code,
            'users_id' => Auth::user()->id,
            'payments_id' => $request->payments_id,
            'couriers_id' => $courier->id,
            'shipping_price' => $shipping_price,
            'total_price' => $request->total_price,
            'transaction_status' => 'PENDING',
            'shipping_status' => 'PENDING',
            'resi' => null,
        ]);

        foreach ($carts as $cart) {
            TransactionDetail::create([
                'transactions_id' => $transaction->id,
                'products_id' => $cart->products_id,
                'product_price' => $cart->product->price,
                'amount' => $cart->amount,
                'subtotal' => $cart->subtotal,
            ]);
        }

        Cart::where('users_id', Auth::user()->id)->delete();

        return redirect()->route('checkout-success', $transaction->code)
                            ->with('success', 'Selamat Checkout Anda Berhasil, Silahkan Lanjut Untuk Bayar Pesanan!');

    }

    public function success(Request $request, $code)
    {
        $transaction = Transaction::with(['user.province', 'user.regency', 'courier', 'transaction_details.product.galleries'])->where('code', $code)->firstOrFail();
        $accounts = AccountNumber::with('payment')->where('payments_id', $transaction->payments_id)->take(2)->get();
        return view('pages.checkout-success', compact('transaction', 'accounts'));
    }
}
