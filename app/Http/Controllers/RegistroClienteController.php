<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RegistroClienteController extends Controller
{
    public function registroComprador()
    {
        return view('registro');
    }

    public function guardarVendedor(Request $request)
    {
        $nombre = $request->input('nombre');
        $apellido = $request->input('apellido');
        $correoelectronico = $request->input('correoelectronico');
        $telefono = $request->input('telefono');
        $contrasena = $request->input('contrasena');
        $numerotarjetacomprador = $request->input('numerotarjetacomprador');
        $fechavencimientocomprador = $request->input('fechavencimientocomprador');
        $codigoseguridadcomprador = $request->input('codigoseguridadcomprador');

        $client = new Client([
            'base_uri' => 'http://localhost:8080'
        ]);

        try {
            $response = $client->post('/api/comprador/registro', [
                'json' => [
                    'nombre' => $nombre,
                    'apellido' => $apellido,
                    'telefono' => $telefono,
                    'correoelectronico' => $correoelectronico,
                    'contrasena' => $contrasena,
                    "tarjetasComprador" => [
                        [
                            'numerotarjetacomprador' => $numerotarjetacomprador,
                            'fechavencimientocomprador' => $fechavencimientocomprador,
                            'codigoseguridadcomprador' => $codigoseguridadcomprador,
                        ]
                    ]
                ]
            ]);

            if ($response->getStatusCode() === 200) {
                // Usuario creado correctamente
                Session::flash('mensaje', 'Usuario creado correctamente. Por favor, inicia sesión.');
                return redirect()->route('login-comprador');
            } else {
                // Algo salió mal en el servidor
                return redirect()->back()->with('error', 'Ha ocurrido un error al procesar tu solicitud.');
            }
        } catch (\Exception $e) {
            // Error de cliente (p.ej., conexión rechazada)
            return redirect()->back()->with('error', 'El correo ya existe');
        }
    }
}
