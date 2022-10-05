<!DOCTYPE html><!-- ALTERAÇÃO - 04/10/2022 -RETIREI ALGUMAS COIAS DE DATA E MUDEI ALGUNS NOMES PARA DEIXAR DE ACORDO - ASS:BONINI-->
<html lang="pt_BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="lib/bootstrap-4.2.1-dist/css/bootstrap.min.css">
        <title>COMECOM | ADM</title>
    </head>
    <body>
        <?php
            session_start();
        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php
                        include 'includes/valida_login.php';
                        if($_SESSION['login']['pessoa']['adm'] !==1) {
                            header('Location: home.php');
                        }
                    ?>
                </div>
            </div>
            <div class="row" style="min-height: 500px;">
                <div class="col-md-12" style="padding-top: 50px;">
                    <h2>Usuário</h2>
                    <?php
                        require_once 'includes/funcoes.php';
                        require_once 'core/conexao_mysql.php';
                        require_once 'core/sql.php';
                        require_once 'core/mysql.php';

                        foreach($_GET as $indice => $dado) {
                            $$indice = limparDados($dado);
                        }

                        $criterio = [];

                        if(!empty($busca)) {
                            $criterio [] = ['nome', 'like', "%{$busca}%"];
                        }

                        $result = buscar(
                            'pessoa',
                            [
                                'id_pessoa',
                                'nome',
                                'email',
                                'ativo',
                                'adm'
                            ],
                            $criterio
                        );

                    ?>
                    <table>
                        <thead>
                            <tr>
                                <td>Nome</td>
                                <td>E-mail</td>
                                <td>Ativo</td>
                                <td>Administrador</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($result as $entidade):
                            ?>                            
                            <tr>
                                <td><?php echo $entidade['nome'] ?></td>
                                <td><?php echo $entidade['email'] ?></td>
                                <td><a href='core/usuario_repositorio.php?acao=status&id_pessoa=<?php echo $entidade['id_pessoa']?>&valor=<?php echo !$entidade['ativo']?>'><?php echo ($entidade['ativo']==1) ? 
                                'Desativar' : 'Ativar'; ?></a></td>
                                <td><a href='core/usuario_repositorio.php?acao=adm&id_pessoa=<?php echo $entidade['id_pessoa']?>&valor=<?php echo !$entidade['adm']?>'><?php echo ($entidade['adm']==1) ? 'Rebaixar'
                                : 'Promover'; ?></a></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table> 
                </div>
            </div>
        </div>
        <script src="lib/bootstrap-4.2.1-dist/js/bootstrap.min.js"></script>
    </body>
</html>
