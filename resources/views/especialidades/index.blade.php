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
                            <h2 class="titulo_lista" >Lista de Especialidades</h2>
                            <div class="botao_add" >
                                <a href="{{ url('/especialidades/create/'.$id_usuario) }}" class="btn btn-primary">Adicionar +</a>
                            </div>
                            <hr/>

                        </div>
                        <div class="lista_index ">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Area</th>
                                        <th scope="col"> Ações </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($especialidades)
                                            @foreach ($especialidades as $especialidade)
                                                <tr>
                                                    <td>{{ $especialidade->nome }}</td>
                                                    <td>{{ $especialidade->area }}</td>
                                                    <td>
                                                        <a href="{{ url('/especialidades/edit/'.$especialidade->id.'/'.$id_usuario ) }}" class="btn btn-warning" >Editar</a>
                                                        <a href="{{ url('/especialidades/delete/'.$especialidade->id.'/'.$id_usuario ) }}" class="btn btn-danger" >Deletar</a>
                                                        <a href="{{ url('/especialidades/show/'.$especialidade->id.'/'.$id_usuario ) }}" class="btn btn-info" >Informações</a>
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
