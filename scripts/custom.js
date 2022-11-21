// Carregar o espaço para o preview da imagem
var redimensionar = $('#preview').croppie({
    showZoomer: false,
    enableOrientation: true,
    viewport: {
        width: 150,
        height: 150,
        type: 'circle'
    },
    boundary: {
        width: 150,
        height: 150
    }

});

// Executar a instrução quando o usuário selecionar uma imagem
$('#foto').on('change', function () {

    // FileReader para ler de forma assincrona o conteúdo dos arquivos
    var reader = new FileReader();

    // onload - Execute após ler o conteúdo
    reader.onload = function (e) {
        redimensionar.croppie('bind', {
            // Recuperar a imagem base64
            url: e.target.result
        });
    }

    // O método readAsDataURL é usado para ler o conteúdo do tipo Blob ou File
    reader.readAsDataURL(this.files[0]);
});

// Executar a instrução quando o usuário clicar no botão enviar
$('.btn-upload-imagem').on('click', function () {
    redimensionar.croppie('result', {
        type: 'canvas', // Tipo de arquivos permitidos - base64, html, blob
        size: 'viewport' // O tamanho da imagem cortada
    }).then(function (img){
        // Enviar os dados para um arquivo PHP
        $.ajax({
            url: "upload.php", // Enviar os dados para o arquivo upload.php
            type: "POST", // Método utilizado para enviar os dados
            data: { // Dados que deve ser enviado
                "imagem": img
            },
            success: function(){
                // sweetalert - https://celke.com.br/artigo/como-usar-sweetalert-no-formulario-com-javascript-e-php
                alert("Imagem enviada com sucesso!");
            }
        });
    });
});