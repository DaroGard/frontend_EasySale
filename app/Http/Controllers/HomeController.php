<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function home(){
        $client = new Client([
            'base_uri' => 'http://localhost:8080',
            'timeout' => 2.0,
            'verify' => false,
        ]);

        $response = $client->request('GET', '/api/producto/todos');
        $productos = json_decode($response->getBody()->getContents());

        return view('home', compact('productos'));
    }

    public function cart(){
        return view('cart');
    }

    public function cartComprador(){
        return view('cartComprador');
    }

}
