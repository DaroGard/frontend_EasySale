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
        <h2 class="text-center">¡Comienza tu Registro!</h2>
        <form id="registroForm">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Ingrese su nombre" required>
            </div>
            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido:</label>
                <input type="text" id="apellido" name="apellido" class="form-control" placeholder="Ingrese su apellido" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Ingrese un correo electronico" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña:</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Ingrese una contraseña" required>
            </div>
            <div class="mb-3">
                <label for="telefono" class="form-label">Telefono:</label>
                <input type="text" id="telefono" name="telefono" class="form-control" placeholder="Ingrese su numero de telefono" required>
            </div>
            <div class="mb-3">
                <label for="direccion" class="form-label">Direccion:</label>
                <input type="text" id="dieccion" name="direccion" class="form-control" placeholder="Ingrese su direccion para envio" required>
            </div>
            <div class="mb-3">
                <label for="tarjeta" class="form-label">Numero de Tarjeta:</label>
                <input type="number" class="form-control" id="tarjeta" name="tarjeta" min="0" placeholder="Numero de tarjeta valida" required>
            </div>
            <div class="mb-3">
                <label for="vencimiento" class="form-label">Fecha de vencimiento:</label>
                <input type="date" class="form-control" id="vencimiento" name="vencimiento" placeholder="MM/YY" required>
            </div>
            <div class="mb-3">
                <label for="cvv">CVV:</label>
                <input type="text" class="form-control" id="cvv" name="cvv" placeholder="Codigo de seguridad" required>
            </div>
            <a href="{{ route('home-principal') }}" type="submit" class="btn btn-primary" onclick="registrarUsuario()">Registrarse</a>
        </form>
        <p class="mt-3 text-center">¿Ya tienes una cuenta? <a href="{{ route('login-comprador') }}">Inicia sesión</a></p>
    </div>

    <script src="{{ url('js/registro.js') }}"></script>

</body>
</html>