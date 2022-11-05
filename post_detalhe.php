<!DOCTYPE html>
<?php
    if(!isset($_SESSION['login'])){
        header("Location: login.php");
        exit();
    }
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
            'foto_nome_publi',
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
    $hora_post = date_format($hora_post, 'H:i');
    $fotos = explode(';',$post['foto_nome_publi']);
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
                <div>
                    <div class="container2">
                        <div class="container2-1">
                            <div class="comecom-avatar">
                                <img src="comunidade/comunidade-avatares/avatarTeste.png" alt="">
                                <h4><span><?php echo $post['nome'] ?> • Postado em: <?php echo $data_post . ' às ' . $hora_post?></span></h4>
                            </div>
                        </div>
                        <div class="post-title"><h3><strong><?php echo $post['titulo']?></strong></h3></div>
                        <div class="post-texto"><h4><?php echo html_entity_decode($post['texto']) ?></h4></div>
                        <div class="post-img" align="center">
                            <?php foreach($fotos as $foto) : ?>
                                <?php if ($foto != '') : ?>
                                    <img src='<?php echo"upload/post/".$foto; ?>' style="width: 45%">
                                <?php endif; ?>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'includes/footer.php' ?>
    </body>
</html>