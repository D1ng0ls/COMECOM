<!DOCTYPE html>
<html lang="pt_BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style-register.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Register</title>
    </head>
    <script>
        function habilitar() {
        var tipoPessoa = document.querySelector('#tipo').selectedIndex;
        var juridica = document.querySelector('.juridica');
        var fisica = document.querySelector('.fisica');

        if (tipoPessoa == 1) {
            juridica.style.display = "block";
            fisica.style.display = "none";
        } else {
            fisica.style.display = "block";
            juridica.style.display = "none";
        }
    }
    </script>
    <body>
        <section>
            <div class="register-content">
                <div class="form-content">
                    <div class="form-content-text">
                        <h2>Register</h2>
                    </div>
                    <div class= "register-redes-socias">
                        <i style="font-size:30px; color:#773d94" class="fa fa-google"></i>
                        <i style="font-size:30px; color:#773d94" class="fa fa-facebook"></i>
                    </div>
                    <form>
                        <div class="input-content">
                            <span>Nome</span>
                            <input type="text" name="nome">
                        </div>
                        <div class="input-content">
                            <span>Email</span>
                            <input type="email" name="email">
                        </div>
                        <div class="input-content">
                            <span>Senha</span>
                            <input type="password" name="senha">
                        </div>
                        <div class="input-content">
                            <span>Endereço</span>
                            <input type="text" name="endereco">
                        </div>
                        <div class="input-content">
                            <span>Telefone</span>
                            <input type="text" name="telefone">
                        </div>
                        <div class="input-content">
                            <span>Tipo</span><br>
                            <select id="tipo" name="tipo" onchange="habilitar()">
                                <option><p>Pessoa Física</p></option>
                                <option><p>Pessoa Jurídica</p></option>
                            </select>
                        </div>
                        <div class="fisica">
                            <div class="input-content">
                                <span>CPF</span>
                                <input type="text" name="cpf">
                            </div>
                        </div>
                        <div class="juridica" style="display: none;">
                            <div class="input-content">
                                <span>CNPJ</span>
                                <input type="text" name="cpf">
                            </div>
                            <div class="input-content">
                                <span>Quantidade de lojas</span>
                                <input type="number" name="qnt_lojas">
                            </div>
                        </div>
                        <div class="remember">
                            <label>
                                <input type="checkbox"> Lembre-me
                            </label>
                        </div>
                        <div class="input-content">
                            <input type="submit" value="Sign up">
                        </div>
                        <div class="input-content">
                            <p>Já possui uma conta? <a href="login.php">Entre!</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </body>
</html>