@extends('layouts.app')

@section('content')

    <div class="row">
        @include('usuarios.cadastros.menuLateral')

        <!-- Table de Listagem de Hora de entrada -->
        <br/>

        <div class="col-md-10">
            @if ($errors->any())

                @foreach ($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ $error }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                @endforeach

            @endif

            <div class="index_conteudo">
                <div class="row">
                    <div class="col-sm-10">
                        <h2>Cadastrar Desbravadores</h2>
                    </div>
                    <div class="col-sm-2">
                        <a href="{{ url('/hora_da_entrada') }}" class="btn btn-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar</a>
                    </div>
                </div>
                <hr/>
                <!-- Formulario de Cadastro -->
                <form method="post" name="form_hora_de_entrada" id="form_hora_de_entrada" action="/hora_da_entrada" enctype="multipart/form-data" >
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="descricao" class="required_field">Descrição</label>
                                <input type="text" required="true" class="form-control" id="descricao" name="descricao" aria-describedby="descricao" placeholder="descricao">
                            </div>
                        </div>


                        <!-- linha de baixo -->

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Data da programação</label>
                                <div class="input-group date" required="true" data-provide="datepicker">
                                    <input type="text" class="form-control date" id="data_programacao" name="data_programacao" aria-describedby="Data da programação" placeholder="Data da programação" >
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-th"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="hora_programacao">Hora da programação</label>
                                <div class="input-group " required="true" >
                                    <input type="text" class="form-control hora" id="hora_programacao" name="hora_programacao" aria-describedby="Hora da programação" placeholder="Hora da programação" >
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="pontos" class="required_field">Pontos</label>
                                <input type="number" required="true" class="form-control" id="pontos" name="pontos" aria-describedby="pontos" placeholder="pontos">
                            </div>

                        </div>

                        <!-- outra linha -->

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

@push('scripts')
    <script src="{{ asset('js/usuarios/cadastro.js') }}" defer></script>
@endpush
