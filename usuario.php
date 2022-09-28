<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include('includes/settings.php'); ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/style-navegador.css">
    <link rel="stylesheet" href="style/style-comunidade.css">
    <title>COMECOM | <?php echo $_SESSION['login']['pessoa']['nome'] ?></title>
</head>

<body>
    <?php include('includes/navigator.php'); ?>
    <?php
    if(!isset($_SESSION['login'])){
        header("Location: login.php");
        exit();
    };?>
    <?php include('includes/footer.php'); ?>
</body>

</html>