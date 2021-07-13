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
                            <h2 class="titulo_lista" >Lista de Classes</h2>
                            <div class="botao_add" >
                                <a href="{{ url('/usuarios') }}" class="btn btn-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar</a>
                                <a href="{{ url('/classes/create/'.$id_usuario) }}" class="btn btn-primary">Adicionar +</a>
                            </div>
                            <hr/>

                        </div>
                        <div class="lista_index ">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col" > Classe</th>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Instrutor</th>
                                        <th scope="col"> Ações </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($classes)
                                            @foreach ($classes as $classe)
                                                <tr>
                                                    <td>

                                                        @if($classe->nome == 'amigo')
                                                            <img  src="{{ asset('assets/imagens/amigo_logo.png') }}" alt="" width="50" height="50">
                                                        @elseif($classe->nome == 'companheiro')
                                                            <img  src="{{ asset('assets/imagens/companheiro_logo.png') }}" alt="" width="50" height="50">
                                                        @elseif($classe->nome == 'pesquisador')
                                                            <img  src="{{ asset('assets/imagens/pesquisador_logo.png') }}" alt="" width="50" height="50">
                                                        @elseif($classe->nome == 'pioneiro')
                                                            <img  src="{{ asset('assets/imagens/pioneiro_logo.png') }}" alt="" width="50" height="50">
                                                        @elseif($classe->nome == 'excurcionista')
                                                            <img  src="{{ asset('assets/imagens/excurcionista_logo.png') }}" alt="" width="50" height="50">
                                                        @elseif($classe->nome == 'guia')
                                                            <img  src="{{ asset('assets/imagens/guia_logo.png') }}" alt="" width="50" height="50">
                                                        @elseif($classe->nome == 'lider')
                                                            <img  src="{{ asset('assets/imagens/lider_logo.png') }}" alt="" width="50" height="50">
                                                        @elseif($classe->nome == 'lider_master')
                                                            <img  src="{{ asset('assets/imagens/lider_master_logo.png') }}" alt="" width="50" height="50">
                                                        @elseif($classe->nome == 'lider_master_avancado')
                                                            <img  src="{{ asset('assets/imagens/lider_master_avancado_logo.png') }}" alt="" width="50" height="50">
                                                        @else
                                                            <span>Sem Imagem</span>
                                                        @endif


                                                    </td>
                                                    <td>{{ $classe->nome }}</td>
                                                    <td>{{ $classe->instrutor }}</td>
                                                    <td>
                                                        <a href="{{ url('/classes/edit/'.$classe->id.'/'.$id_usuario ) }}" class="btn btn-warning edit_part" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                        <a href="{{ url('/classes/delete/'.$classe->id.'/'.$id_usuario ) }}" class="btn btn-danger" ><i class="fa fa-times-circle" aria-hidden="true"></i></a>
                                                        <a href="{{ url('/classes/show/'.$classe->id.'/'.$id_usuario ) }}" class="btn btn-info" ><i class="fa fa-eye" aria-hidden="true"></i></a>
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
