<form method="get" name="form_filtro_desbravador" id="form_filtro_desbravador" action="/usuarios" >
    <div class="row">

            <div class="col-md-5"></div>

            <div class="col-md-2">
                <label for="ativo" class="">Ativos</label>
                <select id="ativo" class="form-control"  name="ativo" >
                    <option value="1" {{ ((isset($filtro['ativo']) && $filtro['ativo'] == 1)? 'selected' : '') }} >Ativo</option>
                    <option value="0" {{ ((isset($filtro['ativo']) && $filtro['ativo'] == 0)? 'selected' : '') }} }} >Inativo</option>
                </select>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="search" class="">Busca Rápida</label>
                    <input type="text" value="{{ ($filtro['search'] ?? '') }}" class="form-control" id="search" name="search" aria-describedby="search" placeholder="Nome / Sobrenome / outros" >
                </div>
            </div>

            <div class="col-md-2">
                <button type="submit" class="btn btn-outline-primary btn_filtro">Filtro</button>
            </div>


    </div>
</form>
