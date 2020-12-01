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
                            <h2 class="titulo_lista" >Lista de Pontos de Unidade</h2>
                            <div class="botao_add" >
                                <a href="{{ url('/ponto-unidades/create') }}" class="btn btn-primary">Adicionar <i class="fa fa-plus" aria-hidden="true"></i></a>
                            </div>
                            <hr/>
                            @include('ponto_unidades.filtro.filtro')
                            <hr/>
                        </div>
                        <div class="lista_index ">
                            <?php $totalPontos = 0; ?>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Pontos</th>
                                        <th scope="col">Descricao</th>
                                        <th scope="col">Unidade</th>
                                        <th scope="col">Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pontoUnidades as $pontoUnidade)
                                        <tr>
                                            <td>{{ $pontoUnidade->pontos }} </td>
                                            <td>{{ $pontoUnidade->descricao }}</td>
                                            <td>{{ $pontoUnidade->unidade->nome }}</td>
                                            <td>
                                                <a href="{{ route('ponto-unidades.edit',$pontoUnidade->id) }}" class="btn btn-warning">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                </a>
                                                <a href="{{ url('/ponto-unidades/'.$pontoUnidade->id.'/delete') }}" class="btn btn-danger">
                                                    <i class="fa fa-times-circle" aria-hidden="true"></i>
                                                </a>
                                                <a href="{{ route('ponto-unidades.show', $pontoUnidade->id) }}" class="btn btn-info" >
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php $totalPontos += $pontoUnidade->pontos; ?>
                                    @endforeach
                                    <tr class="table-primary">
                                        <td>
                                            <h4>Total de Pontos:</h4>
                                        </td>
                                        <td colspan="3">
                                            <h4>{{ $totalPontos }}</h4>
                                        </td>
                                    </tr>
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
