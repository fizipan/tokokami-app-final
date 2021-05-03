<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        if ($request->keyword && $request->category) {
            $category = Category::where('slug', $request->category)->firstOrFail();
            $products = Product::with(['galleries', 'category'])->where('stock', '>', 0)->where('name', 'like', '%'. $request->keyword .'%')->where('categories_id', $category->id)->get();
            return view('pages.search', [
                'categories' => $categories,
                'products' => $products,
            ]);
        } elseif ($request->keyword && $request->category == '') {
            $products = Product::with(['galleries', 'category'])->where('stock', '>', 0)->where('name', 'like', '%'. $request->keyword .'%')->get();
            return view('pages.search', [
                'categories' => $categories,
                'products' => $products,
            ]);
        } else {
            return view('pages.search', [
                'categories' => $categories,
            ]);
        }
    }
}
