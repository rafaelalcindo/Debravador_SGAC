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

    </div>
</div>


<script>

    $(document).ready(function() {
      $("#usuarios_selecao").select2({
        dropdownParent: $("#modalGeral")
      });
    });
</script>
