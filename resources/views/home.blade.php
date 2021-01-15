@extends('layouts.app')

@section('content')

<div class="container-fluid">
      <div class="row">
        @include('usuarios.cadastros.menuLateral')
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary">Compartilhar</button>
                <button class="btn btn-sm btn-outline-secondary">Exportar</button>
              </div>
              <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                Esta semana
              </button>
            </div>
          </div>

          <!-- ============================  Parte de Gráficos ======================== -->
          <div class="row">
            <div class="col-md-4">
                <div id="grafico_desbravadores" ></div>
            </div>
            <div class="col-md-4">
                <div id="grafico_diretoria" ></div>
            </div>
            <div class="col-md-4">
                <div id="grafico_unidades" ></div>
            </div>
          </div>

          <h2>Lista de Desbravadores</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>

                <tr>
                  <th>Nome</th>
                  <th>Unidade</th>
                  <th>Pontos</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($desbravadores as $desbravador)
                    <tr>
                        <td>
                            {{ $desbravador->nome }}
                            <input type="hidden" value="{{ $desbravador->pontosAcumulado() }}" nomeDesbrava="{{ $desbravador->nome }}" id="id_lista_desbravadores_{{ $desbravador->id }}" class="lista_desbravadores" />
                        </td>
                        <td>{{ $desbravador->unidade->nome }}</td>
                        <td>
                            {{ $desbravador->pontosAcumulado() }}
                            <input type="hidden" value="{{ $desbravador->pontosAcumulado() }}" id="id_lista_desbravadores_{{ $desbravador->pontosAcumulado() }}" class="lista_pontos_desbravadores" />
                        </td>
                    </tr>
                 @endforeach
                </tr>
              </tbody>
            </table>
          </div>

          <h2>Lista de Diretoria</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>

                <tr>
                  <th>Nome</th>
                  <th>Unidade</th>
                  <th>Pontos</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($diretorias as $diretoria)
                    <tr>
                        <td>
                            {{ $diretoria->nome }}
                            <input type="hidden" value="{{ $diretoria->pontosAcumulado() }}" nomeDiretoria="{{ $diretoria->nome }}" id="id_lista_diretorias_{{ $diretoria->id }}" class="lista_diretorias" />
                        </td>
                        <td>{{ $diretoria->unidade->nome }}</td>
                        <td>
                            {{ $diretoria->pontosAcumulado() }}
                            <input type="hidden" value="{{ $diretoria->pontosAcumulado() }}" id="id_lista_diretorias_{{ $diretoria->pontosAcumulado() }}" class="lista_pontos_diretorias" />
                        </td>
                    </tr>
                 @endforeach
                </tr>
              </tbody>
            </table>
          </div>

          <div class="row">
              <div class="col-md-12">
                <h2>Lista de Unidades</h2>
                <table class="table table-striped table-sm">
                    <thead>

                        <tr>
                            <th>Nome</th>
                            <th>Pontos</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($unidades as $unidade)
                            <tr>

                                <td>
                                    {{ $unidade->nome }}
                                    <input type="hidden" value="{{ $unidade->pontosAcumulado() }}" nomeUnidade="{{ $unidade->nome }}" id="id_lista_unidades_{{ $unidade->id }}" class="lista_unidades" />
                                </td>
                                <td>{{ $unidade->pontosAcumulado() }}</td>
                            </tr>
                        @endforeach
                        </tr>
                    </tbody>
                </table>
              </div>
          </div>
        </main>
      </div>
    </div>



<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div> -->

@endsection

@push('scripts')
    <script src="{{ asset('js/home/home.js') }}" defer></script>
@endpush
