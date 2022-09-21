<!DOCTYPE html>
<html lang="pt_BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style/style-login.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Login</title>
    </head>
    <body>
        <section>
            <div class="login-content">
                <div class="form-content">
                    <div class="form-content-text">
                        <h2>Login</h2>
                    </div>
                    <div class= "login-redes-socias">
                        <i style="font-size:30px; color:#773d94" class="fa fa-google"></i>
                        <i style="font-size:30px; color:#773d94" class="fa fa-facebook"></i>
                    </div>
                    <form method="post" action="core/usuario_repositorio.php">
                        <div class="input-content">
                            <span>E-mail</span>
                            <input  type="text" require="required" 
                                    id="email" name="email">
                        </div>
                        <div class="input-content">
                            <span>Senha</span>
                            <input  type="password" require="required" 
                                    id="senha" name="senha">
                        </div>
                        <div class="remember">
                            <label>
                                <input type="checkbox"> Lembre-me
                            </label>
                        </div>
                        <div class="input-content">
                            <button type="submit">Sign in</button>
                        </div>
                        <div class="input-content">
                            <p>Não tem uma conta? <a href="register.php">Se inscreva!</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </body>
</html>