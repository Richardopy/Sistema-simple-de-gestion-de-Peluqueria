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

Route::resource('/admin/proveedores', App\Http\Controllers\ProveedorController::class)->middleware('auth');

Route::resource('/admin/productos', App\Http\Controllers\ProductoController::class)->middleware('auth');

Route::resource('/admin/servicios', App\Http\Controllers\ServicioController::class)->middleware('auth');

Route::get('/admin/mensajes', function () {
    return view('admin.mensajes.index');
})->middleware('auth');

Route::get('/admin/gastos', function () {
    return view('admin.gastos.index');
})->middleware('auth');

Route::get('/admin/categoriagastos', function () {
    return view('admin.categoriagastos.index');
})->middleware('auth');

Route::get('/contacto', [App\Http\Controllers\ContactoController::class, 'index'])->name('contacto');

Route::post('/enviarcorreo', [App\Http\Controllers\ContactoController::class, 'enviarcorreo'])->name('enviarcorreo');

Route::resource('/admin/empresa', App\Http\Controllers\EmpresaController::class)->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin/clientes', function () {
    return view('admin.clientes.index');
})->middleware('auth');

Route::get('/admin/colaboradores', function () {
    return view('admin.colaboradores.index');
})->middleware('auth');

Route::get('/productos', function () {
    return view('frontend.productos');
});

Route::get('/carrito', function () {
    return view('frontend.carrito');
});

Route::get('/carritoservicio', function () {
    return view('frontend.carritoservicio');
});

Route::get('/comprar', [App\Http\Controllers\ComprarController::class, 'index'])->name('comprar')->middleware('auth');

Route::post('/enviarpedido', [App\Http\Controllers\ComprarController::class, 'enviarpedido'])->name('enviarpedido');

Route::get('/quienessomos', function () {
    return view('frontend.acerca');
});

Route::get('/servicios', function () {
    return view('frontend.servicios');
});

Route::get('/agendarcita', function () {
    return view('frontend.agendarcita');
})->middleware('auth');

Route::post('/enviarsolicitud', [App\Http\Controllers\ServicioController::class, 'enviarsolicitud'])->name('enviarsolicitud');