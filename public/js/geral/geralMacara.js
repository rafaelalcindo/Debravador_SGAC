$(document).ready(function() {

    $('#cep').mask('00000-000', {reverse: true});
    $('#telefone').mask(' (00) 0000-0000');
    $('#celular').mask('(00) #0000-0000');
    $('#rg').mask('00.000.000-#0' );
    $('#cpf').mask('000.000.000-#0');

    $('.date_mask').mask('00/00/0000');
    $('.hora').mask('00:00');

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

    $('.hora').datepicker({
        format: 'LT',
        language: 'pt-BR'
    });

    $('.datarange').daterangepicker({
        autoUpdateInput: false,
        locale: {
            format: 'DD/MM/YYYY',
            cancelLabel: 'Cancelar'
        }
    });

    $('.datarange').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
    });

    $('.datarange').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
    });

});
