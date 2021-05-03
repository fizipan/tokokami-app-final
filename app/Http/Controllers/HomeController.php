<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $newProducts = Product::with(['galleries', 'category'])->where('stock', '>', 0)->latest()->take(8)->get();
        return view('pages.home', [
            'newProducts' => $newProducts,
        ]);
    }
}
