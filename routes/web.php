<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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
    return view('section.home');
});

//esta ruta trae la lista
Route::get('/usuarios',
[AuthController::class,'consultaUsuarios']
)->name('consultaUsuarios');

Route::post('/login',[AuthController::class,'authentication'])->name('login');

Route::get('/login',
[AuthController::class,'login']);

Route::get('/detail/{id}',[AuthController::class,'detail'])->name('detail');

Route::get('/index',[AuthController::class,'index'])->name('index');

Route::post('/register',
[AuthController::class,'save'])->name('guardar');


Route::get('/register',
[AuthController::class,'index'])->name('register');

Route::get('/delete/{id}',
[AuthController::class,'delete'])->name('delete');

Route::get('/edit/{id}',
[AuthController::class,'editar'])->name('edit');

Route::put('/update',
[AuthController::class,'update'])->name('update');


