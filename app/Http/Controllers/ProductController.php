<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index($slug)
    {
        $product = Product::with(['galleries', 'category'])->where('slug', $slug)->firstOrFail();
        $productsRelated = Product::with(['galleries', 'category'])->where('stock', '>', 0)->where('categories_id', $product->categories_id)->whereKeyNot($product->id)->get();
        return view('pages.product', [
            'product' => $product,
            'productsRelated' => $productsRelated,
        ]);
    }

    public function add($id)
    {
        $check = Cart::checkProductAvailable($id);
        if ($check == 'available') {
            return redirect()->route('cart')
                            ->with('error', 'Opps!, Produk Sudah Ada Di Keranjang Anda');
        } else {
            $product = Product::findOrFail($id);
            $data = [
                'users_id' => Auth::user()->id,
                'products_id' => $product->id,
                'amount' => 1,
                'subtotal' => $product->price,
                'selected' => true,
            ];
            
            Cart::create($data);
    
            return redirect()->route('cart')
                                ->with('success', '1 Item Berhasil Ditambahkan Ke Keranjang');
        }

    }
}
