<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/style-navegador.css">
    <link rel="stylesheet" href="../style/style-comunidade.css">
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
            <p>Olá cidadão, seja bem vindo ao fórum da COMECOM; com uma simples conta em nosso website, você poderá postar/discutir com
                    outras pessoas do fórum sobre promoções que você viu ou sobre algum outro assunto relacionado a isso. Logo abaixo, você 
                    pode acessar as regras do site. Caso você queira saber mais sobre a gente, considere acessar o FAQ também!  
            </p>
            <p>Acesse as <a href="rules.html">regras</a> do fórum e evite probelmas. Saiba mais sobre a gente no <a href="faq.php">FAQ</a> caso você desejar! :)</p>
        </div>
    </div>

    <?php if(isset($_SESSION['login'])) :?>
    <div class="container2">  <!-- POST MODELO -->
        <div class="container2-1">
            <div class="comecom-avatar">
                <img src="comunidade-avatares/avatarTeste.png">
                <p><a href="/">Natsuki Subaru</a></p>
                <h4>• Postado em: 14/02/2005 às 23:59</h4>
            </div>
        </div>
        <div class="container2-2">
            <div class="post-title">
                <h3>#CultCrew #Shalom #DeioCool #GaslightingSilvers</h3>
            </div>
            <div class="post-img" align="center">
                <img src="comunidade-post-img/maxresdefault.jpg" style="height: 380px;">
            </div>
        </div>
        <div class="container2-3">
            <div class="comecom-denunciar">
                <a href="">
                    <p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" fill="currentColor" viewBox="0 0 24 24">
                            <path xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" d="M3.6 7.2a3.6 3.6 0 0 1 3.6-3.6h12a1.2 1.2 0 0 1 .96 1.92L17.1 9.6l3.06 4.08a1.201 1.201 0 0 1-.96 1.92h-12A1.2 1.2 0 0 0 6 16.8v3.6a1.2 1.2 0 0 1-2.4 0V7.2Z" clip-rule="evenodd"/>
                        </svg>
                        Ver detalhes
                    </p>
                </a>                
                <a href="">
                    <p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M13.2 3.6a1.2 1.2 0 1 0 0 2.4h3.103l-7.551 7.552a1.2 1.2 0 1 0 1.696 1.696L18 7.697V10.8a1.2 1.2 0 1 0 2.4 0v-6a1.2 1.2 0 0 0-1.2-1.2h-6Z"/>
                            <path d="M6 6a2.4 2.4 0 0 0-2.4 2.4V18A2.4 2.4 0 0 0 6 20.4h9.6A2.4 2.4 0 0 0 18 18v-3.6a1.2 1.2 0 1 0-2.4 0V18H6V8.4h3.6a1.2 1.2 0 1 0 0-2.4H6Z"/>
                        </svg>
                        Denunciar postagem
                    </p>
                </a>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <?php include('../includes/footer.php'); ?>
</body>

</html>