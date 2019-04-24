@extends('layouts.app')

@section('content')
     <!-- Menu Lateral -->
    <div class="row">

        @include('usuarios.cadastros.menuLateral')

        <!-- Table de Listagem de Usuários -->
        <div class="col-md-10" >

            <div class="index_conteudo">
                <div class="row">

                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="parte_filtro">
                            <h2 class="titulo_lista" >Lista de Desbravadores</h2>
                            <div class="botao_add" >
                                <a href="{{ url('/usuarios/create') }}" class="btn btn-primary">Adicionar +</a>
                            </div>
                            <hr/>
                            
                        </div>
                        <div class="lista_index ">
                            <table class="table table-hover">
                                <thead>
                                    <tr>                                        
                                        <th scope="col">Nome</th>
                                        <th scope="col">Unidade</th>
                                        <th scope="col">nivel</th>
                                        <th scope="col"> Ações </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($desbravadores as $desbravador)
                                        <tr>
                                            <td>{{ $desbravador->nome }} {{ $desbravador->sobrenome }}</td>
                                            <td>{{ $desbravador->unidade }}</td>
                                            <td>{{ $desbravador->nivel }}</td>
                                            <td>
                                                <button type="button" class="btn btn-warning">Editar</button>
                                                <button type="button" class="btn btn-danger">Deletar</button>
                                                <button type="button" class="btn btn-info">Visualizar</button>
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