<?php

use Illuminate\Support\Facades\Route;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/', 'App\Http\Controllers\HomeController@index')->name('Dashboard');
    Route::get('/livros', 'App\Http\Controllers\LivroController@index')->name('Livros');
    Route::get('/livro/add', 'App\Http\Controllers\LivroController@cadastrar')->name('Novo Livro');
    Route::post('/livro/salvar', 'App\Http\Controllers\LivroController@salvar')->name('Salvar Livro');
    Route::get('/livro/{id}', 'App\Http\Controllers\LivroController@editar')->name('Editar Livro');
    Route::get('/livro/deletar/{id}', 'App\Http\Controllers\LivroController@excluir')->name('Excluir Livro');
});
