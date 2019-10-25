<?php
use App\Artigo;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $listaArtigos = Artigo::listaArtigoSite(2);
    return view('site', compact('listaArtigos'));
})->name('site');

Route::get('/artigo/{id}/{titulo?}', function ($id) {
    $artigo = Artigo::find($id);
    if(isset($artigo)){
        return view('artigo', compact('artigo'));
    }
    return redirect()->route('site');
})->name('artigo');

Auth::routes();

Route::get('/admin', 'AdminController@index')->name('admin');

Route::middleware('auth')->prefix('admin')->namespace('Admin')->group(function () {
    Route::resource('artigos', 'ArtigosController');
    Route::resource('usuarios', 'UsuariosController');
    Route::resource('autores', 'AutoresController');
    Route::resource('adm', 'AdminController');
});