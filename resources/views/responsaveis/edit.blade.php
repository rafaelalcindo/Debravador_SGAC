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
                        <h2>Editar Responsaveis {{ $responsavel->nome }} {{ $responsavel->sobrenome }} </h2>
                    </div>
                    <div class="col-sm-2">
                        <a href="{{ url('/responsaveis/index/'.$usuario->id) }}" class="btn btn-primary">Voltar</a>
                    </div>
                </div>
                <hr/>
                <!-- Formulario de Cadastro -->
                <form method="post" name="form_responsavel" id="form_responsavel" action="/responsaveis/{{ $responsavel->id }}" >
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PUT" />
                    <div class="row">

                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nome</label>
                                    <input type="text" class="form-control" id="nome" name="nome" value="{{ $responsavel->nome }}" aria-describedby="nome" placeholder="Nome">
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Sobrenome</label>
                                    <input type="text" class="form-control" id="sobrenome" name="sobrenome" value="{{ $responsavel->sobrenome }}" aria-describedby="Sobrenome" placeholder="Sobrenome">
                                </div>
                            </div>

                            <!-- linha de baixo -->

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Cep</label>
                                    <input type="text" class="form-control" id="cep" name="cep" value="{{ $responsavel->cep }}" aria-describedby="Cep" >
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Endereço</label>
                                    <input type="text" class="form-control" id="endereco" name="endereco" value="{{ $responsavel->endereco }}" aria-describedby="Endereço" placeholder="Endereço" >
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Complemento</label>
                                    <input type="text" class="form-control" id="complemento" name="complemento" value="{{ $responsavel->complemento }}" aria-describedby="Complemento" placeholder="Complemento" >
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Cidade</label>
                                    <input type="text" class="form-control" id="cidade" name="cidade" value="{{ $responsavel->cidade }}" aria-describedby="Cidade" placeholder="Cidade" >
                                </div>
                            </div>

                            <!-- linha de baixo -->

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Estado</label>
                                    <input type="text" class="form-control" id="estado" name="estado" value="{{ $responsavel->estado }}" aria-describedby="Estado" placeholder="Estado" >
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Telefone</label>
                                    <input type="text" class="form-control" id="telefone" name="telefone" value="{{ $responsavel->telefone }}" aria-describedby="Telefone" placeholder="Telefone" >
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Celular</label>
                                    <input type="text" class="form-control" id="celular" name="celular" value="{{ $responsavel->celular }}" aria-describedby="Celular" placeholder="Celular" >
                                </div>
                            </div>
                            <!-- linha de baixo -->

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">RG</label>
                                    <input type="text" class="form-control" id="rg" name="rg" value="{{ $responsavel->rg }}" aria-describedby="RG" placeholder="RG" >
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">CPF</label>
                                    <input type="text" class="form-control" id="cpf" name="cpf" value="{{ $responsavel->cpf }}" aria-describedby="CPF" placeholder="CPF" >
                                </div>
                            </div>

                            <input type="hidden" id="id_usuario" name="id_usuario" value="{{ $usuario->id }}" />

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