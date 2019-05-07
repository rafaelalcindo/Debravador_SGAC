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
                        <h2>Dados do Responsavel: {{ $responsavel->nome }} </h2>
                    </div>
                    <div class="col-sm-2">
                        <a href="{{ url('/responsaveis/index/'.$usuario->id) }}" class="btn btn-primary">Voltar</a>
                    </div>
                </div>
                <hr/>
                <!-- Formulario de Cadastro -->
                <table class="table">                    
                    <tbody>
                        <tr>
                            <td> <h5>Id: </h5></td>
                            <td>{{$responsavel->id}}</td>
                        </tr>

                        <tr>
                            <td><h5>Nome: </h5></td>
                            <td>{{$responsavel->nome}}</td>
                        </tr>

                        <tr>
                            <td><h5>Sobrenome: </h5></td>
                            <td>{{$responsavel->sobrenome}}</td>
                        </tr>

                        <tr>
                            <td><h5>cep: </h5></td>
                            <td>{{$responsavel->cep}}</td>
                        </tr>

                        <tr>
                            <td><h5>Endereço: </h5></td>
                            <td>{{$responsavel->endereco}}</td>
                        </tr>

                        <tr>
                            <td><h5>Complemento: </h5></td>
                            <td>{{$responsavel->complemento}}</td>
                        </tr>

                        <tr>
                            <td><h5>Cidade: </h5></td>
                            <td>{{$responsavel->cidade}}</td>
                        </tr>

                        <tr>
                            <td><h5>Estado: </h5></td>
                            <td>{{$responsavel->estado}}</td>
                        </tr>

                        <tr>
                            <td><h5>Telefone: </h5></td>
                            <td> <p id="telefone" > {{ $responsavel->tel }}</p> </td>
                        </tr>

                        <tr>
                            <td><h5>Cel: </h5></td>
                            <td> <p id="celular" > {{$responsavel->cel}} </p> </td>
                        </tr>

                        <tr>
                            <td><h5>RG: </h5></td>
                            <td> <p id="rg" > {{$responsavel->rg}} </p> </td>
                        </tr>

                        <tr>
                            <td><h5>CPF: </h5></td>
                            <td> <p id="cpf" > {{$responsavel->cpf}} </p> </td>
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