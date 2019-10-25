@extends('layouts.app')

@section('content')
<pagina tamanho="12">
    <painel titulo="Artigos">
        <div class="row">
            @foreach ($listaArtigos as $artigo)
            <artigocard titulo="{{ $artigo->titulo }}" descricao="{{ $artigo->descricao }}"
                link="{{ route('artigo', ['id' => $artigo->id, 'titulo' => str_slug($artigo->titulo)]) }}"
                imagem="https://tangerino.com.br/wp-content/uploads/2018/05/jornada-de-trabalho-flex%C3%ADvel.jpg"
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