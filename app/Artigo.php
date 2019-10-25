<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;

class Artigo extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'titulo', 'descricao', 'conteudo', 'data', 'user_id'
    ];

    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function listaArtigo($paginate){
        $listaArtigos = Artigo::select('id', 'titulo', 'descricao', 'user_id', 'data')->paginate($paginate);

        foreach ($listaArtigos as $key => $value) {
            $value->user_id = $value->user()->first()->name;
        }

        return $listaArtigos;
    }

    public static function listaArtigoSite($paginate){
        $listaArtigos = Artigo::select('id', 'titulo', 'descricao', 'user_id', 'data')->whereDate('data', '<=', date('Y-m-d'))->orderBy('data', 'DESC')->paginate($paginate);

        foreach ($listaArtigos as $key => $value) {
            $value->user_id = $value->user()->first()->name;
        }

        return $listaArtigos;
    }
}
