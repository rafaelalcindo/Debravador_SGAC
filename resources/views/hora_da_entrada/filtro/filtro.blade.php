<form method="get" name="form_filtro_evento" id="form_filtro_evento" action="/hora_da_entrada" >
    <div class="row">

        <div class="col-md-4"></div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="search_data" class="required_field">Buscar por Data</label>
                <input type="text" value="{{ ($filtro['search_data'] ?? '') }}" class="form-control datarange" id="search_data" name="search_data" aria-describedby="search_data" placeholder="Data " >
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="search_descricao" class="required_field">Buscar Descrição</label>
                <input type="text" value="{{ ($filtro['search_descricao'] ?? '') }}" class="form-control" id="search_descricao" name="search_descricao" aria-describedby="search_descricao" placeholder="Descrição " >
            </div>
        </div>

        <div class="col-md-2">
            <button type="submit" class="btn btn-outline-primary btn_filtro">Filtro</button>
        </div>
    </div>
</form>
