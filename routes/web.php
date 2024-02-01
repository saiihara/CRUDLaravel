<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhoneController;
use App\Http\Controllers\TiendaController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\UserController;

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

//INICIO
Route::get('/inicio', function () {
    return view('inicio');
})->name('inicio');


Route::get('/editar/{id}', [PhoneController::class, 'editar'])->name('editar');
Route::put('/actualizar/{id}', [PhoneController::class, 'actualizar'])->name('actualizar');

// Route::post('/clear-log', [PhoneController::class, 'clearLog'])->name('clearLog');

Route::delete('/eliminar/{id}', [PhoneController::class, 'eliminar'])->name('eliminar');

Route::get('/', [PhoneController::class, 'portada'])->name('principal');
Route::get('/phones', [PhoneController::class, 'composiciones'])->name('phones');
Route::get('/añadir', [PhoneController::class, 'crear'])->name('añadir');
Route::post('/guardar', [PhoneController::class, 'almacenar'])->name('guardar');

//TIENDA

Route::get('/tiendas', [TiendaController::class, 'index'])->name('tiendas.index');

//show = enseña un solo item
Route::get('/tiendas/{id}', [TiendaController::class, 'show'])->name('tiendas.show');

//editar
Route::get('/tiendas/editar/{id}', [TiendaController::class, 'editar'])->name('tiendas.editar');

//actualizar
Route::put('/tiendas/actualizar/{id}', [TiendaController::class, 'actualizar'])->name('tiendas.actualizar');

//insertar
Route::get('/crear', [TiendaController::class, 'crear'])->name('tiendas.crear');
Route::post('/tiendas/guardar', [TiendaController::class, 'guardar'])->name('tiendas.guardar');


//LOGS
Route::get('/logs', [LogController::class, 'index'])->name('log.log');

Route::delete('/logs/{id}', [LogController::class, 'destroy'])->name('logs.destroy');


//borrar
Route::delete('/tiendas/eliminar/{id}', [TiendaController::class, 'eliminar'])->name('tiendas.eliminar');

//ver tienda desde móviles
Route::get('/tiendas/ver/{id}', [TiendaController::class, 'verTienda'])->name('tiendas.ver');


//rutas login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

//ruta logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//ver registro form
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');

//Proceso de registro
Route::post('/register', [RegisterController::class, 'register']);


//USERS
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');