@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-2 MenuLateral">

            <div class="menu_opçoes" >
                <div class="escrito" >
                    <h5>Desbravador</h5>
                </div>
                <div class="icon d-flex justify-content-center" >
                    <img src="{{ asset('assets/icons/form.png') }}" alt="form"  />
                </div>
            </div>

            <div class="menu_opçoes" >
                <div class="escrito" >
                    <h5>Unidades</h5>
                </div>
                <div class="icon d-flex justify-content-center" >
                    <img src="{{ asset('assets/icons/listar.png') }}" alt="form"  />
                </div>
            </div>

            <div class="menu_opçoes" >
                <div class="escrito" >
                    <h5>Atividades</h5>
                </div>
                <div class="icon d-flex justify-content-center" >
                    <img src="{{ asset('assets/icons/listar.png') }}" alt="form"  />
                </div>
            </div>

            <div class="menu_opçoes" >
                <div class="escrito" >
                    <h5>Pontuação</h5>
                </div>
                <div class="icon d-flex justify-content-center" >
                    <img src="{{ asset('assets/icons/listar.png') }}" alt="form"  />
                </div>
            </div>

        </div>

        <div class="col-md-10" >

            <div class="index_conteudo">
                <div class="row">

                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="parte_filtro">
                            <h2>Lista de Desbravadores</h2>
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
                                            <td></td>
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