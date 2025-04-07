<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacientesController;
use App\Http\Controllers\AtendimentosController;

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

Route::get('/', function () {
    return view('home');
});

Route::controller(PacientesController::class)->group(function() {
    Route::get('/pacientes', 'index');
    Route::get('/pacientes/cadastrar', 'create');
    Route::post('/pacientes/salvar', 'store');
    Route::delete('/pacientes/excluir/{paciente}', 'destroy')->name('pacientes.excluir');
    Route::get('/pacientes/editar/{paciente}', 'edit')->name('pacientes.edit');
    Route::put('/pacientes/{paciente}', 'update')->name('pacientes.update');
});

Route::controller(AtendimentosController::class)->group(function() {
    Route::get('/atendimentos', 'index');
    Route::get('/atendimentos/cadastrar', 'create');
    Route::post('/atendimentos/salvar', 'store');
    Route::delete('/atendimentos/excluir/{atendimento}', 'destroy')->name('atendimentos.excluir');
});