
function selecionarUsuario(hora_ponto_id)
{
    console.log(hora_ponto_id)
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
