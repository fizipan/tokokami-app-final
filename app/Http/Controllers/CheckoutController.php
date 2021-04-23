<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        # code...
    }

    public function success()
    {
        return view('pages.checkout-success');
    }
}
