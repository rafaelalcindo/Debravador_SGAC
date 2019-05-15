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
                        <h2>Cadastrar Ficha Médica</h2>
                    </div>
                    <div class="col-sm-2">
                        <a href="{{ url('/ficha-medicas/index/'.$id_usuario) }}" class="btn btn-primary">Voltar</a>
                    </div>
                </div>
                <hr/>
                <!-- Formulario de Cadastro -->
                <form method="post" name="form_responsavel" id="form_responsavel" action="/ficha-medicas" >
                    {{ csrf_field() }}
                    
                    <div class="row">

                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Plano de Saúde</label>
                                    <input type="text" class="form-control" id="plano_saude" name="plano_saude" aria-describedby="plano_saude" placeholder="Plano de Saúde">
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Carteira de Saúde</label>
                                    <input type="text" class="form-control" id="carteira_nac_saude" name="carteira_nac_saude" aria-describedby="carteira_nac_saude" placeholder="Carteira de Saúde">
                                </div>
                            </div>

                            <!-- linha de baixo -->

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Doença que teve</label>
                                    <input type="text" class="form-control" id="doenc_teve" name="doenc_teve" aria-describedby="doenc_teve" >
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">alergia</label>
                                    <input type="text" class="form-control" id="alergia" name="alergia" aria-describedby="alergia" placeholder="Alergia" >
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Problemas de Saúde</label>
                                    <input type="text" class="form-control" id="problema_saude" name="problema_saude" aria-describedby="problema_saude" placeholder="Problemas de Saúde" >
                                </div>
                            </div>

                            

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">tipo_sanguineo</label>
                                    <input type="text" class="form-control" id="tipo_sanguineo" name="tipo_sanguineo" aria-describedby="tipo_sanguineo" placeholder="Tipo Sanguideo" >
                                </div>
                            </div>
                            
                            <input type="hidden" id="id_usuario" name="id_usuario" value="{{ $id_usuario }}" />

                            <!-- outra linha -->
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