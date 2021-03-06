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
                        <h2>Cadastrar Eventos</h2>
                    </div>
                    <div class="col-sm-2">
                        <a href="{{ url('eventos') }}" class="btn btn-primary">Voltar</a>
                    </div>
                </div>
                <hr/>
                <!-- Formulario de Cadastro -->
                <form method="post" name="form_evento" id="form_evento" action="/eventos" >
                    {{ csrf_field() }}



                    <div class="row">

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Título</label>
                                <input type="text" class="form-control" id="titulo" name="titulo" aria-describedby="titulo" placeholder="Título do Evento">
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Descrição</label>
                                <input type="text" class="form-control" id="descricao" name="descricao" aria-describedby="descricao" placeholder="descricao">
                            </div>
                        </div>

                        <!-- linha de baixo -->

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Data do Evento</label>
                                <div class="input-group date" data-provide="datepicker">
                                    <input type="text" class="form-control date" id="data_evento" name="data_evento" aria-describedby="data pontos" placeholder="Data do Evento" >
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-th"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="ponto_evento">Pontos</label>
                                <input type="number" class="form-control" id="ponto_evento" name="ponto_evento" aria-describedby="ponto_evento" placeholder="ponto_evento">
                            </div>
                        </div>


                        <!-- outra linha -->
                    </div>
                    <h3>Participantes do Evento</h3><hr/><br/>

                    <div class="row">
                        @foreach($usuarios as $usuario)
                            <div class="col-sm-2">
                                <div class="div_desbravador">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox"  class="custom-control-input" value="{{$usuario->id}}" name="check_desbravador[]" id="check_desbravador{{$usuario->id}}" />
                                        <label class="custom-control-label" for="check_desbravador{{ $usuario->id }}" > {{ $usuario->nome }} {{ $usuario->sobrenome }} </label>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div><br/>

                    <div class="row">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-outline-primary btn-lg btn-block">Gravar Evento</button>
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
