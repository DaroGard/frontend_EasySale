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

        $responseProductos = $client->request('GET', '/api/producto/todos');
        $responseCategorias = $client->request('GET', '/api/categoria/todas');

        // Decodificar los datos obtenidos de las respuestas
        $productos = json_decode($responseProductos->getBody()->getContents());
        $categorias = json_decode($responseCategorias->getBody()->getContents());

        // Pasar los productos y categorías a la vista
        return view('home', compact('productos', 'categorias'));
    }

    public function cart(){
        return view('cart');
    }

    public function cartComprador(){
        return view('cartComprador');
    }

}
