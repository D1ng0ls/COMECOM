<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/style-navegador.css">
    <link rel="stylesheet" href="../style/style-comunidade.css">
    <link rel="stylesheet" href="../style/style-busca.css">
    <title>COMECOM | Comunidade</title>
    <?php include('../includes/settings.php'); ?>
</head>

<body>
    <?php include('../includes/navigator.php'); ?>

    <div align="center">
        <img src="comunidade-img\comecom-comunidade-logo2.png" id="comecom-logo">
    </div>
    <div class="container1">  <!-- BOAS VINDAS -->
        <div class="container1-1">
            <p>Bem vindo ao fórum de conversas da COMECOM!</p>
        </div>
        <div class="container1-2">
            <p> Olá cidadão, seja bem vindo ao fórum da COMECOM; com uma simples conta em nosso website, você poderá fazer publicaçõoes
                no fórum, sobre promoções que você viu ou sobre algum outro assunto relacionado a isso. Logo abaixo, você 
                pode acessar as regras do site. Caso você queira saber mais sobre a gente, considere acessar o FAQ também!  
            </p>
            <p>Acesse as <a href="rules.html">regras</a> do fórum e evite probelmas. Saiba mais sobre a gente no <a href="faq.php">FAQ</a> caso você desejar! :)</p>
        </div>
    </div>

    <?php if(isset($_SESSION['login'])) :?>
     
        <h2 align="center" style="color: #34345c; margin-top: 40px;">
            [<span class="botaoTOP" onclick="aparece()" style="cursor: pointer;">Adicionar um Novo Post</span>]
        </h2>
        <div class="container-post" id="post">
            <?php include("../includes/post_formulario.php") ?>
        </div>
        <hr style="width: 25%; margin: auto; margin-top: 20px; margin-bottom: 20px;">
        <?php include("../includes/posts.php") ?>
    <?php else : ?>
        <hr style="width: 30%; margin-top: 60px;">
        <h2 align="center" style="color: #34345c;">
            [<a href="../login.php" class="botaoTOP">Faça Login para Visualizar a Comunidade</a>]
        </h2>
        <hr style="width: 30%;">
    <?php endif; ?>

    <?php include('../includes/footer.php'); ?>

    <script>
        function aparece() {
            document.getElementById("post").classList.toggle("aberto");
        }
    </script>
</body>

</html>