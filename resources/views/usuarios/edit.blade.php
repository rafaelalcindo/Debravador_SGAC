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
                        <h2>Editar Desbravadores: {{ $usuario->nome }}</h2>
                    </div>
                    <div class="col-sm-2">
                        <a href="{{ url('/usuarios') }}" class="btn btn-primary">Voltar</a>
                    </div>
                </div>
                <hr/>
                <!-- Formulario de Cadastro -->
                <form method="post" name="form_desbravador" id="form_desbravador" action="/usuarios/{{ $usuario->id }}" >
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PUT" />

                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nome</label>
                                <input type="text" class="form-control" id="nome" name="nome" value="{{ $usuario->nome }}" aria-describedby="nome" placeholder="Nome">
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Sobrenome</label>
                                <input type="text" class="form-control" id="sobrenome" name="sobrenome" value="{{ $usuario->sobrenome }}" aria-describedby="Sobrenome" placeholder="Sobrenome">
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Login</label>
                                <input type="text" class="form-control" id="login" name="login" aria-describedby="Login" value="{{ $usuario->login }}"  placeholder="Login">
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Senha</label>
                                <input type="password" class="form-control" id="password" name="password" value="{{ $usuario->password }}" aria-describedby="password" >
                            </div>
                        </div>
                        <!-- linha de baixo -->

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Cep</label>
                                <input type="text" class="form-control" id="cep" name="cep" value="{{ $usuario->cep }}" aria-describedby="Cep" >
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Endereço</label>
                                <input type="text" class="form-control" id="endereco" name="endereco" value="{{ $usuario->endereco }}" aria-describedby="Endereço" placeholder="Endereço" >
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Complemento</label>
                                <input type="text" class="form-control" id="complemento" name="complemento" value="{{ $usuario->complemento }}"  aria-describedby="Complemento" placeholder="Complemento" >
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Cidade</label>
                                <input type="text" class="form-control" id="cidade" name="cidade" aria-describedby="Cidade" value="{{ $usuario->cidade }}" placeholder="Cidade" >
                            </div>
                        </div>

                        <!-- linha de baixo -->

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Estado</label>
                                <input type="text" class="form-control" id="estado" name="estado" aria-describedby="Estado" value="{{ $usuario->estado }}" placeholder="Estado" >
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Telefone</label>
                                <input type="text" class="form-control" id="telefone" name="telefone" aria-describedby="Telefone" value="{{ $usuario->telefone }}" placeholder="Telefone" >
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Celular</label>
                                <input type="text" class="form-control" id="celular" name="celular" aria-describedby="Celular" value="{{ $usuario->celular }}" placeholder="Celular" >
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ativo</label>
                                <input type="text" class="form-control" id="ativo" name="ativo" aria-describedby="Ativo" value="{{ $usuario->ativo }}" placeholder="Ativo" >
                            </div>
                        </div>

                        <!-- linha de baixo -->

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Data Nascimento</label>
                                <input type="text" class="form-control" id="data_nasc" name="data_nasc" value="{{ $usuario->data_nasc }}" aria-describedby="Data Nascimento" placeholder="Data Nascimento" >
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">RG</label>
                                <input type="text" class="form-control" id="rg" name="rg" aria-describedby="RG" value="{{ $usuario->rg }}" placeholder="RG" >
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">CPF</label>
                                <input type="text" class="form-control" id="cpf" name="cpf" value="{{ $usuario->cpf }}" aria-describedby="CPF" placeholder="CPF" >
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tamanho da camisa</label>
                                <input type="text" class="form-control" id="tamanho_camisa" name="tamanho_camisa" value="{{ $usuario->tamanho_camisa }}" aria-describedby="Tamanho da Camisa" placeholder="Tamanho da Camisa" >
                            </div>
                        </div>

                        <!-- outra linha -->

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nível</label>
                                <input type="text" class="form-control" id="nivel" name="nivel" value="{{ $usuario->nivel }}" aria-describedby="Nivel" placeholder="Nível" >
                            </div>
                        </div>


                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Unidade</label>
                                <select id="unidade" name="unidade_id" value="{{ $usuario->unidade_id }}" class="form-control" >
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