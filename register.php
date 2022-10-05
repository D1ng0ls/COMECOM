<!DOCTYPE html>
<html lang="pt_BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style/style-register.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>COMECOM | Register</title>
    </head>
    <body>
        <section>
            <div class="register-content">
                <div class="form-content">
                    <?php
                        if(isset($_SESSION['msg'])){
                            $email_msg=$_SESSION['msg']['email'];
                        }

                        require_once 'includes/funcoes.php';
                        require_once 'core/conexao_mysql.php';
                        require_once 'core/sql.php';
                        require_once 'core/mysql.php';

                        if(isset($_SESSION['login'])) {
                            $id = (int) $_SESSION['login']['pessoa']['id_pessoa'];

                            $criterio = [
                                ['id_pessoa', '=', $id]
                            ];

                            $retorno = buscar(
                                'pessoa',
                                ['id_pessoa','nome','email'],
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
                    </div>
                    <span id="msgAlerta"></span>
                    <form method="post" action="core/usuario_repositorio.php">
                        <input type="hidden" name="acao"
                                value="<?php echo empty($id) ? 'insert' : 'update' ?>">
                        <input type="hidden" name="id"
                                value="<?php echo $entidade['id_pessoa'] ?? '' ?>">
                        <div class="input-content">
                            <span>Nome</span>
                            <input  type="text" 
                                    require="required" id="nome" name="nome"
                                    value="<?php echo $entidade['nome'] ?? '' ?>">  
                            <small id="textNome"></small>
                        </div>
                        <div class="input-content">
                            <span>E-mail</span>
                            <input  type="text" require="required" 
                                    id="email" name="email"
                                    value="<?php echo $entidade['email'] ?? '' ?>">
                            <small style="color:red"><?php echo isset($email_msg) ? $email_msg: '' ?></small>                                    
                            <small id="textEmail"></small>
                        </div>
                        <?php if(!isset($_SESSION['login'])): ?>
                            <div class="input-content">
                                <span>Senha</span>
                                <input type="password" require="required" 
                                    id="senha" name="senha" 
                                    value="<?php echo $entidade['senha'] ?? '' ?>">
                                <small id="textSenha"></small>
                            </div>
                        <?php endif; ?>
                        <div class="input-content">
                            <span>Cidade</span>
                            <input  type="text" require="required" 
                                    id="cidade" name="cidade"
                                    value="<?php echo $entidade['cidade'] ?? '' ?>">
                            <small id="textCidade"></small>
                        </div>
                        <div class="input-content">
                            <span>Telefone</span>
                            <input  type="text" require="required"
                                    id="telefone" name="telefone"
                                    value="<?php echo $entidade['telefone'] ?? '' ?>"> 
                            <small id="textTelefone"></small>
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
                                <small id="textCpf"></small>
                            </div>
                        </div>
                        <div class="juridica" style="display: none;">
                            <div class="input-content">
                                <span>CNPJ</span>
                                <input  type="text" require="required" 
                                        id="cnpj" name="cnpj"
                                        value="<?php echo $entidade['cnpj'] ?? '' ?>">
                                <small id="textCnpj"></small>
                            </div>
                            <div class="input-content">
                                <span>Quantidade de lojas</span>
                                <input  type="number" require="required"
                                        id="qnt_lojas" name="qnt_lojas"
                                        value="<?php echo $entidade['qnt_lojas'] ?? '' ?>">
                                <small id="textQnt_lojas"></small>
                            </div> 
                        </div>
                        <!-- <div class="remember">
                            <label>
                                <input type="checkbox"> Lembre-me
                            </label>
                        </div> -->
                        <div class="input-content">
                            <button type="submit">Sign up</button>
                            <small id="textForm"></small>
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
        </script> 
        <script src="scripts/register.js"></script>
    </body>
</html>