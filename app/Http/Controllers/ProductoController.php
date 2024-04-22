<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function guardarProducto(Request $request)
    {
        // Obtener los datos del formulario
        $idvendedor = $request->input('idvendedor');
        $idcategoria = $request->input('categoria');
        $nombre = $request->input('nombre');
        $descripcion = $request->input('descripcion');
        $precio = $request->input('precio');
        $imagen = $request->input('imagen');
        $cantidadproducto = $request->input('cantidad');

        // Crear un cliente Guzzle
        $client = new Client([
            'base_uri' => 'http://localhost:8080'
        ]);

        try {
            // Realizar la solicitud POST con Guzzle
            $response = $client->post('/api/producto/guardar', [
                'json' => [
                    "vendedor" => [
                        "idvendedor" => $idvendedor,
                    ],
                    "categoria" => [
                        "idcategoria" => $idcategoria,
                    ],
                    "nombre" => $nombre,
                    "descripcion" => $descripcion,
                    "precio" => $precio,
                    "imagen" => $imagen,
                    "cantidadproducto" => $cantidadproducto
                ]
            ]);

            // Verificar si la solicitud fue exitosa
            if ($response->getStatusCode() === 200) {
                // La solicitud fue exitosa, puedes redirigir o hacer algo más aquí
                return redirect()->route('vendedor');
            } else {
                // La solicitud no fue exitosa, manejar el error
                return redirect()->back()->with('error', 'Ha ocurrido un error al procesar tu solicitud.');
            }
        } catch (\Exception $e) {
            // Manejar cualquier excepción que ocurra durante la solicitud
            return redirect()->back()->with('error', 'Ha ocurrido un error al procesar tu solicitud.');
        }
    }
    public function actualizarProducto(Request $request, $id)
    {
        // Obtener los datos del formulario
        $nombre = $request->input('nombreProducto');
        $precio = $request->input('precioProducto');
        $cantidadproducto = $request->input('cantidadProducto');
        $imagen = $request->input('urlImagen');

        // Configurar el cliente Guzzle para realizar la solicitud HTTP
        $client = new Client();

        try {
            // Realizar la solicitud PUT para actualizar los datos del producto
            $response = $client->request('PUT', 'http://localhost:8080/api/producto/actualizar/' . $id, [
                'json' => [
                    'nombre' => $nombre,
                    'precio' => $precio,
                    'cantidadproducto' => $cantidadproducto,
                    'imagen' => $imagen
                ]
            ]);

            // Verificar el código de estado de la respuesta
            if ($response->getStatusCode() == 200) {
                // Producto actualizado correctamente
                return response()->json(['message' => 'Producto actualizado correctamente'], 200);
                
            } else {
                // Error al actualizar el producto
                return response()->json(['message' => 'Error al actualizar el producto'], $response->getStatusCode());
            }
        } catch (\Exception $e) {
            // Manejar errores de Guzzle
            return response()->json(['message' => 'Error al conectar con el servidor'], 500);
        }
    }

}
