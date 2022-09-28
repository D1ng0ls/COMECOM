<!DOCTYPE html>
<html lang="pt_BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style/style-register.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Register</title>
    </head>
    <body>
        <section>
            <div class="register-content">
                <div class="form-content">
                    <?php
                        require_once 'includes/funcoes.php';
                        require_once 'core/conexao_mysql.php';
                        require_once 'core/sql.php';
                        require_once 'core/mysql.php';

                        if(isset($_SESSION['login'])) {
                            $id = (int) $_SESSION['login']['usuario']['id'];

                            $criterio = [
                                ['id', '=', $id]
                            ];

                            $retorno = buscar(
                                'usuario',
                                ['id','nome','email'],
                                $criterio
                            );

                            $entidade = $retorno[0];
                        }
                    ?>
                    <div class="form-content-text">
                        <h2>Register</h2>
                    </div>
                    <div class= "register-redes-socias">
                        <i style="font-size:30px; color:#773d94" class="fa fa-google"></i>
                        <i style="font-size:30px; color:#773d94" class="fa fa-facebook"></i>
                    </div>
                    <span id="msgAlerta"></span>
                    <form method="post" action="core/usuario_repositorio.php" id="verification">
                        <input type="hidden" name="acao"
                                value="<?php echo empty($id) ? 'insert' : 'update' ?>">
                        <input type="hidden" name="id"
                                value="<?php echo $entidade['id'] ?? '' ?>">
                        <div class="input-content">
                            <span>Nome</span>
                            <input  type="text" 
                                    require="required" id="nome" name="nome"
                                    value="<?php echo $entidade['nome'] ?? '' ?>">
                        </div>
                        <div class="input-content">
                            <span>E-mail</span>
                            <input  type="text" require="required" 
                                    id="email" name="email"
                                    value="<?php echo $entidade['email'] ?? '' ?>">
                        </div>
                        <?php if(!isset($_SESSION['login'])): ?>
                            <div class="input-content">
                                <span>Senha</span>
                                <input type="password" require="required" 
                                id="senha" name="senha" 
                                value="<?php echo $entidade['senha'] ?? '' ?>">
                            </div>
                        <?php endif; ?>
                        <div class="input-content">
                            <span>Endereço</span>
                            <input  type="text" require="required" 
                                    id="endereco" name="endereco"
                                    value="<?php echo $entidade['endereco'] ?? '' ?>">
                        </div>
                        <div class="input-content">
                            <span>Telefone</span>
                            <input  type="text" require="required"
                                    id="telefone" name="telefone"
                                    value="<?php echo $entidade['telefone'] ?? '' ?>"> 
                        </div>
                        <div class="input-content">
                            <span>Tipo</span><br>
                            <select id="tipo_pessoa" name="tipo_pessoa" onchange="habilitar()"
                                    require="required">
                                <option value="fisica"><p>Pessoa Física</p></option>
                                <option value="juridica"><p>Pessoa Jurídica</p></option>
                            </select>
                        </div>
                        <div class="fisica">
                            <div class="input-content">
                                <span>CPF</span>
                                <input  type="text" require="required" 
                                        id="cpf" name="cpf"
                                        value="<?php echo $entidade['cpf'] ?? '' ?>">
                            </div>
                        </div>
                        <div class="juridica" style="display: none;">
                            <div class="input-content">
                                <span>CNPJ</span>
                                <input  type="text" require="required" 
                                        id="cnpj" name="cnpj"
                                        value="<?php echo $entidade['cnpj'] ?? '' ?>">
                            </div>
                            <div class="input-content">
                                <span>Quantidade de lojas</span>
                                <input  type="number" require="required"
                                        id="qnt_lojas" name="qnt_lojas"
                                        value="<?php echo $entidade['qnt_lojas'] ?? '' ?>">
                            </div> 
                        </div>
                        <!-- <div class="remember">
                            <label>
                                <input type="checkbox"> Lembre-me
                            </label>
                        </div> -->
                        <div class="input-content">
                            <button type="submit">Sign up</button>
                        </div>
                        <div class="input-content">
                            <p>Já possui uma conta? <a href="login.php">Entre!</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <script>
            function habilitar() {
                var tipoPessoa = document.querySelector('#tipo_pessoa').selectedIndex;
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
            
            const formulario =  document.querySelector("#verification");

            formulario.onsubmit = evento => {
                //Receber o valor do campo
                var nome = document.querySelector("#nome").value;
                console.log(nome);

                //Verificar se o campo está vazio
                if (nome === "") {
                    document.getElementById("msgAlerta").innerHTML = "<p>Erro: Necessário preencher campos</p>";    
                    return;
                }
            }
        </script> 
    </body>
</html>