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
                                    <select id="nome" name="nome" class="form-control" >
                                        <option value="amigo" {{ ($classe->nome == 'amigo')? 'selected' : '' }} >Amigo</option>
                                        <option value="companheiro" {{ ($classe->nome == 'companheiro')? 'selected' : '' }} >Companheiro</option>
                                        <option value="pesquisador" {{ ($classe->nome == 'pesquisador')? 'selected' : '' }} >Pesquisador</option>
                                        <option value="pioneiro" {{ ($classe->nome == 'pioneiro')? 'selected' : '' }} >Pioneiro</option>
                                        <option value="excurcionista" {{ ($classe->nome == 'excurcionista')? 'selected' : '' }} >Excurcinista</option>
                                        <option value="guia" {{ ($classe->nome == 'guia')? 'selected' : '' }}  >Guia</option>

                                        <option value="amigo_avancado" {{ ($classe->nome == 'amigo_avancado')? 'selected' : '' }} >Amigo Avançado</option>
                                        <option value="companheiro_avancado" {{ ($classe->nome == 'companheiro_avancado')? 'selected' : '' }} >Companheiro Avançado</option>
                                        <option value="pesquisador_avancado" {{ ($classe->nome == 'pesquisador_avancado')? 'selected' : '' }} >Pesquisador Avançado</option>
                                        <option value="pioneiro_avancado" {{ ($classe->nome == 'pioneiro_avancado')? 'selected' : '' }} >Pioneiro Avançado</option>
                                        <option value="excurcionista_avancado" {{ ($classe->nome == 'excurcionista_avancado')? 'selected' : '' }} >Excurcinista Avançado</option>
                                        <option value="guia_avancado" {{ ($classe->nome == 'guia_avancado')? 'selected' : '' }} >Guia Avançado</option>

                                        <option value="lider" {{ ($classe->nome == 'lider')? 'selected' : '' }} >Lider</option>
                                        <option value="lider_master" {{ ($classe->nome == 'lider_master')? 'selected' : '' }} >Lider Master</option>
                                        <option value="lider_master_avancado" {{ ($classe->nome == 'lider_master_avancado')? 'selected' : '' }} >Lider Master Avançado</option>
                                    </select>
                                    {{-- <input type="text" class="form-control" id="nome" name="nome" value="{{ $classe->nome }}" aria-describedby="nome" placeholder="Nome"> --}}
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
                                    <input type="text" class="form-control date date_mask" id="data_conclusao" name="data_conclusao" value="{{ $classe->data_conclusao }}" aria-describedby="data_conclusao" placeholder="Conclusão" >
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
