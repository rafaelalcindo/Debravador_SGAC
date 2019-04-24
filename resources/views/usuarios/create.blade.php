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
                        <h2>Cadastrar Desbravadores</h2>
                    </div>
                    <div class="col-sm-2">
                        <a href="{{ url('/usuarios') }}" class="btn btn-primary">Voltar</a>
                    </div>
                </div>
                <hr/>
                <!-- Formulario de Cadastro -->
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nome</label>
                            <input type="text" class="form-control" id="nome" aria-describedby="nome" placeholder="Nome">
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Sobrenome</label>
                            <input type="text" class="form-control" id="sobrenome" name="sobrenome" aria-describedby="Sobrenome" placeholder="Sobrenome">
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Login</label>
                            <input type="text" class="form-control" id="login" name="login" aria-describedby="Login" placeholder="Login">
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Senha</label>
                            <input type="password" class="form-control" id="password" name="password" aria-describedby="password" >
                        </div>
                    </div>
                    <!-- linha de baixo -->

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Cep</label>
                            <input type="text" class="form-control" id="cep" name="cep" aria-describedby="Cep" >
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Endereço</label>
                            <input type="text" class="form-control" id="endereco" name="endereco" aria-describedby="Endereço" placeholder="Endereço" >
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Complemento</label>
                            <input type="text" class="form-control" id="complemento" name="complemento" aria-describedby="Complemento" placeholder="Complemento" >
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Cidade</label>
                            <input type="text" class="form-control" id="cidade" name="cidade" aria-describedby="Cidade" placeholder="Cidade" >
                        </div>
                    </div>

                    <!-- linha de baixo -->

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Estado</label>
                            <input type="text" class="form-control" id="estado" name="estado" aria-describedby="Estado" placeholder="Estado" >
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Telefone</label>
                            <input type="text" class="form-control" id="telefone" name="telefone" aria-describedby="Telefone" placeholder="Telefone" >
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Celular</label>
                            <input type="text" class="form-control" id="celular" name="celular" aria-describedby="Celular" placeholder="Celular" >
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ativo</label>
                            <input type="text" class="form-control" id="ativo" name="ativo" aria-describedby="Ativo" placeholder="Ativo" >
                        </div>
                    </div>

                    <!-- linha de baixo -->

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Data Nascimento</label>
                            <input type="text" class="form-control" id="data_nasc" name="data_nasc" aria-describedby="Data Nascimento" placeholder="Data Nascimento" >
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="exampleInputEmail1">RG</label>
                            <input type="text" class="form-control" id="rg" name="rg" aria-describedby="RG" placeholder="RG" >
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
                            <input type="text" class="form-control" id="tamanho_camisa" name="tamanho_camisa" aria-describedby="Tamanho da Camisa" placeholder="Tamanho da Camisa" >
                        </div>
                    </div>

                    <!-- outra linha -->

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nível</label>
                            <input type="text" class="form-control" id="nivel" name="nivel" aria-describedby="Nivel" placeholder="Nível" >
                        </div>
                    </div>


                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Unidade</label>
                            <select id="unidade" name="unidade" class="form-control" >
                                <option>teste</option>
                            </select>
                        </div>
                    </div>



                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <button type="button" class="btn btn-outline-primary btn-lg btn-block">Salvar</button>
                    </div>
                </div>
            </div>
        </div>       
    </div>

    </div>
@endsection

@push('styles')

    <link href="{{ asset('css/usuarios/menus.css') }}" rel="stylesheet">

@endpush