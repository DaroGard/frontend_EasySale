<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function loginVendedor(){
        return view('loginVendedor');
    }

    public function loginComprador(){
        return view('login');
    }

    public function registro(){
        return view('registroVendedor');
    }

    public function registroComprador(){
        return view('registro');
    }

}
