<!DOCTYPE html>
<?php
    require_once 'includes/funcoes.php';
    require_once 'core/conexao_mysql.php';
    require_once 'core/sql.php';
    require_once 'core/mysql.php';

    foreach($_GET as $indice => $dado) {
        $$indice = limparDados($dado);
    }

    $posts = buscar(
        'publicacao',
        [
            'titulo',
            'data_publicacao',
            'texto',
            '(select nome
                from pessoa
                where pessoa.id_pessoa = publicacao.id_pessoa) as nome'
        ],
        [
            ['id_publicacao', '=', $post]
        ]
    );
    $post = $posts[0];
    $data_post = date_create($post['data_publicacao']);
    $data_post = date_format($data_post, 'd/m/Y H:i:s');

?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $post['titulo']?></title>
    </head>
    <body>
        <div>
            <div>
                <div>
                    <div>
                        <h5><?php echo $post['titulo']?></h5>
                        <h5>
                            <?php echo $data_post?> Por <?php echo $post['nome']?>
                        </h5>
                        <div>
                            <?php echo html_entity_decode($post['texto']) ?>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <button type="submit">
                    <a href="teste.php" style="color: white; text-decoration: none;">Voltar</a>
                </button>
            </div>
        </div>
    </body>
</html>