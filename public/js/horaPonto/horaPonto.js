
function selecionarUsuario(hora_ponto_id)
{
    $.ajax({
        method: 'GET',
        url: '/hora_da_entrada/seleciona_usuario/'+hora_ponto_id,
        async: true
    }).done(function(data){

        $('#titulo_modal_geral').html('').html('Adicionar Desbravador')
        $('.corpo_modal_geral').empty().append(data)
        $('.modal_geral').modal('show')

    })
}

function adicionarUsuario(hora_ponto_id)
{
    let usuario_id = $('#usuarios_selecao').val()
    if (usuario_id != '' && usuario_id != null) {
        $.ajax({
            method: 'GET',
            url: '/hora_da_entrada/adicionar_usuario_horario/',
            data: {
                "usuario_id": usuario_id,
                "hora_ponto_id": hora_ponto_id
            },
            async: true
        }).done(function(data){

            if (data.resultado) {
                selecionarUsuario(hora_ponto_id)
            }

        })
    }
}
