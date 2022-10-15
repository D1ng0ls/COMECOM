<!DOCTYPE html>
<html lang="pt_BR">
    <head>
    <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style/style-usuarios.css">
        <title>COMECOM | ADM</title>
    </head>
    <body>
        <?php
            session_start();
            include 'includes/valida_login.php';
            if($_SESSION['login']['pessoa']['adm'] !== 1) {
                header('Location: ../COMECOM');
            }
        ?>
        <h2>Usuário</h2>
        <?php include 'includes/busca.php' ?>
        <?php
            require_once 'includes/funcoes.php';
            require_once 'core/conexao_mysql.php';
            require_once 'core/sql.php';
            require_once 'core/mysql.php';

            foreach($_GET as $indice => $dado) {
                $$indice = limparDados($dado);
            }

            $data_atual = date('Y-m-d H:i:s');

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
                    'data_criacao',
                    'ativo',
                    'adm'
                ],
                $criterio,
                'data_criacao DESC, nome ASC'
            );

        ?>
        <table>
            <thead>
                <tr>
                    <td>Nome</td>
                    <td>E-mail</td>
                    <td>Data criacao</td>
                    <td>Ativo</td>
                    <td>Administrador</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($result as $entidade):
                        $data = date_create($entidade['data_criacao']);
                        $data = date_format($data, 'd/m/Y H:i:s');
                ?>
                <tr>
                    <td><?php echo $entidade['nome'] ?></td>
                    <td><?php echo $entidade['email'] ?></td>
                    <td><?php echo $data ?></td>
                    <td><a href="core/usuario_repositorio.php?acao=status&id_pessoa=<?php echo $entidade['id_pessoa']?>&valor=<?php echo !$entidade['ativo']?>"><?php echo ($entidade['ativo']==1) ? 'Desativar' : 'Ativar'; ?></a></td>
                    <td><a href="core/usuario_repositorio.php?acao=adm&id_pessoa=<?php echo $entidade['id_pessoa']?>&valor=<?php echo !$entidade['adm']?>"><?php echo ($entidade['adm']==1) ? 'Rebaixar' : 'Promover'; ?></a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>  
        <a href="../COMECOM">Vortar</a>  
    </body>
</html>