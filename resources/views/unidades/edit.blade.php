@extends('layouts.app')

@section('content')
     <!-- Menu Lateral -->
    <div class="row">

        @include('usuarios.cadastros.menuLateral')

        <!-- Table de Listagem de Usuários -->
        <div class="col-md-10" >

            <div class="index_conteudo">
                <div class="row">
                    <div class="col-sm-10">
                        <h2>Editar Unidade: {{ $unidade->nome }}</h2>
                    </div>
                    <div class="col-sm-2">
                        <a href="{{ url('/unidades') }}" class="btn btn-primary">Voltar</a>
                    </div>
                </div>
                <hr/>
                <!-- Formulario de Cadastro -->
                <form method="post" name="form_unidade" id="form_unidade" action="/unidades/{{ $unidade->id }}" >
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PUT" />
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nome</label>
                                <input type="text" class="form-control" id="nome" name="nome" value="{{ $unidade->nome }}" aria-describedby="nome" placeholder="Nome">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Equipamentos</label>
                                <textarea name="equipamentos" id="equipamentos" value="{{ $unidade->equipamentos }}" class="form-control"  rows="3">{{ $unidade->equipamentos }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-outline-primary btn-lg btn-block">Editar</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>       
    </div>

    </div>
@endsection

@push('styles')

    <link href="{{ asset('css/usuarios/menus.css') }}" rel="stylesheet">

@endpush