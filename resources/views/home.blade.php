@extends('layouts.app')

@section('content')
<pagina tamanho="10">
    <painel titulo="Dashboard">
            <migalhas v-bind:lista="{{ $listaMigalhas }}"></migalhas>

            <div class="row">
                <div class="col-md-4 col-xs-4">
                    <caixa qtd="80" titulo="Artigos" icone="fa fa-shopping-cart" cor="orange" url="{{ route('artigos.index') }}">

                    </caixa>
                </div>
                <div class="col-md-4 col-xs-4">
                    <caixa qtd="80" titulo="Usuários" icone="ion-person-stalker" cor="red" url="{{ route('usuarios.index') }}">

                    </caixa>
                </div>
                <div class="col-md-4 col-xs-4">
                    <painel cor="panel-info" titulo="Conteúdo 3">
                        Conteúdo 3
                    </painel>
                </div>
        </painel>
</pagina>

{{-- <example-component></example-component> --}}

{{-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
</div>
@endif

You are logged in!
</div>
</div>
</div>
</div>
</div> --}}
@endsection