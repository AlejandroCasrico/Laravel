<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;

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

// Redirige a la página de inicio de sesión
Route::get('/', function () {
    return redirect()->route('login');
 });

 // Ruta para acceder a la página de inicio (requiere autenticación)
 Route::get('/Home', [AuthController::class, 'home'])->name('home')->middleware('auth.session');

 // Ruta para cerrar sesión
 Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

 Route::get('/alert_detail/{id}', [AuthController::class, 'alertDetail'])->name('alert_detail');
 Route::post('/solution', [AuthController::class, 'solution'])->name('solution');
 // Ruta protegida para consultar usuarios (requiere autenticación)
 Route::get('/usuarios', [AuthController::class, 'consultaUsuarios'])->name('consultaUsuarios')->middleware('auth.session');

 // Rutas accesibles sin autenticación
 Route::post('/login', [AuthController::class, 'authenticate'])->name('login');
 Route::get('/login', [AuthController::class, 'login']);

 // Ruta para ver los detalles de un usuario específico (requiere autenticación)
 Route::get('/detail/{id}', [AuthController::class, 'detail'])->name('detail')->middleware('auth.session');

 // Ruta para mostrar una lista (requiere autenticación)
 Route::get('/index', [AuthController::class, 'index'])->name('index')->middleware('auth.session');

 // Ruta para registrar un nuevo usuario (requiere autenticación)
 Route::post('/register', [AuthController::class, 'insertarUsuario'])->name('usuarios.insertar')->middleware('auth.session');
 Route::get('/register', [AuthController::class, 'index'])->name('register')->middleware('auth.session');

 // Ruta para eliminar un usuario (requiere autenticación)
 Route::get('/delete/{id}', [AuthController::class, 'delete'])->name('delete')->middleware('auth.session');

 // Ruta para editar un usuario (requiere autenticación)
 Route::get('/edit/{id}', [AuthController::class, 'editar'])->name('edit')->middleware('auth.session');
 Route::put('/update', [AuthController::class, 'update'])->name('update')->middleware('auth.session');

 // Ruta para recibir alertas a través de una API (sin autenticación)
 Route::post('/api/alerts', [AuthController::class, 'alerts'])->name('alerts');

 // Ruta para mostrar la tabla completa de alertas (requiere autenticación)
 Route::get('/alerts/full', [AuthController::class, 'showFullTable'])->name('alerts.full');
