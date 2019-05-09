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
                        <h2>Dados do Ponto da Unidade </h2>
                    </div>
                    <div class="col-sm-2">
                        <a href="{{ url('/ponto-unidades') }}" class="btn btn-primary">Voltar</a>
                    </div>
                </div>
                <hr/>
                <!-- Formulario de Cadastro -->
                <table class="table">                    
                    <tbody>
                        <tr>
                            <td> <h5>Id: </h5></td>
                            <td>{{$pontoUnidade->id}}</td>
                        </tr>

                        <tr>
                            <td><h5>Pontos: </h5></td>
                            <td>{{$pontoUnidade->pontos}}</td>
                        </tr>

                        <tr>
                            <td><h5>Descrição: </h5></td>
                            <td>{{$pontoUnidade->descricao}}</td>
                        </tr>

                        <tr>
                            <td><h5>Data Pontos: </h5></td>
                            <td>{{$pontoUnidade->data_pontos}}</td>
                        </tr>

                        <tr>
                            <td><h5>Unidade: </h5></td>
                            <td>{{$pontoUnidade->unidade->nome}}</td>
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