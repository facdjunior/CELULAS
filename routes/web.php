<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\cadCelulasController;
use App\Http\Controllers\cadMembrosController;
use App\Http\Controllers\cadRedesController;
use App\Http\Controllers\cadReuniaoController;
use App\Http\Controllers\cadVisitantesController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\usuarioController;
use Illuminate\Support\Facades\Route;


Route::get('/', homeController::class)->name('index');
Route::Post('painel',[usuarioController::class, 'login'])->name('usuarios.login');


Route::get('membros',[cadMembrosController::class, 'index'])->name('membros.index');
Route::get('membros.inserir', [cadMembrosController::class, 'create'])->name('membros.inserir');
Route::post('membros.insert', [cadMembrosController::class, 'insert'])->name('membros.insert');
Route::get('membros',[cadMembrosController::class, 'index'])->name('membros.index');
Route::get('membros/{item}/edit', [cadMembrosController::class, 'edit'])->name('membros.edit');
Route::put('membros/{item}', [cadMembrosController::class, 'editar'])->name('membros.editar');
Route::delete('membros/{item}', [cadMembrosController::class, 'delete'])->name('membros.delete');
Route::get('membros/{item}/delete', [cadMembrosController::class, 'modal'])->name('membros.modal');

Route::get('visitantes',[cadVisitantesController::class, 'index'])->name('visitantes.index');
Route::get('visitantes.inserir', [cadVisitantesController::class, 'create'])->name('visitantes.inserir');
Route::post('visitantes.insert', [cadVisitantesController::class, 'insert'])->name('visitantes.insert');
Route::get('visitantes/{item}/edit', [cadVisitantesController::class, 'edit'])->name('visitantes.edit');
Route::put('visitantes/{item}', [cadVisitantesController::class, 'editar'])->name('visitantes.editar');
Route::delete('visitantes/{item}', [cadVisitantesController::class, 'delete'])->name('visitantes.delete');
Route::get('visitantes/{item}/delete', [cadVisitantesController::class, 'modal'])->name('visitantes.modal');

Route::get('redes',[cadRedesController::class, 'index'])->name('redes.index');
Route::get('redes.inserir', [cadRedesController::class, 'create'])->name('redes.inserir');
Route::post('redes.insert', [cadRedesController::class, 'insert'])->name('redes.insert');
Route::get('redes',[cadRedesController::class, 'index'])->name('redes.index');
Route::get('redes/{item}/edit', [cadRedesController::class, 'edit'])->name('redes.edit');
Route::put('redes/{item}', [cadRedesController::class, 'editar'])->name('redes.editar');
Route::delete('redes/{item}', [cadRedesController::class, 'delete'])->name('redes.delete');
Route::get('redes/{item}/delete', [cadRedesController::class, 'modal'])->name('redes.modal');

Route::get('celulas',[cadCelulasController::class, 'index'])->name('celulas.index');
Route::get('celulas.inserir', [cadCelulasController::class, 'create'])->name('celulas.inserir');
Route::post('celulas.insert', [cadCelulasController::class, 'insert'])->name('celulas.insert');
Route::get('celulas',[cadCelulasController::class, 'index'])->name('celulas.index');
Route::get('celulas/{item}/edit', [cadCelulasController::class, 'edit'])->name('celulas.edit');
Route::put('celulas/{item}', [cadCelulasController::class, 'editar'])->name('celulas.editar');
Route::delete('celulas/{item}', [cadCelulasController::class, 'delete'])->name('celulas.delete');
Route::get('celulas/{item}/delete', [cadCelulasController::class, 'modal'])->name('celulas.modal');

Route::get('reunioes',[cadReuniaoController::class, 'index'])->name('reunioes.index');
Route::get('reunioes.inserir', [cadReuniaoController::class, 'create'])->name('reunioes.inserir');
Route::post('reunioes.insert', [cadReuniaoController::class, 'insert'])->name('reunioes.insert');
Route::get('reunioes',[cadReuniaoController::class, 'index'])->name('reunioes.index');
Route::get('reunioes/{item}/edit', [cadReuniaoController::class, 'edit'])->name('reunioes.edit');
Route::put('reunioes/{item}', [cadReuniaoController::class, 'editar'])->name('reunioes.editar');
Route::delete('reunioes/{item}', [cadReuniaoController::class, 'delete'])->name('reunioes.delete');
Route::get('reunioes/{item}/delete', [cadReuniaoController::class, 'modal'])->name('reunioes.modal');

Route::get('usuarios', [usuarioController::class, 'index'])->name('usuarios.index');
Route::delete('usuarios/{item}', [usuarioController::class, 'delete'])->name('usuarios.delete');
Route::get('usuarios/{item}/delete', [usuarioController::class, 'modal'])->name('usuarios.modal');


Route::get('home-admin',[adminController::class, 'index'])->name('admin.index');
Route::get('/',[usuarioController::class, 'logout'])->name('usuarios.logout');
Route::put('admin/{usuario}', [adminController::class, 'editar'])->name('admin.editar');

