<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function main()
    {
        return view('guest.home');
    }
    public function contact()
    {
        return view('guest.contact');
    }
    public function product()
    {
        return view('guest.product');
    }
    public function product_detail()
    {
        return view('guest.product-detail');
    }
}
