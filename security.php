<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include('includes/settings.php');
        if(!isset($_SESSION['login'])){
            header("Location: login.php");
            exit();
        }
    ?>
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
        if(isset($_SESSION['msg']['user'])){
            $login_msg = $_SESSION['msg']['user'];
        }
    ?>

    <div class="container-page">
        <div class="container-name">
            <h1>Segurança</h1>
            <p>Configure suas opções de segurança de conta</p>
        </div>
        <div class="container-tricks">
            <h3>Dicas de senha</h3>
            <p>Usar números, símbolos e mistura de letras maiúsculas e minúsculas torna sua senha mais difícil de ser descoberta. Por exemplo, uma senha de oito caracteres com números, símbolos e letras maiúsculas e minúsculas é mais difícil de adivinhar porque tem 30.000 vezes mais combinações possíveis que uma senha de oito caracteres com apenas letras minúsculas.</p>
        </div>
        <div class="container-form">
            <h3>Nova senha</h3>
            <form action="core/usuario_repositorio.php">
                <input type="hidden" name="acao" value="trocasenha">
                <input type="hidden" name="id_pessoa" value="<?php echo $_SESSION['login']['pessoa']['id_pessoa'] ?>">
                <div class="input-user input-user2 nome-user" style="margin-top: 20px;">
                    <label for="senha">Senha atual:</label>
                    <input type="password" name="senha" id="senha" required="required" oninput="verifica()">
                    <label style="color: red; margin-bottom: 18px;transform: translateY(-12px);"><?php echo isset($login_msg) ? $login_msg: '' ?></label>
                </div>
                <div class="input-user input-user2 senha-user">
                    <label for="novasenha">Nova senha:</label>
                    <input type="password" name="novasenha" id="novasenha" required="required">
                    <label style="color: red; margin-bottom: 0;transform: translateY(-12px);" id="textSenhaNova" oninput="pode()"></label>
                </div>
                <div class="input-user input-user2 salvar-user salvar-user2">
                    <input type="submit" value="Salvar" id='botao' disabled>
                </div>
            </form>
        </div>
    </div>

    <?php include('includes/footer.php'); ?>
    <script src="scripts/updatePass.js"></script>
</body>

</html>