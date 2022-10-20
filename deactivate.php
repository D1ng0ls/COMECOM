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
        }
    ?>

    <div class="container-page">
        <div class="container-name">
            <h1>Deletar</h1>
            <p>DESATIVE SUA CONTA COMECOM E REMOVA SEUS DADOS.</p>
        </div>
        <div class="container-form">
            <h3>Informação</h3>
            <p>Estamos tristes em saber que você deseja desativar sua conta! Lembre-se que, assim que sua conta for desativada, você não terá mais acesso aos seguintes dados:</p>
            <ul>
                <li>Seus posts feito na Comunidade</li>
                <li>à aba Comunidade</li>
                <li></li>
                <li></li>
            </ul>
            <p>Para confirmar sua decisão, digite no campo abaixo <b>desativar</b></p>
            <form action="core/usuario_repositorio.php" method="POST">
                <input type="hidden" name="acao" value="apagar">
                <input type="hidden" name="id_pessoa" value="<?php echo $_SESSION['login']['pessoa']['id_pessoa'] ?>">
                <div class="input-user input-user2 nome-user" style="margin-top: 20px;">
                    <input type="text" id="desativar" required="required" placeholder="desativar" oninput="confirma()">
                </div>
                <div class="input-user input-user2 input-user3 salvar-user">
                    <input type="submit" value="Deletar" disabled id="deleta">
                </div>
            </form>
            <p style="margin-top: 0;">Observe que esta ação é <b>PERMANENTE</b> e <b>IRREVERSÍVEL</b>.</p>
        </div>
    </div>

    <script>
        function confirma() {
            if(document.getElementById('desativar').value == 'desativar') {
                document.getElementById('deleta').disabled = false;
            } else {
                document.getElementById('deleta').disabled = true;
            }
        }
    </script>

    <?php include('includes/footer.php'); ?>
</body>

</html>