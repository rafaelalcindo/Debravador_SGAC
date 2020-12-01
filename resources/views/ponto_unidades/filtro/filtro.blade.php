<form method="get" name="form_filtro_unidade" id="form_filtro_unidade" action="/ponto-unidades" >
    <div class="row">

            <div class="col-md-7"></div>

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
