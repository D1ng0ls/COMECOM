<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/style.css">
    <link rel="stylesheet" href="../../style/style-navegador.css">
    <link rel="stylesheet" href="../../style/style-categorias.css">
    <link rel="stylesheet" href="../../style/style-mq.css">
    <?php include('../../includes/settings.php'); ?>
    <title>COMECOM | <?php echo nome($url); ?></title>
</head>

<body>
<?php include('../../includes/navigator.php'); ?>
    <div class="cabecao">
        <h1><?php echo nome($url); ?></h1>
    </div>
    <div class="container-anuncios">
        <div class="container-left">
            <?php include '../../includes/filters.php' ?>
        </div>
        <div class="container-right">
                <?php 
                    include '../../includes/sort.php' 
                ?>
                <?php 
                    require_once '../../includes/funcoes.php';
                    require_once '../../core/conexao_mysql.php';
                    require_once '../../core/sql.php';
                    require_once '../../core/mysql.php';
                ?>
                <?php
                    include '../../includes/oferta.php' 
                ?>
            <div class="pages">
                <a class="selected" href="">1</a>
                <a href="?number_page=2">2</a>
            </div>
        </div>
    </div>

<?php include('../../includes/footer.php'); ?>
</body>
</html>