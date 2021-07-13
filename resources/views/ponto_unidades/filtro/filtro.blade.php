<form method="get" name="form_filtro_unidade" id="form_filtro_unidade" action="/ponto-unidades" >
    <div class="row">

            <div class="col-md-1"></div>

            <div class="col-md-3">
                <label for="unidade_selecao" class="required_field">Unidades</label><br/>
                <select class="js-example-basic-single select2" id="unidade_selecao"  name="unidade_selecao" >
                    <option value=""  > selecione </option>
                    @foreach ($unidades as $unidade)
                        <option value="{{ $unidade->id }}" {{ (isset($filtro['unidade_selecao']) && $filtro['unidade_selecao'] == $unidade->id)? 'selected' : '' }} > {{ $unidade->nome }} </option>
                    @endforeach
                </select>
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
