<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ArchivoController;
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
Route::get('/',[ProductoController::class, 'index']);
Route::post('/inserta', [ProductoController::class, 'store'])->name('inserta');
Route::delete('/elimina/{id}', [ProductoController::class, 'elimina'])->name('elimina');
Route::post('/editar/{id}',[ProductoController::class, 'edit'])->name('editar');
Route::post('/update/{id}',[ProductoController::class, 'update'])->name('update');

Route::get('/crear',function(){ return view('productos.crear'); })->name('crear');
Route::get('/listado',[ProductoController::class, 'index'])->name('listado');


