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
                        <h2>Dados da Desbravador: {{ $usuario->nome }} </h2>
                    </div>
                    <div class="col-sm-2">
                        <a href="{{ url('/usuarios') }}" class="btn btn-primary">Voltar</a>
                    </div>
                </div>
                <hr/>
                <!-- Formulario de Cadastro -->
                <table class="table">                    
                    <tbody>
                        <tr>
                            <td> <h5>Id: </h5></td>
                            <td>{{$usuario->id}}</td>
                        </tr>

                        <tr>
                            <td><h5>Nome: </h5></td>
                            <td>{{$usuario->nome}}</td>
                        </tr>

                        <tr>
                            <td><h5>Sobrenome: </h5></td>
                            <td>{{$usuario->sobrenome}}</td>
                        </tr>

                        <tr>
                            <td><h5>login: </h5></td>
                            <td>{{$usuario->login}}</td>
                        </tr>

                        <tr>
                            <td><h5>cep: </h5></td>
                            <td>{{$usuario->cep}}</td>
                        </tr>

                        <tr>
                            <td><h5>Endereço: </h5></td>
                            <td>{{$usuario->endereco}}</td>
                        </tr>

                        <tr>
                            <td><h5>Complemento: </h5></td>
                            <td>{{$usuario->complemento}}</td>
                        </tr>

                        <tr>
                            <td><h5>Cidade: </h5></td>
                            <td>{{$usuario->cidade}}</td>
                        </tr>

                        <tr>
                            <td><h5>Estado: </h5></td>
                            <td>{{$usuario->estado}}</td>
                        </tr>

                        <tr>
                            <td><h5>Tel: </h5></td>
                            <td>{{$usuario->tel}}</td>
                        </tr>

                        <tr>
                            <td><h5>Cel: </h5></td>
                            <td>{{$usuario->cel}}</td>
                        </tr>

                        <tr>
                            <td><h5>Ativo: </h5></td>
                            <td>{{$usuario->ativo}}</td>
                        </tr>

                        <tr>
                            <td><h5>Data Nascimento: </h5></td>
                            <td>{{$usuario->data_nasc}}</td>
                        </tr>

                        <tr>
                            <td><h5>RG: </h5></td>
                            <td>{{$usuario->rg}}</td>
                        </tr>

                        <tr>
                            <td><h5>CPF: </h5></td>
                            <td>{{$usuario->cpf}}</td>
                        </tr>

                        <tr>
                            <td><h5>Tamanho da Camisa: </h5></td>
                            <td>{{$usuario->tamanho_camisa}}</td>
                        </tr>

                        <tr>
                            <td><h5>Tamanho da Camisa: </h5></td>
                            <td>{{$usuario->tamanho_camisa}}</td>
                        </tr>

                        <tr>
                            <td><h5>Nível: </h5></td>
                            <td>{{$usuario->nivel}}</td>
                        </tr>
                        
                    </tbody>
                </table>

            </div>
        </div>       
    </div>

    </div>
@endsection

@push('styles')

    <link href="{{ asset('css/usuarios/menus.css') }}" rel="stylesheet">

@endpush