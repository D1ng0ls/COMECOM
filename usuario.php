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
            <a href="/COMECOM/">
                <div class="logo-user">
                    <img src="media/shortcut.png" alt="Logo COMECOM">
                </div>
            </a>
            <div class="buttom-div btn1">
                <a href="core/usuario_repositorio.php?acao=logout">Sair</a>
            </div>
            <div class="buttom-div btn2">
                <a href="">Excluir Conta</a>
            </div>
        </div>
        <div class="info-user">
            <div class="title-page">
                <h1>Informações pessoais</h1>
                <p>Gerencie seus dados no site</p>
            </div>
            <form action="core/usuario_repositorio.php">
                <h5>Informação pessoal - Pessoa <?php echo $_SESSION['login']['pessoa']['tipo_pessoa'] ?></h5>
                <hr>
                <input type="hidden" name="acao" value="update">
                <input type="hidden" name="id_pessoa" value="<?php echo $_SESSION['login']['pessoa']['id_pessoa'] ?>">
                <input type="hidden" name="tipo_pessoa" value="<?php echo $_SESSION['login']['pessoa']['tipo_pessoa'] ?>">
                <div class="input-user foto-user input-left">
                    <div class="foto <?php if($_SESSION['login']['pessoa']['tipo_pessoa'] == 'juridica'){echo "juridico";} else { echo "";} ?>">
                        <label for="foto">Alterar Foto</label>
                    </div>
                    <!--<input type="file" name="foto" id="foto" alt="." value="" disabled> -->
                </div>
                <div class="input-user nome-user">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" id="nome" value="<?php echo $_SESSION['login']['pessoa']['nome'] ?>" required="required">
                </div>
                <div class="input-user doc-user">
                    <label for="documento">Documento:</label>
                    <input type="password" name="documento" id="documento" value="<?php echo $_SESSION['login']['pessoa']['documento'] ?>" onclick="view()" readonly="readonly">
                </div>
                <div class="input-user email-user input-left medium">
                    <label for="email">Email:</label>
                    <input type="text" name="email" id="email" value="<?php echo $_SESSION['login']['pessoa']['email'] ?>" required="required">
                </div>
                <div class="input-user phone-user input-right medium">
                    <label for="telefone">Telefone:</label>
                    <input type="text" name="telefone" id="telefone" value="<?php echo $_SESSION['login']['pessoa']['telefone'] ?>" required="required">
                </div>
                <div class="input-user cidade-user <?php if($_SESSION['login']['pessoa']['tipo_pessoa'] == 'juridica'){echo "medium input-left";} else { echo "";} ?>">
                    <label for="cidade">Cidade:</label>
                    <input type="text" name="cidade" id="cidade" value="<?php echo $_SESSION['login']['pessoa']['cidade'] ?>" required="required">
                </div>
                <?php if($_SESSION['login']['pessoa']['tipo_pessoa'] == 'juridica') : ?>
                <div class="input-user qnt-lojas medium input-right">
                    <label for="qnt_lojas">Quantidade de lojas:</label>
                    <input type="number" name="qnt_lojas" id="qnt_lojas" value="<?php echo $_SESSION['login']['pessoa']['qnt_lojas'] ?>" required="required">
                </div>
                <?php endif; ?>
                <?php if($_SESSION['login']['pessoa']['tipo_pessoa'] != 'juridica') : ?>
                    <input type="hidden" name="qnt_lojas" value="">
                <?php endif; ?>
                <div class="input-user data-user input-left medium">
                    <label for="data">Ativo desde:</label>
                    <input type="text" name="data" id="data" value="16/09/2018" readonly="readonly">
                </div>
                <a href="security.php" class="senha"><div class="input-user input-password input-right medium">
                    Mudar senha
                </div></a>
                <div class="input-user salvar-user">
                    <input type="submit" value="Salvar">
                </div>
            </form>
        </div>
    </div>

    <?php include('includes/footer.php'); ?>

    <script>
        var i = 0;

        function view() {
            if(i==0) {
                document.getElementById('documento').type = 'text';
                i=1;
            } else {
                document.getElementById('documento').type = 'password';
                i=0;
            }
        }
    </script>
</body>

</html>