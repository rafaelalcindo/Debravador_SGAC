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
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($unidades as $unidade)
                                        <tr>
                                            <td>{{ $unidade->nome }} </td>
                                            <td>{{ $unidade->equipamentos }}</td>
                                            <td>
                                                <a href="{{ route('unidades.edit',$unidade->id) }}" class="btn btn-warning">Editar</a>
                                                <a href="{{ url('/unidades/'.$unidade->id.'/delete') }}" class="btn btn-danger">Deletar</a>
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