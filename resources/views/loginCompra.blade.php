<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ url('css/login.css') }}">
    <link rel="shortcut icon" href="{{ url('img/Logo.png') }}" type="image/x-icon">
    <title>Login</title>
</head>
<body>
    <div class="flex min-h-full flex-col   justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img style="width: 46%; margin-left: 24%;" src="{{ asset('img/Logo.png') }}" onclick="regresar()" alt="logo.png"
                onclick="regresar()" id="logo">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Iniciar sesión en su cuenta</h2>
        </div>
        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="#" method="POST">
                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Correo electrónico</label>
                    <div class="mt-2">
                        <input id="email" name="email" type="email" autocomplete="email" required
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div>
                    <div class="flex items-center justify-between">
                        <label for="password"
                            class="block text-sm font-medium leading-6 text-gray-900">Contraseña</label>
                        <div class="text-sm">
                            <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Has olvidado
                                tu contraseña?</a>
                        </div>
                    </div>
                    <div class="mt-2">
                        <input id="password" name="password" type="password" autocomplete="current-password" required
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div>
                    <a href="{{ route('cart-pagar') }}" type="btn btn-submit"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign
                        in</a>
                </div>
                <!-- Nuevo apartado de registro -->
                <div class="mt-4">
                    <p class="text-center text-sm text-gray-500">¿No tienes cuenta? Regístrate ahora.</p>
                    <a href="{{ route('registro-comprador') }}"
                        class="block w-full text-center rounded-md bg-gray-200 px-3 py-1.5 text-sm font-semibold leading-6 text-gray-900 shadow-sm hover:bg-gray-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">Crear
                        cuenta</a>
                </div>
            </form>
            <p class="mt-10 text-center text-sm text-gray-500">
                Eres un vendedor?
                <a href="{{ route('login-vendedor') }}"
                    class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Ingresar como vendedor</a>
            </p>
        </div>
    </div>

    <script src="{{ url('js/login.js') }}"></script>
</body>
</html>