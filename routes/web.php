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
//esta ruta accede a home
Route::get('/', function () {
   return redirect()->route('login');
});

Route::get('/Home', [AuthController::class, 'home'])->name('home')->middleware('auth.session');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Ruta protegida
Route::get('/usuarios', [AuthController::class, 'consultaUsuarios'])->name('consultaUsuarios')->middleware('auth.session');

// Rutas accesibles sin autenticación
Route::post('/login', [AuthController::class, 'authenticate'])->name('login');
Route::get('/login', [AuthController::class, 'login']);

Route::get('/detail/{id}', [AuthController::class, 'detail'])->name('detail')->middleware('auth.session');
Route::get('/index', [AuthController::class, 'index'])->name('index')->middleware('auth.session');
Route::post('/register', [AuthController::class, 'insertarUsuario'])->name('usuarios.insertar')->middleware('auth.session');
Route::get('/register', [AuthController::class, 'index'])->name('register')->middleware('auth.session');
Route::get('/delete/{id}', [AuthController::class, 'delete'])->name('delete')->middleware('auth.session');
Route::get('/edit/{id}', [AuthController::class, 'editar'])->name('edit')->middleware('auth.session');
Route::put('/update', [AuthController::class, 'update'])->name('update')->middleware('auth.session');


Route::post('/api/alerts', [AuthController::class, 'alerts'])->name('alerts');
