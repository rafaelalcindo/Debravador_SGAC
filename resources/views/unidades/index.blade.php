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
                            <h2 class="titulo_lista" >Lista de Unidades</h2>
                            <div class="botao_add" >
                                <a href="{{ url('/unidades/create') }}" class="btn btn-primary">Adicionar +</a>
                            </div>
                            <hr/>
                            
                        </div>
                        <div class="lista_index ">
                            <table class="table table-hover">
                                <thead>
                                    <tr>                                        
                                        <th scope="col">Nome</th>
                                        <th scope="col">Equipamentos</th>
                                        <th scope="col">Pontos Acumulado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($unidades as $unidade)
                                        <tr>
                                            <td>{{ $unidade->nome }} </td>
                                            <td>{{ $unidade->equipamentos }}</td>
                                            <td>{{ $unidade->pontosAcumulado() }}</td>
                                            <td>
                                                <a href="{{ route('unidades.edit',$unidade->id) }}" class="btn btn-warning">Editar</a>
                                                <a href="{{ url('/unidades/'.$unidade->id.'/delete') }}" class="btn btn-danger">Deletar</a>
                                                <a href="{{ route('unidades.show', $unidade->id) }}" class="btn btn-info" >Vizualizar</a>
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