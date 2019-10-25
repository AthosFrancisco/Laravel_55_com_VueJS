<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artigo;
use App\User;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artigos = Artigo::count();
        $usuarios = User::count();
        $autores = User::where('autor', 'S')->count();
        $admins = User::where('admin', 'S')->count();

        $listaMigalhas = json_encode([
            ["titulo" => "Admin", "url" => ""]
        ]);

        return view("admin", compact("listaMigalhas", "artigos", "usuarios", "autores", "admins"));
    }
}
