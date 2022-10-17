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
            'desconto',
            'termino_promocao',
            // 'foto_blob_publi',
            // 'foto_nome_publi',
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
    $data_post = date_format($data_post, 'd/m/Y');
    $hora_post = date_create($post['data_publicacao']);
    $hora_post = date_format($hora_post, 'H:i:s');
    $data_termino = date_create($post['termino_promocao']);
    $data_termino = date_format($data_termino, 'd/m/Y');

?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style/style.css">
        <link rel="stylesheet" href="style/style-navegador.css">
        <link rel="stylesheet" href="style/style-post-detalhe.css">
        <?php include('includes/settings.php') ?>
        <title>COMECOM | <?php echo $post['titulo']?></title>
    </head>
    <body>
        <?php include 'includes/navigator.php' ?>
        <div>
            <div>
                <div class="container-all">
                    <div class="container2">
                        <div class="container2-1">
                            <div class="comecom-avatar">
                                <img src="comunidade/comunidade-avatares/avatarTeste.png" alt="">
                                <h4><span>• Postado em: <?php echo $data_post . ' às ' . $hora_post?> Por <?php echo $post['nome'] ?></span></h4>
                            </div>
                        </div>
                        <div class="post-title"><h3><strong><?php echo $post['titulo']?></strong></h3></div>
                        <div class="post-texto"><h4><?php echo html_entity_decode($post['texto']) ?>    </h4></div>
                        <div class="post-img" align="center">
                            <!-- <img src="comunidade/comunidade-post-img/maxresdefault.jpg" style="height: 380px;">  -->
                            <!-- <?php echo $post['titulo']?> -->
                        </div>
                        <div class="post-desconto">         <h4><?php echo 'Valor do desconto: R$' . $post['desconto'] . ',00'?>                      </h4></div>
                        <div class="post-termino-promocao"> <h4><?php echo 'Término da promoçao: ' . $data_termino?>              </h4></div>
                    </div>
                </div>
            </div>
            <div>
                <button type="submit">
                    <a href="comunidade/" style="color: red; text-decoration: none;">Voltar</a>
                </button>
            </div>
        </div>
        <?php include 'includes/footer.php' ?>
    </body>
</html>