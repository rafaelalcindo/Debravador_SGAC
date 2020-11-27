@extends('layouts.app')

@section('content')
     <!-- Menu Lateral -->
    <div class="row">

        @include('usuarios.cadastros.menuLateral')

        <!-- Table de Listagem de Usuários -->
        <div class="col-md-10" >

            <div class="index_conteudo">
                <div class="row">
                    <div class="col-sm-10">
                        <h2>Cadastrar Unidade</h2>
                    </div>
                    <div class="col-sm-2">
                        <a href="{{ url('/unidades') }}" class="btn btn-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar</a>
                    </div>
                </div>
                <hr/>
                <!-- Formulario de Cadastro -->
                <form method="post" name="form_unidade" id="form_unidade" action="/unidades" >
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="nome" class="required_field">Nome</label>
                                <input type="text" required="true" class="form-control" id="nome" name="nome" aria-describedby="nome" placeholder="Nome">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="equipamentos" class="required_field">Equipamentos</label>
                                <textarea required name="equipamentos" id="equipamentos" class="form-control"  rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-outline-primary btn-lg btn-block">Salvar</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>

    </div>
@endsection

@push('styles')

    <link href="{{ asset('css/usuarios/menus.css') }}" rel="stylesheet">

@endpush
