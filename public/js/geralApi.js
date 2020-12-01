$(document).ready(function(){

    $('#cep').focusout(function(){
        console.log( $(this).val() )
        let cep = $(this).val();
        procurarEndereco(cep);
    });


});

function procurarEndereco (cep)
{
    cep = cep.replace('-','');
    $.ajax({
        method: 'GET',
        url: 'https://viacep.com.br/ws/'+cep+'/json/', // substitua por qualquer URL real
        async: true,
        dataType: 'json'
    }).done(function (data) {
        console.log(data);
        $('#endereco').val(data.logradouro);
        $('#complemento').val(data.complemento);
        $('#cidade').val(data.localidade);
        $('#estado').val(data.uf);
    });
}

