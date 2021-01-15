<h2>Passou Modal</h2>
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
                @foreach ($horaPontos->usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->nome }} {{ $usuario->sobrenome }}</td>
                        <td>{{ $usuario->horaPontos[0]->pivot->data_chegada }} </td>
                        <td>{{ $usuario->horaPontos[0]->pivot->hora_chegada }} </td>
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
