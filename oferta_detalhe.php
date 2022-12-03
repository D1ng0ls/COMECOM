<!DOCTYPE html>
<?php
    require_once 'includes/funcoes.php';
    require_once 'core/conexao_mysql.php';
    require_once 'core/sql.php';
    require_once 'core/mysql.php';

    foreach($_GET as $indice => $dado) {
        $$indice = limparDados($dado);
    }

    $data = new \DateTime(date('Y-m-d'));

    $posts = buscar(
        'oferta',
            [
                'titulo',
                'texto',
                'data_oferta',
                'id_oferta',
                'preco_original',
                'desconto',
                'preco_atual',
                'inicio_oferta',
                'termino_oferta',
                'foto_nome_oferta',
                'categoria',
                'endereco',
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
    $dateInterval = new \DateTime(date($post['data_oferta']));
    $dateInterval = $dateInterval -> diff($data);
?>
<html lang="pt_BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style/style.css">
        <link rel="stylesheet" href="style/style-navegador.css">
        <link rel="stylesheet" href="style/style-oferta-detalhe.css">
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
                        <img src='<?php echo"upload/oferta/".$foto; ?>'>
                    <?php endif; ?>
                <?php endforeach ?>
            </div>
            <div class='item-info'>
                <div class="new">
                    <div class="loja">
                        <span><?php echo $post['nome'] ?> | <?php echo $post['marca'] ?></span>
                    </div>
                </div>
                <div class="teste">
                    <div class='item-name'><h4><?php echo $post['titulo']?></h4></div>
                    <div class="item-text"><p><?php echo $post['texto']?></p></div>
                    <div class="endereco">
                        <span>Local: <span id="endereco"><?php echo $post['endereco']?></span></span>
                    </div>
                    <div class='item-price'>
                        <span class='item-oldPrice'>R$ <?php echo $post['preco_original']?>,00</span><br>
                        <div class="newPrice">
                            <span class='item-newPrice'>R$ <?php echo $post['preco_atual']?>,00</span>
                            <span class="desconto"><?php echo $post['desconto']?>% OFF</span>
                        </div>
                    </div>
                </div>
                <div class="tag">
                    <span>Melhores ofertas</span>
                    <span>Novidades</span>
                    <span>Tempo limitado</span>
                </div>
                <div class="categoria">
                    <?php if($post['categoria'] == 'eletronicos') : ?>
                        <span><a href="categoria/eletronicos/"><?php echo $post['categoria']?></a></span>
                    <?php endif; ?>
                    <?php if($post['categoria'] == 'mercado') : ?>
                        <span><a href="categoria/mercado/"><?php echo $post['categoria']?></a></span>
                    <?php endif; ?>
                    <?php if($post['categoria'] == 'modaecasa') : ?>
                        <span><a href="categoria/modaecasa/"><?php echo $post['categoria']?></a></span>
                    <?php endif; ?>
                    <?php if($post['categoria'] == 'petshop') : ?>
                        <span><a href="categoria/petshop/"><?php echo $post['categoria']?></a></span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php include 'includes/footer.php'; ?> 
    </body>

    <script>
        var URL = document.getElementById('endereco').innerHTML;
        
        if (URL.substring(0, 4).toUpperCase() == "WWW.") {
            document.getElementById('endereco').innerHTML = URL.link(URL);
        }
        if (URL.substring(0, 8).toUpperCase() == "HTTPS://") {
            document.getElementById('endereco').innerHTML = URL.link(URL);
        }
        if (URL.substring(0, 7).toUpperCase() == "HTTP://") {
            document.getElementById('endereco').innerHTML = URL.link(URL);
        }
    </script>
</html>