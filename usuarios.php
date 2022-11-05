<!DOCTYPE html>
<html lang="pt_BR">
    <head>
        <?php include('includes/settings.php'); ?>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style/style-usuarios.css">
        <link rel="stylesheet" href="style/style.css">
        <link rel="stylesheet" href="style/style-navegador.css">
        <link rel="stylesheet" href="style/style-busca.css">
        <title>COMECOM | ADM</title>
    </head>

    <body>
        <div>
            <?php
                include 'includes/navigator.php';
                include 'includes/valida_login.php';
                if($_SESSION['login']['pessoa']['adm'] !== 1) {
                    header('Location: ../COMECOM');
                }
                if(!isset($_SESSION['login'])){
                    header("Location: login.php");
                    exit();
                } 
            ?>
        </div>
        <div class="container-users">
            <div class="title-page">
                <div class="container-title-page-1">
                    Administração
                </div>
                <div class="container-title-page-2">
                    Gerenciamento de usuários
                </div>
            </div>
            <div class="users-busca">
                <hr style="width: 32%; margin: auto; margin-top: 20px; margin-bottom: 20px;">
                <?php include 'includes/busca.php' ?>
                <hr style="width: 32%; margin: auto; margin-top: 20px; margin-bottom: 20px;"> 
            </div>
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
            <div class="table-users">
                <table class="rTable" id="myTable">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Data de criação</th>
                            <th>Ativo</th>
                            <th>Administrador</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($result as $entidade):
                                $data = date_create($entidade['data_criacao']);
                                $data_t = date_format($data, 'd/m/Y');
                                $hora = date_format($data, 'H:i');
                        ?>
                        <tr>
                            <td><?php echo $entidade['id_pessoa']?></td>
                            <td><?php echo $entidade['nome'] ?></td>
                            <td><?php echo $entidade['email'] ?></td>
                            <td><?php echo $data_t.' às '.$hora ?></td>
                            <td><a href="core/usuario_repositorio.php?acao=status&id_pessoa=<?php echo $entidade['id_pessoa']?>&valor=<?php echo !$entidade['ativo']?>"><?php echo ($entidade['ativo']==1) ? 'Desativar' : 'Ativar'; ?></a></td>
                            <td><a href="core/usuario_repositorio.php?acao=adm&id_pessoa=<?php echo $entidade['id_pessoa']?>&valor=<?php echo !$entidade['adm']?>"><?php echo ($entidade['adm']==1) ? 'Rebaixar' : 'Promover'; ?></a></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table> 
            </div>
        </div>
        <div>
            <?php
                include 'includes/footer.php';
            ?>
        </div>

        <script>
            var table, rows, switching, i, x, y, shouldSwitch;
            table = document.getElementById("myTable");
            switching = true;
            /*Make a loop that will continue until
            no switching has been done:*/
            while (switching) {
                //start by saying: no switching is done:
                switching = false;
                rows = table.rows;
                /*Loop through all table rows (except the
                first, which contains table headers):*/
                for (i = 1; i < (rows.length - 1); i++) {
                //start by saying there should be no switching:
                shouldSwitch = false;
                /*Get the two elements you want to compare,
                one from current row and one from the next:*/
                x = rows[i].getElementsByTagName("TD")[0];
                y = rows[i + 1].getElementsByTagName("TD")[0];
                //check if the two rows should switch place:
                if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                    //if so, mark as a switch and break the loop:
                    shouldSwitch = true;
                    break;
                }
                }
                if (shouldSwitch) {
                /*If a switch has been marked, make the switch
                and mark that a switch has been done:*/
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
                }
            }
        </script>
    </body>
</html>