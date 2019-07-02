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
                        <h2>Cadastrar Especialidade</h2>
                    </div>
                    <div class="col-sm-2">
                        <a href="{{ url('/especialidades/index/'.$id_usuario) }}" class="btn btn-primary">Voltar</a>
                    </div>
                </div>
                <hr/>
                <!-- Formulario de Cadastro -->
                <form method="post" name="form_especialidade" id="form_especialidade" action="/especialidades" >
                    {{ csrf_field() }}

                    <div class="row">

                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nome</label>
                                    <input type="text" class="form-control" id="nome" name="nome" aria-describedby="nome" placeholder="Nome">
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">area</label>
                                    <input type="text" class="form-control" id="area" name="area" aria-describedby="area" placeholder="Area">
                                </div>
                            </div>

                            <!-- linha de baixo -->

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Instrutor</label>
                                    <input type="text" class="form-control" id="instrutor" name="instrutor" aria-describedby="Instrutor" >
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Conclusão</label>
                                    <div class="input-group date" data-provide="datepicker">
                                    <input type="text" class="form-control date" id="conclusao" name="conclusao" aria-describedby="conclusao" placeholder="Conclusão" >
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-th"></span>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <input type="hidden" id="usuario_id" name="usuario_id" value="{{ $id_usuario }}" />
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

    </div>
@endsection

@push('styles')

    <link href="{{ asset('css/usuarios/menus.css') }}" rel="stylesheet">

@endpush
