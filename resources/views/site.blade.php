@extends('layouts.app')

@section('content')
<pagina tamanho="12">
    <painel titulo="Artigos">
        <p>
            <form align="center" action="{{ route('site') }}" method="get">
                <input type="search" name="busca" value="{{ $busca }}">
                <input type="submit" value="Buscar">
            </form>
        </p>
        <div class="row">
            @foreach ($listaArtigos as $artigo)
            <artigocard titulo="{{ str_limit($artigo->titulo, 25, '...') }}" descricao="{{ str_limit($artigo->descricao, 40, '...') }}"
                link="{{ route('artigo', ['id' => $artigo->id, 'titulo' => str_slug($artigo->titulo)]) }}"
                imagem="https://boramobiliar.com.br/image/cache/data/produtos/300/1181_-_mesa_fenix_-_1_gaveta_-_ce_fechado_-_castanho-800x800.jpg"
                data="{{ date('d/m/y', strtotime($artigo->data)) }}" autor="{{ $artigo->user_id }}" sm="6" dm="4">
            </artigocard>
            @endforeach
        </div>
        <div align="center">
            {{ $listaArtigos }}
        </div>
    </painel>
</pagina>
@endsection