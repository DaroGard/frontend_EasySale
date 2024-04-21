<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CompradorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\VendedorController;
use App\Http\Controllers\RegistroClienteController;
use App\Http\Controllers\RegistroVendedorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'home'])->name('home-principal');

Route::get('/cart', [HomeController::class, 'cart'])->name('home-cart');

Route::get('/pagar', [CartController::class, 'pagar'])->name('cart-pagar');

Route::get('/login', [CartController::class, 'loginCompra'])->name('login-compra');

Route::get('/loginvendedor', [LoginController::class, 'loginVendedor'])->name('login-vendedor');

Route::get('/loginComprador', [LoginController::class, 'loginComprador'])->name('login-comprador');

Route::get('/vendedor', [VendedorController::class, 'panelVendedor'])->name('vendedor-productos');

Route::get('/registroVendedor', [LoginController::class, 'registro'])->name('registro-vendedor');

Route::get('/registroCliente', [LoginController::class, 'registroComprador'])->name('registro-comprador');

Route::get('/factura', [CartController::class, 'factura'])->name('factura-comprador');

Route::get('/comprador', [CompradorController::class, 'comprador'])->name('comprador');

Route::get('/cartComprador', [HomeController::class, 'cartComprador'])->name('comprador-cart');

Route::get('/registroCliente', [RegistroClienteController::class, 'registroComprador'])->name('registro-comprador');

Route::post('/guardarCliente', [RegistroClienteController::class, 'guardarCliente'])->name('guardar-comprador');

Route::get('/registroVendedor', [RegistroVendedorController::class, 'registroVendedor'])->name('registro-vendedor');

Route::post('/guardarVendedor', [RegistroVendedorController::class, 'guardarVendedor'])->name('guardar-vendedor');
