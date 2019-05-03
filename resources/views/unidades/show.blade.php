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
                        <h2>Dados da Unidade: {{ $unidade->nome }} </h2>
                    </div>
                    <div class="col-sm-2">
                        <a href="{{ url('/unidades') }}" class="btn btn-primary">Voltar</a>
                    </div>
                </div>
                <hr/>
                <!-- Formulario de Cadastro -->
                <table class="table">                    
                    <tbody>
                        <tr>
                            <td> <h5>Id: </h5></td>
                            <td>{{$unidade->id}}</td>
                        </tr>

                        <tr>
                            <td><h5>Nome: </h5></td>
                            <td>{{$unidade->nome}}</td>
                        </tr>

                        <tr>
                            <td><h5>Equipamentos: </h5></td>
                            <td>{{$unidade->equipamentos}}</td>
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