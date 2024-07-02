<?php

use App\Http\Controllers\AutorController;
use App\Http\Controllers\LibroController;

Route::resource('autores', AutorController::class);
Route::resource('libros', LibroController::class);




