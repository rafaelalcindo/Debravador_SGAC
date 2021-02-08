

$(document).ready(function(){

})

function adicionarPontoGeral(evento_id)
{
    console.log(evento_id)
    if (evento_id != null && evento_id != '') {
        $.ajax({
            method: 'GET',
            url: '/eventos/adicionar_pontos_eventos',
            data: {
                "evento_id": evento_id
            },
            async: true
        }).done(function(data){

            if (data.message) {
                $('#adicionar_evento_'+evento_id).hide();
            }
        })
    }
}

function selecionarUsuarioNoEvento(evento_id)
{
    $.ajax({
        method: 'GET',
        url: '/eventos/seleciona_usuario/'+evento_id,
        async: true
    }).done(function(data){

        $('#titulo_modal_geral').html('').html('Adicionar Desbravador')
        $('.corpo_modal_geral').empty().append(data)
        $('.modal_geral').modal('show')

    })
}

function adicionarUsuario(evento_id)
{
    let usuario_id = $('#usuarios_selecao').val()

    if (usuario_id != '' && usuario_id != null) {
        $.ajax({
            method: 'GET',
            url: '/eventos/adicionar_usuario_evento/',
            data: {
                "usuario_id": usuario_id,
                "evento_id": evento_id
            },
            async: true
        }).done(function(data){
            if (data.resultado) {
                selecionarUsuarioNoEvento(evento_id)
            }
        })
    }
}

function removerUsuario(evento_id, usuario_id)
{
    $.ajax({
        method: 'GET',
        url: '/eventos/remover_usuario/',
        data: {
            "usuario_id": usuario_id,
            "evento_id": evento_id
        },
        async: true
    }).done(function(data){
        if (data.resultado) {
            selecionarUsuarioNoEvento(evento_id)
        }
    })
}
