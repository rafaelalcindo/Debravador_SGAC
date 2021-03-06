@extends('layouts.app')


@section('content')
    <div class="row">
        @include('usuarios.cadastros.menuLateral')
<!-- Table de Listagem de Usuários -->
<div class="col-md-10" >

    <div class="index_conteudo">
        <div class="row">
            <div class="col-sm-10">
                <h2>Cadastrar Pontos de quarentena</h2>
            </div>
            <div class="col-sm-2">
                <a href="{{ url('quarentenas') }}" class="btn btn-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar</a>
            </div>
        </div>
        <hr/>
        <!-- Formulario de Cadastro -->
        <form method="post" name="form_responsavel" id="form_responsavel" action="/quarentenas" >
            {{ csrf_field() }}

            <div class="row">

                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="pontos" class="required_field" >Pontos</label>
                            <input type="text" required class="form-control" id="pontos" name="pontos" aria-describedby="pontos" placeholder="pontos">
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="descricao" class="required_field">Descrição</label>
                            <input type="text" required class="form-control" id="descricao" name="descricao" aria-describedby="descricao" placeholder="descricao">
                        </div>
                    </div>

                    <!-- linha de baixo -->

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="data_pontos" class="required_field">Data Pontos</label>
                            <!-- <input type="text" class="form-control" id="data_pontos" name="data_pontos" aria-describedby="data_pontos" > -->
                            <div class="input-group date" data-provide="datepicker">
                                <input type="text" required class="form-control date" id="data_pontos" name="data_pontos" aria-describedby="data pontos" placeholder="Data Pontos" >
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Usuario</label>
                            <select id="usuario" name="usuario_id" class="form-control" >
                                @foreach($usuarios as $usuario)
                                    <option value="{{ $usuario->id }}" >{{ $usuario->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <!-- outra linha -->
                </div>

            </div>

            <div class="row">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-outline-primary btn-lg btn-block">Salvar</button>
                </div>
            </div>

        </form>

    </div>
</div>

    </div>

@endsection

@push('styles')

    <link href="{{ asset('css/usuarios/menus.css') }}" rel="stylesheet">

@endpush
