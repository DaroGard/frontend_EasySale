<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ url('css/comprador.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/54de7e7a33.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="{{ url('img/Logo.png') }}" type="image/x-icon">
    <title>Easy Sale</title>
</head>

<body>
    <!--Botones-->
    <div class="container">
        <div class="cart-icon">
            <a href="{{ route('comprador-cart') }}"><i class="fa-solid fa-cart-shopping"></i></a>
        </div>
        <div id="perfilBox">
            <div>
                <h1 id="username">Hola, {{ Session::get('comprador')['nombre'] }}</h1>
            </div>
            <div id="compradorImg">
                <img src="{{ asset('img/default-picture.png') }}" data-bs-toggle="modal"
                    data-bs-target="#editarCuentaModal">

            </div>
        </div>
    </div>
    <!--Categorias-->
    <ul class="nav justify-content-center">
        <button class="btn btn-primary" onclick="mostrarTodos()">Todos</button>
        @foreach ($categorias as $categoria)
            <li class="nav-item">
                <span class="boton-categoria"
                    onclick="filtrarPorCategoria('{{ $categoria->idcategoria }}')">{{ $categoria->nombrecategoria }}</span>
            </li>
        @endforeach
    </ul>
    <!--Items-->
    <div class="container text-center">
        <div class="row row-cols-3" id="productosContainer">
            @foreach ($productos as $producto)
                <div class="col">
                    <div class="container-categories text-center">
                        <div class="container-box categorie row row-cols-auto"
                            data-categoria="{{ $producto->categoria->idcategoria }}">
                            <div class="card col">
                                <img src="{{ asset($producto->imagen) }}" class="card-img-top" alt="Imagen">
                                <div class="card-body">
                                    <h5 class="card-title">${{ $producto->precio }}</h5>
                                    <hr>
                                    <p class="card-text">{{ $producto->descripcion }}</p>
                                    <br>
                                    <a href="#" class="btn btn-primary"
                                        onclick="addToCart('{{ $producto->nombre }}', {{ $producto->precio }}, '{{ $producto->imagen }}', '{{ $producto->cantidadproducto }}', '{{ $producto->vendedor->idvendedor }}')">Add
                                        to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Modal de edición de cuenta -->
    <div class="modal fade" id="editarCuentaModal" tabindex="-1" aria-labelledby="editarCuentaModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editarCuentaModalLabel">Editar información de la cuenta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulario de edición de cuenta -->
                    <form>
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" id="nombre"
                                value="{{ Session::get('comprador')['nombre'] }}">
                        </div>
                        <div class="mb-3">
                            <label for="apellido" class="form-label">Apellido:</label>
                            <input type="text" class="form-control" id="apellido"
                                value="{{ Session::get('comprador')['apellido'] }}">
                        </div>
                        <div class="mb-3">
                            <label for="telefono" class="form-label">Telefono:</label>
                            <input type="text" class="form-control" id="telefono"
                                value="{{ Session::get('comprador')['telefono'] }}">
                        </div>
                        <div class="mb-3">
                            <label for="correoelectronico" class="form-label">Correo electrónico:</label>
                            <input type="email" class="form-control" id="correoelectronico"
                                value="{{ Session::get('comprador')['correoelectronico'] }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="contrasena" class="form-label">Contraseña:</label>
                            <input type="password" class="form-control" id="contrasena">
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                        <a onclick="cerrarSesion(event)" type="button" class="btn btn-dark" href="{{ route('home-principal') }}">Cerrar Sesion</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

<script src="{{ url('js/home.js') }}"></script>

</html>
