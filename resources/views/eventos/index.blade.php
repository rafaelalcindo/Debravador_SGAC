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
                            <h2 class="titulo_lista" >Lista de Eventos do Ano</h2>
                            <div class="botao_add" >
                                <a href="{{ url('/eventos/create') }}" class="btn btn-primary">Adicionar +</a>
                            </div>
                            <hr/>
                                @include('eventos.filtro.filtro')
                            <hr/>

                        </div>
                        <div class="lista_index ">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Titulo do Evento</th>
                                        <th scope="col">Descricao</th>
                                        <th scope="col">Pontos</th>
                                        <th scope="col">Data do Eventos</th>
                                        <th scope="col">Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($eventos as $evento)
                                        <tr>
                                            <td>{{ $evento->titulo }} </td>
                                            <td>{{ $evento->descricao }}</td>
                                            <td>{{ $evento->ponto_evento }}</td>
                                            <td>{{ $evento->data_evento }}</td>
                                            <td>
                                                <a href="{{ route('eventos.edit',$evento->id) }}" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                <a href="{{ url('/eventos/'.$evento->id.'/delete') }}" class="btn btn-danger"><i class="fa fa-times-circle" aria-hidden="true"></i></a>

                                                <a onclick="selecionarUsuarioNoEvento({{ $evento->id }})" style="cursor: pointer;" class="btn btn-info"><i class="fa fa-clipboard" aria-hidden="true"></i></a>

                                                @if(!$evento->pontos_adicionados)
                                                    <button onclick="adicionarPontoGeral({{$evento->id}})" id="adicionar_evento_{{ $evento->id }}" class="btn btn-info"><i class="fa fa-money" aria-hidden="true"></i></button>
                                                @endif

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
    <script src="{{ asset('js/eventos/eventosIndex.js') }}" defer></script>
@endpush
