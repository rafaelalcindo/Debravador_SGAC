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
                            <h2 class="titulo_lista" >Lista de Desbravadores</h2>
                            <div class="botao_add" >
                                <a href="{{ url('/usuarios/create') }}" class="btn btn-primary">Adicionar <i class="fa fa-plus" aria-hidden="true"></i></a>
                            </div>
                            <hr/>

                        </div>
                        <div class="lista_index ">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Unidade</th>
                                        <th scope="col" >Pontos Acumulados</th>
                                        <th scope="col">nivel</th>
                                        <th scope="col"> Ações </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($desbravadores as $desbravador)
                                        <tr>
                                            <td>{{ $desbravador->nome }} {{ $desbravador->sobrenome }}</td>
                                            <td>{{ $desbravador->unidade['nome'] }}</td>
                                            <td>{{ $desbravador->pontosAcumulado() }}</td>
                                            <td>{{ $desbravador->nivel }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ route('usuarios.edit',$desbravador->id) }}"  class="btn btn-info"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                    <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="{{ url('/usuarios/'.$desbravador->id.'/delete') }}">Deletar <i class="fa fa-times-circle" aria-hidden="true"></i></a>
                                                        <a class="dropdown-item" href="{{ route('usuarios.show', $desbravador->id) }}">Visualizar <i class="fa fa-eye" aria-hidden="true"></i> </a>
                                                        <a class="dropdown-item" href="{{ url('responsaveis/index/'.$desbravador->id) }}">Responsáveis</a>
                                                        <a class="dropdown-item" href="{{ url('ficha-medicas/index/'.$desbravador->id) }}">Ficha Médica</a>
                                                        <a class="dropdown-item" href="{{ url('especialidades/index/'.$desbravador->id) }}">Especialidades</a>
                                                        <a class="dropdown-item" href="{{ url('classes/index/'.$desbravador->id) }}">Classes</a>
                                                        <a class="dropdown-item" href="{{ url('usuarios/'.$desbravador->id.'/qr_code') }}">QR Code <i class="fa fa-qrcode" aria-hidden="true"></i></a>

                                                    </div>
                                                </div>
                                                <!-- <a href="{{ route('usuarios.edit',$desbravador->id) }}" class="btn btn-warning" >Editar</a>
                                                <a href="{{ url('/usuarios/'.$desbravador->id.'/delete') }}" class="btn btn-danger">Deletar</a>
                                                <a href="{{ route('usuarios.show', $desbravador->id) }}" class="btn btn-info" >Vizualizar</a>
                                                <a href="{{ url('responsaveis/index/'.$desbravador->id) }}" class="btn btn-primary" >Responsaveis</a>
                                                <a href="{{ url('ficha-medicas/index/'.$desbravador->id) }}" class="btn btn-primary" >Ficha Médica</a>
                                                <a href="{{ url('especialidades/index/'.$desbravador->id) }}" class="btn btn-primary" >Especialidades</a>
                                                <a href="{{ url('classes/index/'.$desbravador->id) }}" class="btn btn-primary" >Classes</a> -->
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
