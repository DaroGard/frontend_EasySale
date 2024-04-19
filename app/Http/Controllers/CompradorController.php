<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompradorController extends Controller
{
    public function comprador(){
        return view('comprador');
    }
}
