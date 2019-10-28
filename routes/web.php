<?php
use App\Artigo;
use Illuminate\Http\Request;

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

Route::get('/', function (Request $req) {

    $busca = $req->busca;
    if(isset($busca) && $busca != ""){
        $listaArtigos = Artigo::orWhere('titulo', 'like', '%'.$busca.'%')->orWhere('conteudo', 'like', '%'.$busca.'%')->paginate(3);
        $busca = "";
    }else{
        $listaArtigos = Artigo::listaArtigoSite(3);
    }

    return view('site', compact('listaArtigos', 'busca'));
})->name('site');

Route::get('/artigo/{id}/{titulo?}', function ($id) {
    $artigo = Artigo::find($id);
    if(isset($artigo)){
        return view('artigo', compact('artigo'));
    }
    return redirect()->route('site');
})->name('artigo');

Auth::routes();

Route::get('/admin', 'AdminController@index')->name('admin')->middleware('can:ehAutor');

Route::middleware('auth')->prefix('admin')->namespace('Admin')->group(function () {
    Route::resource('artigos', 'ArtigosController')->middleware('can:ehAutor');
    Route::resource('usuarios', 'UsuariosController')->middleware('can:ehAdmin');
    Route::resource('autores', 'AutoresController')->middleware('can:ehAdmin');
    Route::resource('adm', 'AdminController')->middleware('can:ehAdmin');
});