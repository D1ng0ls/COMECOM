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
        'oferta',
            [
                'titulo',
                'data_oferta',
                'id_oferta',
                'preco_original',
                'desconto',
                'preco_atual',
                'inicio_oferta',
                'termino_oferta',
                'foto_nome_oferta',
                'categoria',
                'marca',
                '(select nome
                    from pessoa
                    where id_pessoa = oferta.id_pessoa) as nome'
        ],
        [
            // ['id_oferta', '=', $post]    
        ]
    );
    $post = $posts[0];
    $data_post = date_create($post['data_oferta']);
    $data_post = date_format($data_post, 'd/m/Y');
    $hora_post = date_create($post['data_oferta']);
    $hora_post = date_format($hora_post, 'H:i');
    $fotos = explode(';',$post['foto_nome_oferta']);
?>
<html lang="pt_BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style/style.css">
        <link rel="stylesheet" href="style/style-navegador.css">
        <?php include('includes/settings.php') ?>
        <title>COMECOM | </title>
    </head>
    <body>
        <?php include 'includes/navigator.php'; ?>
        <?php include 'includes/footer.php'; ?>
    </body>
</html>