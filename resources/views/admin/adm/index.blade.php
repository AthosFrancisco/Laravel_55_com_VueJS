@extends('layouts.app')

@section('content')
<pagina tamanho="10">

    @if ($errors->all())
    <div class="alert alert-danger alert-dismissible text-center" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                aria-hidden="true">&times;</span></button>
        @foreach ($errors->all() as $key => $value)
        <li><strong>{{ $value }}</strong></li>
        @endforeach
    </div>
    @endif

    <painel titulo="Lista de usuários">
        <migalhas v-bind:lista="{{ $listaMigalhas }}"></migalhas>
        <tabela-lista v-bind:titulos="['#', 'Nome', 'E-mail']" v-bind:itens="{{ json_encode($listaModelo) }}"
            ordem="asc" ordemcol="1" criar="#criar" detalhe="/admin/adm/" editar="/admin/adm/"
            deletar="" token="{{ csrf_token() }}" modal="sim">
        </tabela-lista>
        <div align="center">
            {{ $listaModelo }}
        </div>
    </painel>
</pagina>

<modal nome="adicionar" titulo="Adicionar">
    <formulario id="formAdicionar" css="" action="{{ route('adm.store') }}" method="post" enctype=""
        token="{{ csrf_token() }}">
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" id="name" placeholder="Nome" name="name" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="text" class="form-control" id="email" placeholder="E-mail" name="email"
                value="{{ old('email') }}">
        </div>
        <div class="form-group">
            <label for="admin">Admin</label>
            <select type="text" class="form-control" id="admin" placeholder="Admin" name="admin">
                <option {{ (old('admin') && old('admin') == 'N' ? 'selected' : '') }} value="N">Não</option>
                <option {{ (old('admin') && old('admin') == 'S' ? 'selected' : '') }} value="S">Sim</option>
            </select>
        </div>
        <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}">
        </div>
    </formulario>
    <span slot="botoes">
        <button form="formAdicionar" class="btn btn-info">Adicionar</button>
    </span>
</modal>

<modal nome="editar" titulo="Editar">
    <formulario id="formEditar" css="" v-bind:action="'{{ route('adm.index') }}/'+$store.state.item.id"
        method="put" enctype="multipart/form-data" token="{{ csrf_token() }}">
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" id="name" placeholder="Nome" name="name"
                v-model="$store.state.item.name">
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="text" class="form-control" id="email" placeholder="E-mail" name="email"
                v-model="$store.state.item.email">
        </div>
        <div class="form-group">
            <label for="admin">Admin</label>
            <select type="text" class="form-control" id="admin" placeholder="E-mail" name="admin"
                v-model="$store.state.item.admin">
                <option value="N">Não</option>
                <option value="S">Sim</option>
            </select>
        </div>
        <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" class="form-control" id="password" name="password"
                v-model="$store.state.item.password">
        </div>
    </formulario>
    <span slot="botoes">
        <button form="formEditar" class="btn btn-info">Salvar</button>
    </span>
</modal>

<modal nome="detalhe" v-bind:titulo="$store.state.item.name">
    <p>@{{ $store.state.item.email }}</p>
</modal>
@endsection