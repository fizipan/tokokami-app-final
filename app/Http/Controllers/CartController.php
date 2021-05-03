<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Courier;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::with('product.galleries')->where('users_id', Auth::user()->id)->where('selected', 1)->get();
        $saveProducts = Cart::with('product.galleries')->where('users_id', Auth::user()->id)->where('selected', 0)->get();
        $productRandom = Product::with('galleries')->where('stock', '>', 0)->inRandomOrder()->take(8)->get();
        return view('pages.cart', compact(['carts', 'saveProducts', 'productRandom']));
    }

    public function update(Request $request)
    {
        $cart = Cart::findOrFail($request->id);

        $data = $request->all();
        
        $cart->update($data);
    }

    public function delete($id)
    {
        $cart = Cart::findOrFail($id);

        $cart->delete();
        return redirect()->back()
                        ->with('success', '1 Item Berhasil Di Hapus');
    }

    public function save($id)
    {
        $cart = Cart::findOrFail($id);

        $cart->update([
            'selected' => false,
        ]);
        
        return redirect()->back()
                        ->with('success', '1 Item Berhasil Di Simpan');
    }

    public function move($id)
    {
        $cart = Cart::findOrFail($id);

        $cart->update([
            'selected' => true,
        ]);

        return redirect()->back()
                        ->with('success', '1 Item Berhasil Di Pindahkan Ke Keranjang');
    }

    public function shipment()
    {
        $carts = Cart::with('product.galleries')->where('users_id', Auth::user()->id)->where('selected', 1)->get();
        if ($carts->count() > 0) {
            $user = Auth::user();
            $provinces = Province::all();
            $payments = Payment::all();
            $couriers = Courier::all();
            return view('pages.shipment', compact('carts', 'user', 'provinces', 'payments', 'couriers'));
        } else {
            return redirect()->route('cart')
                        ->with('error', 'Barang belanja kamu kosong nih. Yuk isi Keranjangmu!.');
        }
    }
}
