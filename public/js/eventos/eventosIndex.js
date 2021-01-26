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
