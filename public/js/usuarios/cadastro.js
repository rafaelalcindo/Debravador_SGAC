$(document).ready(function(){
    $('.imagem_perfil').click(function(){
        $('#foto_perfil_upload').trigger('click')
    })
})

function carregarImagem(event) {
    let reader = new FileReader();
    reader.onload = function () {
        let output = document.getElementById('foto_imagem')
        output.src = reader.result;
    };

    reader.readAsDataURL(event.target.files[0])
}
