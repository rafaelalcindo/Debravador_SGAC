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
                            <h2 class="titulo_lista" >Lista de Responsaveis</h2>
                            <div class="botao_add" >
                                <a href="{{ url('/usuarios') }}" class="btn btn-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar</a>
                                <a href="{{ url('/responsaveis/create/'.$id_usuario) }}" class="btn btn-primary">Adicionar +</a>
                            </div>
                            <hr/>

                        </div>
                        <div class="lista_index ">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Nome</th>
                                        <th scope="col"> Ações </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($resposaveis)
                                            @foreach ($resposaveis as $resposavel)
                                                <tr>
                                                    <td>{{ $resposavel->nome }} {{ $resposavel->sobrenome }}</td>
                                                    <td>
                                                        <a href="{{ url('/responsaveis/edit/'.$resposavel->id.'/'.$id_usuario ) }}" class="btn btn-warning" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                        <a href="{{ url('/responsaveis/delete/'.$resposavel->id.'/'.$id_usuario ) }}" class="btn btn-danger" ><i class="fa fa-times-circle" aria-hidden="true"></i></a>
                                                        <a href="{{ url('/responsaveis/show/'.$resposavel->id.'/'.$id_usuario ) }}" class="btn btn-info" ><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                    @endif
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
