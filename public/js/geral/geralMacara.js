$(document).ready(function() {

    $('#cep').mask('00000-000', {reverse: true});
    $('#telefone').mask(' (00) 0000-0000');
    $('#celular').mask('(00) #0000-0000');
    $('#rg').mask('00.000.000-#0' );
    $('#cpf').mask('000.000.000-#0');

    $('.date_mask').mask('00/00/0000');

    $('form').submit(function(){
        $('#cep').unmask();
        $('#telefone').unmask();
        $('#celular').unmask();
        $('#rg').unmask();
        $('#cpf').unmask();
    });

    $('.date').datepicker({
        format: 'dd/mm/yyyy',
        language: 'pt-BR'
    });

});
