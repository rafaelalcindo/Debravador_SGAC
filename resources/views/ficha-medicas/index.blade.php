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
                            <h2 class="titulo_lista" >Lista de Ficha Técnica</h2>
                            <div class="botao_add" >
                                @if(!isset( $fichaMedicas[0]->id) ) <a href="{{ url('/ficha-medicas/create/'.$id_usuario) }}" class="btn btn-primary">Adicionar +</a> @endif
                            </div>
                            <hr/>
                            
                        </div>
                        <div class="lista_index ">
                            <table class="table">                    
                                <tbody>
                                    <tr>
                                        <td> <h5>Id: </h5></td>
                                        <td>@isset($fichaMedicas[0]->id) {{  $fichaMedicas[0]->id }} @endisset </td>
                                    </tr>

                                    <tr>
                                        <td> <h5>Plano de Saude: </h5></td>
                                        <td>@isset($fichaMedicas[0]->plano_saude) {{  $fichaMedicas[0]->plano_saude }} @endisset </td>
                                    </tr>

                                    <tr>
                                        <td> <h5>Doença que teve: </h5></td>
                                        <td>@isset($fichaMedicas[0]->doenc_teve) {{  $fichaMedicas[0]->doenc_teve }} @endisset </td>
                                    </tr>
                                    
                                    <tr>
                                        <td> <h5>Problema de Saúde: </h5></td>
                                        <td>@isset($fichaMedicas[0]->problema_saude) {{  $fichaMedicas[0]->problema_saude }} @endisset </td>
                                    </tr>

                                    <tr>
                                        <td> <h5>Alergia: </h5></td>
                                        <td>@isset($fichaMedicas[0]->alergia) {{  $fichaMedicas[0]->alergia }} @endisset </td>
                                    </tr>

                                    <tr>
                                        <td> <h5>Tipo Sanguineo: </h5></td>
                                        <td>@isset($fichaMedicas[0]->tipo_sanguineo) {{  $fichaMedicas[0]->tipo_sanguineo }} @endisset </td>
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
