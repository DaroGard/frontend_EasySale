<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de control del vendedor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('css/vendedor.css') }}">
    <link rel="shortcut icon" href="{{ url('img/Logo.png') }}" type="image/x-icon">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <h1>Bienvenido, {{ Session::get('vendedor')['nombrevendedor'] }}</h1>
                <br>
                <h2 id="panel">Panel de control</h2>
                <!-- Botón para abrir el modal de edición de cuenta -->
                <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                    data-bs-target="#editarCuentaModal">Editar cuenta</button>
                <a type="button" class="btn btn-dark" href="{{ route('home-principal') }}">Cerrar Sesion</a>
                <br>
                <br>
                <h4>Inventario de productos</h4>
                <div class="form-group">
                    <label for="categoria">Filtrar por categoría:</label>
                    <select class="form-control" id="categoria" onchange="filtrarProductos(this.value)">
                        <option value="">Todos</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->idcategoria }}">{{ $categoria->nombrecategoria }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="table-container">
                    <table id="tablaProductos" class="table table-striped table-hover mt-4">
                        <thead class="thead-dark">
                            <tr>
                                <th style="display: none">#Categoria</th>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productos as $producto)
                                @if ($producto->vendedor->idvendedor == Session::get('vendedor')['idvendedor'])
                                    <tr>
                                        <td style="display: none">{{ $producto->categoria->idcategoria }}</td>
                                        <td>{{ $producto->nombre }}</td>
                                        <td>${{ $producto->precio }}</td>
                                        <td>{{ $producto->cantidadproducto }}</td>
                                        <td>
                                            <a href="#" class="btn btn-primary" onclick="editarProducto('{{ $producto->idproducto }}','{{ $producto->nombre }}', {{ $producto->precio }}, {{ $producto->cantidadproducto }}, '{{ $producto->imagen }}')"
                                                data-bs-toggle="modal" data-bs-target="#editarProductoModal">Editar</a>
                                            <a href="#" class="btn btn-danger">Eliminar</a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-4">
                <div class="agregar-producto" style="width: 380px">
                    <h4>Agregar nuevo producto</h4>
                    <form action="{{ route('guardar-producto') }}" method="POST">
                        @csrf
                        <div class="form-group" style="display: none">
                            <label for="idvendedor"></label>
                            <input type="text" class="form-control" id="idvendedor" name="idvendedor"
                                value="{{ Session::get('vendedor')['idvendedor'] }}" required>
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre del producto:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre"
                                placeholder="Ingrese el nombre del producto" required>
                        </div>
                        <div class="form-group">
                            <label for="precio">Precio:</label>
                            <input type="number" class="form-control" id="precio" name="precio"
                                placeholder="Ingrese el precio" required min="0">
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción:</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese una breve descipcion" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="categoria">Categoría:</label>
                            <select class="form-control" id="categoria" name="categoria" required>
                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->idcategoria }}">{{ $categoria->nombrecategoria }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="cantidad">Cantidad en stock:</label>
                            <input type="number" class="form-control" id="cantidad"
                                placeholder="Ingrese la cantidad en stock" required min="0">
                        </div>
                        <div class="form-group">
                            <label for="imagen">Imagen:</label>
                            <input type="text" class="form-control-file" id="imagen" name="imagen" required
                                placeholder="img/nombre.extension">
                        </div>
                        <button type="submit" class="btn btn-dark">Agregar Producto</button>
                    </form>
                    <br>
                    <br>
                    <br>
                </div>
            </div>
        </div>
        <!-- Modal de edición de cuenta -->
        <div class="modal fade" id="editarCuentaModal" tabindex="-1" aria-labelledby="editarCuentaModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editarCuentaModalLabel">Editar información de la cuenta</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Formulario de edición de cuenta -->
                        <form>
                            <div class="mb-3">
                                <label for="nombrevendedor" class="form-label">Nombre:</label>
                                <input type="text" class="form-control" id="nombrevendedor"
                                    value="{{ Session::get('vendedor')['nombrevendedor'] }}" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="descripcionvendedor" class="form-label">Descripcion:</label>
                                <textarea type="text" class="form-control" id="descripcionvendedor"
                                    value="{{ Session::get('vendedor')['descripcion'] }}"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="correo" class="form-label">Correo electrónico:</label>
                                <input type="email" class="form-control" id="correo"
                                    value="{{ Session::get('vendedor')['correoelectronico'] }}" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="contrasena" class="form-label">Contraseña:</label>
                                <input type="password" class="form-control" id="contrasena"
                                    value="{{ Session::get('vendedor')['contrasena'] }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar cambios</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editarProductoModal" tabindex="-1" aria-labelledby="editarProductoModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editarProductoModalLabel">Editar información del producto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Formulario de edición de producto -->
                        <form id="editarProductoForm" method="POST" action="">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="nombreProducto" class="form-label">Nombre:</label>
                                <input type="text" class="form-control" id="nombreProducto" name="nombreProducto">
                            </div>
                            <div class="mb-3">
                                <label for="precioProducto" class="form-label">Precio:</label>
                                <input type="text" class="form-control" id="precioProducto" name="precioProducto">
                            </div>
                            <div class="mb-3">
                                <label for="cantidadProducto" class="form-label">Cantidad en stock:</label>
                                <input type="text" class="form-control" id="cantidadProducto" name="cantidadProducto">
                            </div>
                            <div class="mb-3">
                                <img id="imagenProducto" src="" alt="Imagen del producto" style="max-width: 100%;">
                            </div>
                            <div class="mb-3">
                                <label for="urlImagen" class="form-label">URL de la imagen:</label>
                                <input type="text" class="form-control" id="urlImagen" name="urlImagen">
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar cambios</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <script src="{{ url('js/vendedor.js') }}"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>

</body>

</html>
