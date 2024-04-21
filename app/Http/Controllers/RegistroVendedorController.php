<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RegistroVendedorController extends Controller
{
    public function registroVendedor()
    {
        return view('registroVendedor');
    }

    public function guardarVendedor(Request $request)
    {
        $nombrevendedor = $request->input('nombrevendedor');
        $descripcion = $request->input('descripcion');
        $correoelectronico = $request->input('correoelectronico');
        $contrasena = $request->input('contrasena');
        $cuentavendedor = $request->input('cuentavendedor');
        
        $client = new Client([
            'base_uri' => 'http://localhost:8080'
        ]);

        try {
            $response = $client->post('/api/vendedor/registro', [
                'json' => [
                    'nombrevendedor' => $nombrevendedor,
                    'descripcion' => $descripcion,
                    'correoelectronico' => $correoelectronico,
                    'contrasena' => $contrasena,
                    'cuentavendedor' => $cuentavendedor,
                ]
            ]);

            if ($response->getStatusCode() === 200) {
                // Usuario creado correctamente
                Session::flash('mensaje', 'Vendedor creado correctamente. Por favor, inicia sesión.');
                return redirect()->route('login-vendedor');
            } else {
                // Algo salió mal en el servidor
                return redirect()->back()->with('error', 'El correo ya existe');
            }
        } catch (\Exception $e) {
            // Error de cliente (p.ej., conexión rechazada)
            return redirect()->back()->with('error', 'Ha ocurrido un error al procesar tu solicitud.');
        }
    }

}
