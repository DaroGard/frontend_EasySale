<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de vendedor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('css/registroVendedor.css') }}">
    <link rel="shortcut icon" href="{{ url('img/Logo.png') }}" type="image/x-icon">
</head>
<body>
    <div class="container mt-5">
        @if (session('mensaje'))
            <div class="alert alert-success" role="alert">
                {{ session('mensaje') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="mb-4">Registro de vendedor</h1>
                <form id="registrovendedorform" action="{{ route('guardar-vendedor') }}" method="POST">
                    @csrf
                    <div class="columna-izquierda">
                        <div class="form-group">
                            <label for="nombrevendedor">Nombre:</label>
                            <input type="text" class="form-control" id="nombrevendedor" name="nombrevendedor" placeholder="Ingrese su nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción:</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Ingresar breve descripcion" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="cuentavendedor">Cuenta del Vendedor:</label>
                            <input type="number" class="form-control" id="cuentavendedor" name="cuentavendedor" placeholder="Cuenta asociada" min="0" required>
                        </div>
                    </div>
                    <div class="columna-derecha">
                        <div class="form-group">
                            <label for="correoelectronico">Correo electrónico:</label>
                            <input type="email" class="form-control" id="correoelectronico" name="correoelectronico" placeholder="Ingresar correo electronico" required>
                        </div>
                        <div class="form-group">
                            <label for="contrasena">Contraseña:</label>
                            <input type="password" class="form-control" id="contrasena" name="contrasena"
                                placeholder="Ingresar una contraseña" required>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <button type="submit" class="btn btn-primary">Registrarse</button>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ url('js/registroVendedor.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>