<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('css/registro.css') }}">
    <link rel="shortcut icon" href="{{ url('img/Logo.png') }}" type="image/x-icon">
</head>

<body>
    <div class="container" style="max-width: 450px">
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
        <h2 class="text-center">¡Comienza tu Registro!</h2>
        <form id="registroForm" action="{{ route('guardar-comprador') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Ingrese su nombre"
                    required>
            </div>
            <div class="form-group">
                <label for="apellido" class="form-label">Apellido:</label>
                <input type="text" id="apellido" name="apellido" class="form-control"
                    placeholder="Ingrese su apellido" required>
            </div>
            <div class="form-group">
                <label for="correoelectronico" class="form-label">Correo Electronico:</label>
                <input type="email" id="correoelectronico" name="correoelectronico" class="form-control"
                    placeholder="Ingrese un correo electronico" required>
            </div>
            <div class="form-group">
                <label for="contrasena" class="form-label">Contraseña:</label>
                <input type="password" id="contrasena" name="contrasena" class="form-control"
                    placeholder="Ingrese una contraseña" required>
            </div>
            <div class="form-group">
                <label for="telefono" class="form-label">Telefono:</label>
                <input type="text" id="telefono" name="telefono" class="form-control"
                    placeholder="Ingrese su numero de telefono" required>
            </div>
            <div class="form-group">
                <label for="direccion" class="form-label">Direccion:</label>
                <input type="text" id="direccion" name="direccion" class="form-control"
                    placeholder="Ingrese su direccion para envio">
            </div>
            <div class="form-group">
                <label for="numerotarjetacomprador" class="form-label">Numero de Tarjeta:</label>
                <input type="number" class="form-control" id="numerotarjetacomprador" name="numerotarjetacomprador"
                    min="0" placeholder="Numero de tarjeta valida" required>
            </div>
            <div class="form-group">
                <label for="fechavencimientocomprador" class="form-label">Fecha de vencimiento:</label>
                <input type="date" class="form-control" id="fechavencimientocomprador"
                    name="fechavencimientocomprador" placeholder="MM/YY" required>
            </div>
            <div class="form-group">
                <label for="codigoseguridadcomprador">CVV:</label>
                <input type="text" class="form-control" id="codigoseguridadcomprador" name="codigoseguridadcomprador"
                    placeholder="Codigo de seguridad" required>
            </div>
            <button type="submit" class="btn btn-primary">Registrarse</button>
        </form>
        <p class="mt-3 text-center">¿Ya tienes una cuenta? <a href="{{ route('login-comprador') }}">Inicia sesión</a>
        </p>
    </div>

    <script src="{{ url('js/registro.js') }}"></script>

</body>

</html>
