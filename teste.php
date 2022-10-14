<!DOCTYPE html> <!-- teste -->
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>COMECOM</title>
    </head>
    <body>
        <div class="teste">
            <div>
                <div>
                    <div>
                        <h2>Página Inicial</h2>
                        <?php
                            include 'includes/busca.php';
                        ?>
                        <?php
                            require_once 'includes/funcoes.php';
                            require_once 'core/conexao_mysql.php';
                            require_once 'core/sql.php';
                            require_once 'core/mysql.php';

                            foreach($_GET as $indice => $dado) {
                                $$indice = limparDados($dado);
                            }

                            $data_atual = date('Y-m-d H:i:s');

                            $criterio = [
                                ['data_publicacao', '<=', $data_atual]
                            ];

                            if(!empty($busca)) {
                                $criterio[] = [
                                    'AND',
                                    'titulo',
                                    'like', 
                                    "%{$busca}%"
                                ];
                            }

                            $posts = buscar (
                                'publicacao',
                                [
                                    'titulo',
                                    'data_publicacao',
                                    'id_publicacao',
                                    '(select nome
                                        from pessoa
                                        where pessoa.id_pessoa = publicacao.id_pessoa) as nome'
                                ],
                                $criterio,
                                'data_publicacao DESC'
                            );
                        ?>

                        <div>
                            <div>
                                <?php
                                    foreach($posts as $post) :
                                        $data = date_create($post['data_publicacao']);
                                        $data = date_format($data, 'd/m/Y H:i:s');
                                ?>
                                <a href="post_detalhe.php?post=<?php echo $post['id_publicacao']?>">
                                    <strong><?php echo $post['titulo']?></strong>
                                    [<?php echo $post['nome']?>]
                                    <span><?php echo $data?></span>
                                </a>
                                <br>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <a href="../COMECOM">Vorta pra lá sô</a>
        </div>
    </body>
</html>