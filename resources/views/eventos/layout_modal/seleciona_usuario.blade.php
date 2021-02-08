<div class="row">
    <div class="col-md-6">
        <select class="js-example-basic-single" id="usuarios_selecao" name="state">
            @foreach ($usuarios as $usuario)
                <option value="{{ $usuario->id }}" > {{ $usuario->nome }} {{ $usuario->sobrenome }} </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-6">
        <button type="button" class="btn btn-primary" onclick="adicionarUsuario({{ $eventos->id }})">Adicionar</button>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Nome</th>
                <th scope="col">Ações</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($eventos->usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->nome }} {{ $usuario->sobrenome }}</td>
                        <td>
                            <button type="button" class="btn btn-danger" onclick="removerUsuario({{ $eventos->id }}, {{ $usuario->id }})">Remover</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>
</div>


<script>

    $(document).ready(function() {
      $("#usuarios_selecao").select2({
        dropdownParent: $("#modalGeral")
      });
    });
</script>
