@extends('layouts.app')

@section('content')
     <!-- Menu Lateral -->
    <div class="row">

        @include('usuarios.cadastros.menuLateral')

        <!-- Table de Listagem de Usuários -->
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
                        <h2>Editar Desbravadores: {{ $usuario->nome }}</h2>
                    </div>
                    <div class="col-sm-2">
                        <a href="{{ url('/usuarios') }}" class="btn btn-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar</a>
                    </div>
                </div>
                <hr/>
                <!-- Formulario de Cadastro -->
                <form method="post" name="form_desbravador" id="form_desbravador" action="/usuarios/{{ $usuario->id }}" enctype="multipart/form-data" >
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PUT" />

                    <div class="row">
                        <div class="col-md-3">
                            <img src="{{ $usuario->foto_perfil? $usuario->foto_perfil : asset('assets/imagens/user_icon.png') }}" class="imagem_perfil" name="foto_imagem" id="foto_imagem" />
                            <input id="foto_perfil_upload"  accept="image/*" onchange="carregarImagem(event)" type="file" name="foto_perfil_upload" style="display:none"/>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="nome" class="required_field">Nome</label>
                                <input type="text" required="true" class="form-control" id="nome" name="nome" value="{{ $usuario->nome }}" aria-describedby="nome" placeholder="Nome">
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="sobrenome" class="required_field">Sobrenome</label>
                                <input type="text" class="form-control" id="sobrenome" name="sobrenome" value="{{ $usuario->sobrenome }}" aria-describedby="Sobrenome" placeholder="Sobrenome">
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="login" class="required_field">Login</label>
                                <input type="text" class="form-control" id="login" name="login" aria-describedby="Login" value="{{ $usuario->login }}"  placeholder="Login">
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="password">Senha</label>
                                <input type="password" class="form-control" id="password" name="password" value="" aria-describedby="password" >
                            </div>
                        </div>
                        <!-- linha de baixo -->

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="cep" class="required_field">Cep</label>
                                <input type="text" class="form-control" id="cep" name="cep" value="{{ $usuario->cep }}" aria-describedby="Cep" >
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group" class="required_field">
                                <label for="endereco">Endereço</label>
                                <input type="text" class="form-control" id="endereco" name="endereco" value="{{ $usuario->endereco }}" aria-describedby="Endereço" placeholder="Endereço" >
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="complemento">Complemento</label>
                                <input type="text" class="form-control" id="complemento" name="complemento" value="{{ $usuario->complemento }}"  aria-describedby="Complemento" placeholder="Complemento" >
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="cidade" class="required_field">Cidade</label>
                                <input type="text" class="form-control" id="cidade" name="cidade" aria-describedby="Cidade" value="{{ $usuario->cidade }}" placeholder="Cidade" >
                            </div>
                        </div>

                        <!-- linha de baixo -->

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="estado" class="required_field">Estado</label>
                                <input type="text" class="form-control" id="estado" name="estado" aria-describedby="Estado" value="{{ $usuario->estado }}" placeholder="Estado" >
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="tel">Telefone</label>
                                <input type="text" class="form-control" id="telefone" name="tel" aria-describedby="Telefone" value="{{ $usuario->tel }}" placeholder="Telefone" >
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="celular">Celular</label>
                                <input type="text" class="form-control" id="celular" name="cel" aria-describedby="Celular" value="{{ $usuario->cel }}" placeholder="Celular" >
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ativo</label>
                                <label for="ativo">Ativo</label>
                                <select id="ativo" name="ativo" class="form-control" >
                                    <option value="{{true}}" {{$usuario->ativo? "selected" : ''}} >Ativo</option>
                                    <option value="0" {{$usuario->ativo? '' : 'selected'}} >Não ativo</option>
                                </select>

                            </div>
                        </div>

                        <!-- linha de baixo -->

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="data_nasc date" class="required_field">Data Nascimento</label>
                                <input type="text" class="form-control date" id="data_nasc" name="data_nasc" value="{{ $usuario->data_nasc }}" aria-describedby="Data Nascimento" placeholder="Data Nascimento" >
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="rg">RG</label>
                                <input type="text" class="form-control" id="rg" name="rg" aria-describedby="RG" value="{{ $usuario->rg }}" placeholder="RG" >
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="cpf">CPF</label>
                                <input type="text" class="form-control" id="cpf" name="cpf" value="{{ $usuario->cpf }}" aria-describedby="CPF" placeholder="CPF" >
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="tamanho_camisa">Tamanho da camisa</label>
                                <input type="text" class="form-control" id="tamanho_camisa" name="tamanho_camisa" value="{{ $usuario->tamanho_camisa }}" aria-describedby="Tamanho da Camisa" placeholder="Tamanho da Camisa" >
                            </div>
                        </div>

                        <!-- outra linha -->

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="nivel">Nível</label>
                                <select id="nivel" name="nivel" class="form-control" >
                                    <option value="1" {{ ($usuario->nivel == 1)? 'selected' : '' }} >Administrativo</option>
                                    <option value="2" {{ ($usuario->nivel == 2)? 'selected' : '' }} >Secretaria</option>
                                    <option value="3" {{ ($usuario->nivel == 3)? 'selected' : '' }} >Conselheiros</option>
                                    <option value="4" {{ ($usuario->nivel == 4)? 'selected' : '' }} >Desbravadores</option>
                                </select>

                            </div>
                        </div>


                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="unidade">Unidade</label>
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

@push('scripts')
    <script src="{{ asset('js/usuarios/cadastro.js') }}" defer></script>
@endpush
