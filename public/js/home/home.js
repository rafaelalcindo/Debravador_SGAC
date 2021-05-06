$(document).ready(function(){
    let desbraGraficoValor = [];
    let diretoriaGraficoValor = [];
    let unidadeGraficoValor = [];
    let desbraGraficoQuarenValor = [];
    let diretoriaGraficoQuarenValor = [];

    $('.lista_desbravadores').each(function(){
        desbraGraficoValor.push({
            y: $(this).attr('nomeDesbrava'),
            a: $(this).val()
        })
    })

    $('.lista_unidades').each(function(){
        unidadeGraficoValor.push({
            y: $(this).attr('nomeUnidade'),
            a: $(this).val()
        })
    })

    $('.lista_diretorias').each(function(){
        diretoriaGraficoValor.push({
            y: $(this).attr('nomeDiretoria'),
            a: $(this).val()
        })
    })

    $('.lista_desbravadores_quarentena').each(function(){
        desbraGraficoQuarenValor.push({
            y: $(this).attr('nomeDesbrava'),
            a: $(this).val()
        })
    })

    $('.lista_diretorias_quarentena').each(function(){
        diretoriaGraficoQuarenValor.push({
            y: $(this).attr('nomeDiretoria'),
            a: $(this).val()
        })
    })

    carregarGraficoDesbravador(desbraGraficoValor)
    carregarGraficoUnidade(unidadeGraficoValor)
    carregarGraficoDiretoria(diretoriaGraficoValor)
    carregarGraficoDesbravadorQuarentena(desbraGraficoQuarenValor)
    carregarGraficoDiretoriaQuarentena(diretoriaGraficoQuarenValor)
})


function carregarGraficoDesbravador(desbraGraficoValor)
{
    Morris.Bar({
        element: 'grafico_desbravadores',
        data: desbraGraficoValor,
        xkey: 'y',
        ykeys: ['a'],
        labels: ['Desbravador'],
        barColors: ['rgb(40, 180, 160)', 'rgb(60, 0, 240)'],
        hideHover: 'auto',
        resize: true
    });
}

function carregarGraficoUnidade(unidadeValore)
{
    Morris.Bar({
        element: 'grafico_unidades',
        data: unidadeValore,
        xkey: 'y',
        ykeys: ['a'],
        labels: ['Unidades'],
        barColors: ['rgb(60, 0, 240)'],
        hideHover: 'auto',
        resize: true
    });
}

function carregarGraficoDiretoria(diretoriaGraficoValor)
{
    Morris.Bar({
        element: 'grafico_diretoria',
        data: diretoriaGraficoValor,
        xkey: 'y',
        ykeys: ['a'],
        labels: ['Diretoria'],
        barColors: ['rgb(255, 77, 77)'],
        hideHover: 'auto',
        resize: true
    });
}

function carregarGraficoDesbravadorQuarentena(desbraGraficoQuarenValor)
{
    Morris.Bar({
        element: 'grafico_desbravadores_quarentena',
        data: desbraGraficoQuarenValor,
        xkey: 'y',
        ykeys: ['a'],
        labels: ['Desbravador'],
        barColors: ['rgb(40, 180, 160)', 'rgb(60, 0, 240)'],
        hideHover: 'auto',
        resize: true
    });
}

function carregarGraficoDiretoriaQuarentena(DiretoriaGraficoQuarenValor)
{
    Morris.Bar({
        element: 'grafico_diretoria_quarentena',
        data: DiretoriaGraficoQuarenValor,
        xkey: 'y',
        ykeys: ['a'],
        labels: ['Diretoria'],
        barColors: ['rgb(255, 77, 77)'],
        hideHover: 'auto',
        resize: true
    });
}
