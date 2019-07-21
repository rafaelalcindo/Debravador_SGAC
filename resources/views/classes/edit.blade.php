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
                        <h2>Editar Classes</h2>
                    </div>
                    <div class="col-sm-2">
                        <a href="{{ url('/classes/index/'.$id_usuario) }}" class="btn btn-primary">Voltar</a>
                    </div>
                </div>
                <hr/>
                <!-- Formulario de Cadastro -->
                <form method="post" name="form_classes" id="form_classes" action="/classes/{{ $classe->id }}" >
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PUT" />
                    <div class="row">

                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nome</label>
                                    <input type="text" class="form-control" id="nome" name="nome" value="{{ $classe->nome }}" aria-describedby="nome" placeholder="Nome">
                                </div>
                            </div>

                            <!-- linha de baixo -->

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Instrutor</label>
                                    <input type="text" class="form-control" id="instrutor" name="instrutor" value="{{ $classe->instrutor }}" aria-describedby="Instrutor" >
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Conclusão</label>
                                    <div class="input-group date" data-provide="datepicker">
                                    <input type="text" class="form-control date" id="data_conclusao" name="data_conclusao" value="{{ $classe->data_conclusao }}" aria-describedby="data_conclusao" placeholder="Conclusão" >
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-th"></span>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <input type="hidden" id="usuario_id" name="usuario_id" value="{{ $classe->usuario_id }}" />
                            <!-- outra linha -->
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
