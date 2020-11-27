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
                        <h2>Editar Pontos Unidade </h2>
                    </div>
                    <div class="col-sm-2">
                        <a href="{{ url('/ponto-unidades') }}" class="btn btn-primary"> <i class="fa fa-arrow-left" aria-hidden="true"></i>Voltar</a>
                    </div>
                </div>
                <hr/>
                <!-- Formulario de Cadastro -->
                <form method="post" name="form_desbravador" id="form_desbravador" action="/ponto-unidades/{{ $pontoUnidade->id }}" >
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PUT" />

                    <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="pontos" class="required_field">Pontos</label>
                                    <input type="text" required class="form-control" value="{{ $pontoUnidade->pontos }}" id="pontos" name="pontos" aria-describedby="pontos" placeholder="pontos">
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="descricao" class="required_field">Descrição</label>
                                    <input type="text" class="form-control" value="{{ $pontoUnidade->descricao }}"  id="descricao" name="descricao" aria-describedby="descricao" placeholder="descricao">
                                </div>
                            </div>

                            <!-- linha de baixo -->

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="data_pontos" class="required_field">Data Pontos</label>
                                    <input type="text" class="form-control date" value="{{ $pontoUnidade->data_pontos }}" id="data_pontos" name="data_pontos" aria-describedby="data_pontos" >
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="unidade" class="required_field">Unidade</label>
                                    <select id="unidade" value="{{ $pontoUnidade->unidade_id }}" name="unidade_id" class="form-control" >
                                        @foreach($unidades as $unidade)
                                            <option value="{{ $unidade->id }}" >{{ $unidade->nome }}</option>
                                        @endforeach
                                    </select>
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
