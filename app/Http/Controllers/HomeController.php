<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function home(){
        return view('home');
    }

    public function cart(){
        return view('cart');
    }

    public function cartComprador(){
        return view('cartComprador');
    }

}