<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ url('css/login.css') }}">
    <link rel="shortcut icon" href="{{ url('img/Logo.png') }}" type="image/x-icon">
    <title>Login Vendedor</title>
</head>
<body style="background: #f8f9fa">
    <div class="flex min-h-full flex-col   justify-center px-6 py-12 lg:px-8 ">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm ">
            <img style="width: 46%; margin-left: 24%;" src="{{ asset('img/Logo.png') }}" onclick="regresar()" alt="logo.png" onclick="regresar()" id="logo">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight">Iniciar sesión en su cuenta</h2>
        </div>
        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm ">
            <form class="space-y-6" action="{{ route('verificar-vendedor') }}" method="POST">
                @csrf
                <div>
                    <label for="correoelectronico" class="block text-sm font-medium leading-6 ">Correo electrónico</label>
                    <div class="mt-2">
                        <input id="correoelectronico" name="correoelectronico" type="email" autocomplete="email" required
                            class="block w-full rounded-md border-0 py-1.5 text-black shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div>
                    <div class="flex items-center justify-between">
                        <label for="contrasena" class="block text-sm font-medium leading-6">Contraseña</label>
                        <div class="text-sm">
                            <a href="#" style="color: #006666"
                                class="font-semibold text-indigo-600 hover:text-indigo-500">Has olvidado tu contraseña?</a>
                        </div>
                    </div>
                    <div class="mt-2">
                        <input id="contrasena" name="contrasena" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-black shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div>
                    <button type="submit" id="iniciarSesion" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
                </div>
            </form>
            <p class="mt-3">¿No tienes una cuenta de vendedor? <a href="{{ route('registro-vendedor') }}"
                    style="color: #008584">Regístrate aquí</a></p>
            <p class="mt-10 text-center text-sm">
                No eres un vendedor?
                <a href="{{ route('login-comprador') }}"
                    class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Ingresar como cliente</a>
            </p>
        </div>
    </div>

    <script src="{{ url('js/loginvendedor.js') }}"></script>

</body>
</html>