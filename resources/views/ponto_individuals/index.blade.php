@extends('layouts.app')

@section('content')
     <!-- Menu Lateral -->
    <div class="row">

        @include('usuarios.cadastros.menuLateral')

        <!-- Table de Listagem de Usuários -->
        <div class="col-md-10" >

            @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session()->get('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="index_conteudo">
                <div class="row">

                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="parte_filtro">
                            <h2 class="titulo_lista" >Lista de Pontos de Individual</h2>
                            <div class="botao_add" >
                                <a href="{{ url('/ponto_individuals/create') }}" class="btn btn-primary">Adicionar <i class="fa fa-plus" aria-hidden="true"></i></a>
                            </div>
                            <hr/>
                                @include('ponto_individuals.filtro.filtro')
                            <hr/>

                        </div>
                        <div class="lista_index ">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Pontos</th>
                                        <th scope="col">Descricao</th>
                                        <th scope="col">Desbravador</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pontoIndividuals as $pontoIndividua)
                                        <tr>
                                            <td>{{ $pontoIndividua->pontos }} </td>
                                            <td>{{ $pontoIndividua->descricao }}</td>
                                            <td>{{ $pontoIndividua->usuario->nome .' '. $pontoIndividua->usuario->sobrenome }}</td>
                                            <td>
                                                <a href="{{ route('ponto_individuals.edit',$pontoIndividua->id) }}" class="btn btn-warning">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                </a>
                                                <a href="{{ url('/ponto_individuals/'.$pontoIndividua->id.'/delete') }}" class="btn btn-danger">
                                                    <i class="fa fa-times-circle" aria-hidden="true"></i>
                                                </a>
                                                <a href="{{ route('ponto_individuals.show', $pontoIndividua->id) }}" class="btn btn-info" >
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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
