<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class VendedorController extends Controller
{
    //
    public function panelVendedor(){
        $client = new Client([
            'base_uri' => 'http://localhost:8080',
            'timeout' => 2.0,
            'verify' => false,
        ]);

        $responseProductos = $client->request('GET', '/api/producto/todos');
        $responseCategorias = $client->request('GET', '/api/categoria/todas');

        $productos = json_decode($responseProductos->getBody()->getContents());
        $categorias = json_decode($responseCategorias->getBody()->getContents());

        return view('vendedor', compact('productos','categorias'));
    }

}
