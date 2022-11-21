<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.css">
    <title>Redimensionar</title>
</head>

<body>

    <h1>Formulário</h1>

    <!-- Campo upload -->
    <label>Foto: </label>
    <input type="file" name="imagem" id="imagem"><br><br>

    <!-- Botão recortar imagem e realizar upload -->
    <button class="btn-upload-imagem">Enviar</button>

    <!-- Apresentar o preview da imagem -->
    <div id="preview"></div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js"></script>

    <script src="scripts/custom.js"></script>

</body>

</html>