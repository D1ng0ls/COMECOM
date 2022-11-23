<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php
        include('includes/settings.php');
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
    <link rel="stylesheet" href="style/style-mq.css">
    <title>COMECOM | <?php echo $_SESSION['login']['pessoa']['nome'] ?></title>
</head>

<body>
    <?php include('includes/navigator.php'); ?>

    <div class="container-page">
        <div class="container-name">
            <h1>Deletar</h1>
            <p>DESATIVE SUA CONTA COMECOM E REMOVA SEUS DADOS.</p>
        </div>
        <div class="container-form">
            <h3>Informação</h3>
            <p>Estamos tristes em saber que você deseja desativar sua conta! Lembre-se que, assim que sua conta for desativada, você não terá mais acesso aos seguintes dados:</p>
            <ul>
                <li>Aos usuários comuns:
                    <ul>
                        <li>Seus posts feito na Comunidade</li>
                        <li>À aba Comunidade</li>
                        <li>As ofertas feitas pelos anunciantes</li>
                    </ul>
                </li>
                <li>Aos anunciantes, vendedores etc.:
                    <ul>
                        <li>Diminuir o alcance dos seus produtos</li>
                        <li>Remove os anuncios ja feitos no site anteriormente</li>
                        <li>Perde a oportunidade de anunciar gratuitamente no nosso site</li>
                    </ul>
                </li>
            </ul>
            <p>Para confirmar sua decisão, digite no campo abaixo <b>Desativar</b></p>
            <form action="core/usuario_repositorio.php" method="POST">
                <input type="hidden" name="acao" value="apagar">
                <input type="hidden" name="id_pessoa" value="<?php echo $_SESSION['login']['pessoa']['id_pessoa'] ?>">
                <div class="input-user input-user2 nome-user" style="margin-top: 10px;">
                    <input type="text" id="desativar" required="required" placeholder="Desativar" oninput="abre()">
                </div>
                <div class="input-user input-user2 nome-user">
                    <label for="motivo">Nos diga o motivo da sua insatisfação: <i style="font-size: 10px;">(min. 150 caracteres)</i></label>
<textarea name="motivo" id="motivo" cols="30" rows="10" id="motivo" required="required" minlength="150" maxlength="250" placeholder="Min. 150 caracteres" oninput="ativar()" disabled></textarea>
                    <label id="crt">0</label>
                </div>
                <div class="input-user input-user2 input-user3 salvar-user">
                    <input type="submit" value="Deletar" disabled id="deleta">
                </div>
            </form>
            <p style="margin-top: 0;">Observe que esta ação é <b>PERMANENTE</b> e <b>IRREVERSÍVEL</b>.</p>
        </div>
    </div>

    <script>
        function abre() {
            if(document.getElementById('desativar').value == 'Desativar') {
                document.getElementById('motivo').disabled = false;
            } else {
                document.getElementById('motivo').disabled = true;
            }

            ativar();
        }

        function ativar() {
            if(document.getElementById('desativar').value == 'Desativar' && document.getElementById('motivo').value.length >= 150) {
                document.getElementById('deleta').disabled = false;
            } else {
                document.getElementById('deleta').disabled = true;
            }

            document.getElementById('crt').innerHTML = document.getElementById('motivo').value.length;
        }
    </script>

    <?php include('includes/footer.php'); ?>
</body>

</html>