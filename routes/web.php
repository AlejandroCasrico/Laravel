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
Route::get('/Home', [AuthController::class,'home'])->name('home');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
//esta ruta trae la lista
Route::get('/usuarios',
[AuthController::class,'consultaUsuarios']

)->name('consultaUsuarios');

Route::post('/login',[AuthController::class,'authenticate'])->name('login');

Route::get('/login',
[AuthController::class,'login']);

Route::get('/detail/{id}',[AuthController::class,'detail'])->name('detail');

Route::get('/index',[AuthController::class,'index'])->name('index');

// Route::post('/register',
// [AuthController::class,'save'])->name('guardar');
Route::post('/register', [AuthController::class, 'insertarUsuario'])->name('usuarios.insertar');

Route::get('/register',
[AuthController::class,'index'])->name('register');

Route::get('/delete/{id}',
[AuthController::class,'delete'])->name('delete');

Route::get('/edit/{id}',
[AuthController::class,'editar'])->name('edit');

Route::put('/update',
[AuthController::class,'update'])->name('update');


