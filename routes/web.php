<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ReservaController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/hoteles', [PedidoController::class, 'index']);
Route::get('/reserva',   [ReservaController::class, 'create'])->name('reservas.create');
