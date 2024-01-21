<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Inventario;
// returns the home page with all posts
Route::get('/', [Inventario::class, 'index'])->name('dashboard');
Route::get('/formulario-asignar', [Inventario::class, 'formularioAsignar'])->name('formulario-asignar');
Route::post('/asignar', [Inventario::class, 'asignar'])->name('asignar');

Route::get('/crear-usuario', [Inventario::class, 'crearUsuario'])->name('crear-usuario');
Route::post('/guardar-usuario', [Inventario::class, 'guardarUsuario'])->name('guardar-usuario');

Route::get('/crear-equipo', [Inventario::class, 'crearEquipo'])->name('crear-equipo');
Route::post('/guardar-equipo', [Inventario::class, 'guardarEquipo'])->name('guardar-equipo');

