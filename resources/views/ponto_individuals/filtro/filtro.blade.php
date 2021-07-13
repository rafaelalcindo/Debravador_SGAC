<form method="get" name="form_filtro_unidade" id="form_filtro_unidade" action="/ponto_individuals" >
    <div class="row">

            <div class="col-md-1"></div>

            <div class="col-md-3">
                <div class="col-md-6">
                    <label for="usuarios_selecao" class="required_field">Desbravador</label>
                    <select class="js-example-basic-single select2" id="usuarios_selecao"  name="usuarios_selecao" style="width: 220%;">
                        <option value=""  > selecione </option>
                        @foreach ($usuarios as $usuario)
                            <option value="{{ $usuario->id }}" {{ (isset($filtro['usuarios_selecao']) && $filtro['usuarios_selecao'] == $usuario->id)? 'selected' : '' }} > {{ $usuario->nome }} {{ $usuario->sobrenome }} </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="search_descricao" class="required_field">Buscar Descrição</label>
                    <input type="text" value="{{ ($filtro['search_descricao'] ?? '') }}" class="form-control" id="search_descricao" name="search_descricao" aria-describedby="search_descricao" placeholder="Descrição " >
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="search" class="required_field">Busca Rápida</label>
                    <input type="text" value="{{ ($filtro['search'] ?? '') }}" class="form-control" id="search" name="search" aria-describedby="search" placeholder="Nome " >
                </div>
            </div>

            <div class="col-md-2">
                <button type="submit" class="btn btn-outline-primary btn_filtro">Filtro</button>
            </div>


    </div>
</form>
