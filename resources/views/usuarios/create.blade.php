@extends('layouts.app')

@section('content')
     <!-- Menu Lateral -->
    <div class="row">

        @include('usuarios.cadastros.menuLateral')

        <!-- Table de Listagem de Usuários -->

        <br/>



        <div class="col-md-10" >

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
                        <a href="{{ url('/usuarios') }}" class="btn btn-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar</a>
                    </div>
                </div>
                <hr/>
                <!-- Formulario de Cadastro -->
                <form method="post" name="form_desbravador" id="form_desbravador" action="/usuarios" >
                    {{ csrf_field() }}


                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="nome" class="required_field">Nome</label>
                                <input type="text" required="true" class="form-control" id="nome" name="nome" aria-describedby="nome" placeholder="Nome">
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="sobrenome" class="required_field">Sobrenome</label>
                                <input type="text" required="true" class="form-control" id="sobrenome" name="sobrenome" aria-describedby="Sobrenome" placeholder="Sobrenome">
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="login"  class="required_field">Login</label>
                                <input type="text" required="true" class="form-control" id="login" name="login" aria-describedby="Login" placeholder="Login">
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="password" class="required_field">Senha</label>
                                <input type="password" required="true" class="form-control" id="password" name="password" aria-describedby="password" >
                            </div>
                        </div>
                        <!-- linha de baixo -->

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="cep" class="required_field">Cep</label>
                                <input type="text" required="true" class="form-control" id="cep" name="cep" aria-describedby="Cep" >
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="required_field">Endereço</label>
                                <input type="text" required="true" class="form-control" id="endereco" name="endereco" aria-describedby="Endereço" placeholder="Endereço" >
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="complemento" class="required_field">Complemento</label>
                                <input type="text" class="form-control" id="complemento" name="complemento" aria-describedby="Complemento" placeholder="Complemento" >
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="cidade" class="required_field">Cidade</label>
                                <input type="text" required="true" class="form-control" id="cidade" name="cidade" aria-describedby="Cidade" placeholder="Cidade" >
                            </div>
                        </div>

                        <!-- linha de baixo -->

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="estado" class="required_field">Estado</label>
                                <input type="text" required="true" class="form-control" id="estado" name="estado" aria-describedby="Estado" placeholder="Estado" >
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="tel" class="required_field">Telefone</label>
                                <input type="text" class="form-control" id="telefone" name="tel" aria-describedby="Telefone" placeholder="Telefone" >
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="cel" class="required_field">Celular</label>
                                <input type="text" class="form-control" id="celular" name="cel" aria-describedby="Celular" placeholder="Celular" >
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="ativo">Ativo</label>
                                <select id="ativo" required="true" name="ativo" class="form-control" >
                                    <option value="{{true}}" >Ativo</option>
                                    <option value="0" >Não ativo</option>
                                </select>

                            </div>
                        </div>

                        <!-- linha de baixo -->

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Data Nascimento</label>
                                <div class="input-group date" required="true" data-provide="datepicker">
                                    <input type="text" class="form-control date" id="data_nasc" name="data_nasc" aria-describedby="Data Nascimento" placeholder="Data Nascimento" >
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-th"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">RG</label>
                                <input type="text" required="true" class="form-control" id="rg" name="rg" aria-describedby="RG" placeholder="RG" >
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">CPF</label>
                                <input type="text" class="form-control" id="cpf" name="cpf" aria-describedby="CPF" placeholder="CPF" >
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tamanho da camisa</label>
                                <input type="text"  class="form-control" id="tamanho_camisa" name="tamanho_camisa" aria-describedby="Tamanho da Camisa" placeholder="Tamanho da Camisa" >
                            </div>
                        </div>

                        <!-- outra linha -->

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="nivel">Nível</label>
                                <select id="nivel" name="nivel" class="form-control" >
                                    <option value="1" >Administrativo</option>
                                    <option value="2" >Secretaria</option>
                                    <option value="3" >Conselheiros</option>
                                    <option value="4" >Desbravadores</option>
                                </select>

                            </div>
                        </div>


                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Unidade</label>
                                <select id="unidade" name="unidade_id" class="form-control" >
                                    @foreach($unidades as $unidade)
                                        <option value="{{ $unidade->id }}" >{{ $unidade->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
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
