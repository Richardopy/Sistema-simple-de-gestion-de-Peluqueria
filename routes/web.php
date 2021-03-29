<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/admin/panel', function () {
    return view('admin.panel.index');
})->middleware('auth');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('/admin/categorias', App\Http\Controllers\CategoriaController::class)->middleware('auth');

Route::resource('/admin/productos', App\Http\Controllers\ProductoController::class)->middleware('auth');

Route::resource('/admin/servicios', App\Http\Controllers\ServicioController::class)->middleware('auth');

Route::get('/contacto', [App\Http\Controllers\ContactoController::class, 'index'])->name('contacto');
<<<<<<< HEAD
=======

Route::post('/enviarcorreo', [App\Http\Controllers\ContactoController::class, 'index'])->name('enviarcorreo');
>>>>>>> ae2a517e3c52e70242b3b29bb35d9457bb7f5df3

Route::resource('/admin/productos', App\Http\Controllers\ProductoController::class)->middleware('auth');

Route::resource('/admin/empresa', App\Http\Controllers\EmpresaController::class)->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin/clientes', function () {
    return view('admin.clientes.index');
})->middleware('auth');

Route::get('/admin/colaboradores', function () {
    return view('admin.colaboradores.index');
})->middleware('auth');
