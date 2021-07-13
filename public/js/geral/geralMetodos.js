$(document).ready(function(){
    getQueryStringVoltar();
})

function getQueryStringVoltar()
{

    let searchParams = new URLSearchParams(window.location.search)
    if (searchParams.has('search') || searchParams.has('search_filial')) {

        let link = $(".voltar_btn").attr('href');
        link = link+'?'+searchParams.toString();
        $(".voltar_btn").attr('href', link);

        console.log('passou')

        $(".edit_part").each(function(){
            console.log($(this).val())
            let link_editar = $(this).attr('href');
            link_editar = link_editar+'?'+searchParams.toString();
            $(this).attr('href', link_editar);
        })

    }
}
