
<div class="row">
    <div class="col-md-6">
        <select class="js-example-basic-single" id="usuarios_selecao" name="state">
            @foreach ($usuarios as $usuario)
                <option value="{{ $usuario->id }}" > {{ $usuario->nome }} {{ $usuario->sobrenome }} </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-6">
        <button type="button" class="btn btn-primary" onclick="adicionarUsuario({{ $horaPontos->id }})">Adicionar</button>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Nome</th>
                <th scope="col">Data</th>
                <th scope="col">Hora</th>

              </tr>
            </thead>
            <tbody>
                @foreach ($horaMarcadas as $hora_marcada)
                    <tr>
                        <td>{{ $hora_marcada->usuario->nome }} {{ $hora_marcada->usuario->sobrenome }}</td>
                        <td>{{ $hora_marcada->data_chegada }} </td>
                        <td>{{ $hora_marcada->hora_chegada }} </td>
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
