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
                <div class="row"></div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="parte_filtro">
                            <h2 class="titulo_lista" >Lista de Hora de Chegada</h2>
                            <div class="botao_add" >
                                <a href="{{ url('/hora_da_entrada/create') }}" class="btn btn-primary">Adicionar <i class="fa fa-plus" aria-hidden="true"></i></a>
                            </div>
                            <hr/>
                                {{-- @include('usuarios.filtro.filtro') --}}
                            <hr/>
                        </div>

                        <div class="lista_index">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Descrição</th>
                                        <th scope="col">Data</th>
                                        <th scope="col" >Hora</th>
                                        <th scope="col"> Ações </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($horaPontos as $horaPonto)
                                        <tr>
                                            <td>{{ $horaPonto->descricao }}</td>
                                            <td>{{ $horaPonto->data_programacao }}</td>
                                            <td>{{ $horaPonto->hora_programacao }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ url('hora_da_entrada/edit/'.$horaPonto->id) }}"  class="btn btn-info"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                    <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="{{ url('/hora_da_entrada/delete/'.$horaPonto->id) }}">Deletar <i class="fa fa-times-circle" aria-hidden="true"></i></a>
                                                        <a class="dropdown-item" href="{{ url('/hora_da_entrada/show/'. $horaPonto->id) }}">Visualizar <i class="fa fa-eye" aria-hidden="true"></i> </a>
                                                        <a class="dropdown-item" onclick="selecionarUsuario({{ $horaPonto->id }})" style="cursor: pointer;" >Selecionar Desbravador <i class="fa fa-eye" aria-hidden="true"></i> </a>

                                                    </div>
                                                </div>

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

    @include('components.modal.modal')
@endsection

@push('styles')

    <link href="{{ asset('css/usuarios/menus.css') }}" rel="stylesheet">

@endpush

@push('scripts')
    <script src="{{ asset('js/horaPonto/horaPonto.js') }}" defer></script>
@endpush
