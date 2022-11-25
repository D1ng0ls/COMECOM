<!DOCTYPE html>
<html lang="pt_BR">
    <head>
        <?php
            include('includes/settings.php');
            if(!isset($_SESSION['login'])){
                header("Location: login.php");
                exit();
            }
            if($_SESSION['login']['pessoa']['adm'] !== 1) {
                header('Location: /COMECOM/');
            }
        ?>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style/style-usuarios.css">
        <link rel="stylesheet" href="style/style.css">
        <link rel="stylesheet" href="style/style-navegador.css">
        <link rel="stylesheet" href="style/style-busca.css">
        <link rel="stylesheet" href="style/style-mq.css">
        <title>COMECOM | ADM</title>
    </head>

    <body>
        <?php
            include 'includes/navigator.php';
            include 'includes/valida_login.php';
            
            
        ?>

        <?php
            include 'includes/footer.php';
        ?>
    </body>
</html>