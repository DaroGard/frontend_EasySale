<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function pagar(){
        return view('pagar');
    }

    public function loginCompra(){
        return view('loginCompra');
    }

    public function factura(){
        return view('factura');
    }
}
