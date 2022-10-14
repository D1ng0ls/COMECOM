<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include('includes/settings.php'); ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/style-navegador.css">
    <link rel="stylesheet" href="style/style-usuario.css">
    <title>COMECOM | <?php echo $_SESSION['login']['pessoa']['nome'] ?></title>
</head>

<body>
    <?php include('includes/navigator.php'); ?>
    <?php
        if(!isset($_SESSION['login'])){
            header("Location: login.php");
            exit();
        } else if(isset($_SESSION['login']) && $url != $pgu) {
            header("Location: usuario.php");
            exit();
        };
    ?>
    

    <div class="container-user">
        <div class="navigator-user">
            <div class="logo-user">
                <img src="media/shortcut.png" alt="Logo COMECOM">
            </div>
            <div class="buttom-div btn1">
                <a href="">Dados Pessoais</a>
            </div>
            <div class="buttom-div btn2">
                <a href="core/usuario_repositorio.php?acao=logout">Sair</a>
            </div>
            <div class="buttom-div btn3">
                <a href="">Excluir Conta</a>
            </div>
        </div>
        <div class="info-user">
            <form action="core/usuario_repositorio.php">
                <input type="hidden" name="acao" value="update">
                <input type="hidden" name="id_pessoa" value="<?php echo $_SESSION['login']['pessoa']['id_pessoa'] ?>">
                <img src="media/<?php if (isset($_SESSION['login']['pessoa']['foto_nome_pessoa'])) { echo $_SESSION['login']['pessoa']['foto_nome_pessoa']; } else { echo "login.png"; }; ?>">
                <input type="file" name="foto" id="foto" alt="." value="" disabled>
                <label for="foto">Alterar Foto</label>
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" value="<?php echo $_SESSION['login']['pessoa']['nome'] ?>">
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" value="<?php echo $_SESSION['login']['pessoa']['email'] ?>">
                <label for="doc">Documento:</label>
                <input type="text" name="doc" id="doc" value="<?php echo $_SESSION['login']['pessoa']['documento'] ?>" disabled>
                <label for="nome">Documento:</label>
                <input type="text" name="password" id="password" value="<?php echo $_SESSION['login']['pessoa']['documento'] ?>" disabled>
                
            </form>
        </div>
    </div>

    <?php include('includes/footer.php'); ?>
</body>

</html>