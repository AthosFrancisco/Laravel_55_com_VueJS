@extends('layouts.app')

@section('content')
<pagina tamanho="10">

    @if ($errors->all())
        <div class="alert alert-danger alert-dismissible text-center" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            @foreach ($errors->all() as $key => $value)
                <li><strong>{{ $value }}</strong></li>
            @endforeach
        </div>
    @endif

    <painel titulo="Lista de Artigos">
        <migalhas v-bind:lista="{{ $listaMigalhas }}"></migalhas>
        <tabela-lista v-bind:titulos="['#', 'Títulos', 'Descrição', 'Autor', 'Data']" v-bind:itens="{{ json_encode($listaArtigos) }}"
            ordem="desc" ordemcol="0" criar="#criar" detalhe="/admin/artigos/" editar="/admin/artigos/" deletar="/admin/artigos/"
            token="{{ csrf_token() }}" modal="sim">
        </tabela-lista>
        <div align="center">
            {{ $listaArtigos }}
        </div>
    </painel>
</pagina>

<modal nome="adicionar" titulo="Adicionar">
    <formulario id="formAdicionar" css="" action="{{ route('artigos.store') }}" method="post" enctype=""
        token="{{ csrf_token() }}">
        <div class="form-group">
            <label for="item">Título</label>
            <input type="text" class="form-control" id="item" placeholder="Título" name="titulo"
                value="{{ old('titulo') }}">
        </div>
        <div class="form-group">
            <label for="descricao">Descricao</label>
            <input type="text" class="form-control" id="descricao" placeholder="Descrição" name="descricao"
                value="{{ old('descricao') }}">
        </div>

        <div class="form-group">
            <label for="addConteudo">Conteúdo</label>
            <textarea class="form-control" id="addConteudo" placeholder="Conteúdo"
                 name="conteudo">{{ old('conteudo') }}</textarea>
        </div>

        <div class="form-group">
            <label for="data">Data</label>
            <input type="date" class="form-control" id="data" name="data" value="{{ old('data') }}">
        </div>
    </formulario>
    <span slot="botoes">
        <button form="formAdicionar" class="btn btn-info">Adicionar</button>
    </span>
</modal>

<modal nome="editar" titulo="Editar">
    <formulario id="formEditar" css="" v-bind:action="'{{ route('artigos.index') }}/'+$store.state.item.id" method="put" enctype="multipart/form-data" token="{{ csrf_token() }}">
        <div class="form-group">
            <label for="item">Título</label>
            <input type="text" class="form-control" id="item" placeholder="Título" name="titulo"
                v-model="$store.state.item.titulo">
        </div>
        <div class="form-group">
            <label for="descricao">Descricao</label>
            <input type="text" class="form-control" id="descricao" placeholder="Descrição" name="descricao"
            v-model="$store.state.item.descricao">
        </div>

        <div class="form-group">
            <label for="conteudo">Conteúdo</label>
            <textarea class="form-control" id="conteudo" placeholder="Conteúdo"
                name="conteudo" v-model="$store.state.item.conteudo"></textarea>
        </div>

        <div class="form-group">
            <label for="data">Data</label>
            <input type="date" class="form-control" id="data" name="data" v-model="$store.state.item.data">
        </div>
    </formulario>
    <span slot="botoes">
        <button form="formEditar" class="btn btn-info">Salvar</button>
    </span>
</modal>

<modal nome="detalhe" v-bind:titulo="$store.state.item.titulo">
    <p>@{{ $store.state.item.descricao }}</p>
</modal>
@endsection