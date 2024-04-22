<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    //
    public function loginVendedor()
    {
        return view('loginVendedor');
    }

    public function loginComprador()
    {
        return view('login');
    }

    public function registro()
    {
        return view('registroVendedor');
    }

    public function registroComprador()
    {
        return view('registro');
    }

    public function verificarCredenciales(Request $request)
    {
        // Validar los datos de la solicitud
        $request->validate([
            'correoelectronico' => 'required|email',
            'contrasena' => 'required|string',
        ]);

        // Obtener el correo y contraseña del cuerpo de la solicitud
        $correoelectronico = $request->input('correoelectronico');
        $contrasena = $request->input('contrasena');

        // Crear una instancia de Guzzle Client
        $client = new Client();

        try {
            // Realizar la solicitud HTTP a la API externa
            $response = $client->post('http://localhost:8080/api/comprador/autenticar', [
                'form_params' => [
                    'correoelectronico' => $correoelectronico,
                    'contrasena' => $contrasena
                ]
            ]);

            // Obtener el cuerpo de la respuesta como un array asociativo
            $body = json_decode($response->getBody(), true);

            // Verificar si la autenticación fue exitosa basándose en la respuesta de la API externa
            if (!empty($body['idcomprador'])) {
                // Autenticación exitosa
                // Guardar los datos del comprador en la sesión
                Session::put('comprador', $body);

                // Redireccionar a la vista del perfil del comprador
                return redirect()->route('comprador');
            } else {
                // Autenticación fallida
                return response()->json(['mensaje' => 'Correo o contraseña incorrectos'], 401);
            }
        } catch (RequestException $e) {
            // Manejar errores de solicitud
            return response()->json(['mensaje' => 'Error al enviar la solicitud a la API externa'], 500);
        }
    }

    public function verificarCredencialesPagar(Request $request)
    {
        // Validar los datos de la solicitud
        $request->validate([
            'correoelectronico' => 'required|email',
            'contrasena' => 'required|string',
        ]);

        // Obtener el correo y contraseña del cuerpo de la solicitud
        $correoelectronico = $request->input('correoelectronico');
        $contrasena = $request->input('contrasena');

        // Crear una instancia de Guzzle Client
        $client = new Client();

        try {
            // Realizar la solicitud HTTP a la API externa
            $response = $client->post('http://localhost:8080/api/comprador/autenticar', [
                'form_params' => [
                    'correoelectronico' => $correoelectronico,
                    'contrasena' => $contrasena
                ]
            ]);

            // Obtener el cuerpo de la respuesta como un array asociativo
            $body = json_decode($response->getBody(), true);

            // Verificar si la autenticación fue exitosa basándose en la respuesta de la API externa
            if (!empty($body['idcomprador'])) {
                // Autenticación exitosa
                // Guardar los datos del comprador en la sesión
                Session::put('cart-pagar', $body);

                // Redireccionar a la vista del perfil del comprador
                return redirect()->route('cart-pagar');
            } else {
                // Autenticación fallida
                return response()->json(['mensaje' => 'Correo o contraseña incorrectos'], 401);
            }
        } catch (RequestException $e) {
            // Manejar errores de solicitud
            return response()->json(['mensaje' => 'Error al enviar la solicitud a la API externa'], 500);
        }
    }

    public function verificarCredencialesVendedor(Request $request)
    {
        $request->validate([
            'correoelectronico' => 'required|email',
            'contrasena' => 'required|string',
        ]);

        $correoelectronico = $request->input('correoelectronico');
        $contrasena = $request->input('contrasena');

        $client = new Client();

        try {
            $response = $client->post('http://localhost:8080/api/vendedor/autenticacion', [
                'form_params' => [
                    'correoelectronico' => $correoelectronico,
                    'contrasena' => $contrasena
                ]
            ]);

            $body = json_decode($response->getBody(), true);

            if (!empty($body['idvendedor'])) {
                Session::put('vendedor', $body);

                return redirect()->route('vendedor-productos');
            } else {
                return response()->json(['mensaje' => 'Correo o contraseña incorrectos'], 401);
            }
        } catch (RequestException $e) {
            return response()->json(['mensaje' => 'Error al enviar la solicitud a la API externa'], 500);
        }
    }
}
