<?php 
    include('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt_BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
    </head>
    <body>
    <h1>Acesse sua conta</h1>
        <form action="" method="POST">
            <div>
                <label>Nome</label>
                <input type="text" name="nome">
            </div>
            <div>
                <label>E-mail</label>
                <input type="text" name="email">
            </div>
            <div>
                <label>Senha</label>
                <input type="password" name="senha">
            </div>
            <div>
                <button type="submit">Entrar</button>
            </div>
        </form>
    </body>
</html>
