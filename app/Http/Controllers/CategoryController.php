<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $productCount = Product::count();
        $products = Product::with(['galleries', 'category'])->where('stock', '>', 0)->latest()->take(8)->get();
        return view('pages.category', [
            'categories' => $categories,
            'products' => $products,
            'productCount' => $productCount,
        ]);
    }

    public function show($slug)
    {
        $categories = Category::all();
        $categoryDetail = Category::where('slug', $slug)->firstOrFail();
        $products = Product::with(['galleries', 'category'])->where('stock', '>', 0)->where('categories_id', $categoryDetail->id)->get();
        return view('pages.category', [
            'products' => $products,
            'categoryDetail' => $categoryDetail,
            'categories' => $categories,
        ]);
        
    }

    public function more()
    {
        $result = request('skip');
        return Product::with(['galleries', 'category'])->where('stock', '>', 0)->latest()->skip(intval($result))->take(intval($result))->get();

    }
}
