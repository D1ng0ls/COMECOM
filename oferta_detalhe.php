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
         ['id_oferta', '=', $id_oferta]    
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
        <link rel="stylesheet" href="style/style-categorias.css">
        <link rel="stylesheet" href="style/style-mq.css">
        <?php
            include('includes/settings.php'); 
            if(!isset($_SESSION['login'])){
                header("Location: login.php");
                exit();
            }
        ?>
        <title>COMECOM | <?php echo $post['titulo'] ?></title>
    </head>
    <body>
        <?php include 'includes/navigator.php'; ?>
        <div class="item">
            <div class="img">
                <?php foreach($fotos as $foto) : ?>
                    <?php if ($foto != '') : ?>
                        <img src='<?php echo"upload/oferta/".$foto; ?>' style="width: 100%; height: 200px;">
                    <?php endif; ?>
                <?php endforeach ?>
            </div>
            <div class='item-info'>
                <div class='item-name'><h4><?php echo $post['titulo']?></h4></div>
                <!-- <?php if($post['categoria'] == 'mercado') { echo 'bruhh'; } ?></div> -->
                <div class='item-price'>
                    <span class='item-oldPrice'>R$ <?php echo $post['preco_original']?></span>
                    <span class='item-newPrice'>R$ <?php echo $post['preco_atual']?></span>
                </div>
            </div>
        </div>
        <?php include 'includes/footer.php'; ?>
    </body>
</html>