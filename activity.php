<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/style-navegador.css">
    <link rel="stylesheet" href="style/style-busca.css">
    <link rel="stylesheet" href="style/style-mq.css">
    <link rel="stylesheet" href="style/style-activity.css">
    <title>COMECOM | Atividade</title>
    <?php include('includes/settings.php'); ?>
</head>

<?php
    if(!isset($_SESSION['login'])){
        header("Location: login.php");
        exit();
    }
?>

<?php
    require_once 'includes/funcoes.php';
    require_once 'core/conexao_mysql.php';
    require_once 'core/sql.php';
    require_once 'core/mysql.php';

    foreach($_GET as $indice => $dado) {
        $$indice = limparDados($dado);
    }

    $criterio = [
        ['id_pessoa', '=', $_SESSION['login']['pessoa']['id_pessoa']]
    ];

    if(!empty($busca)) {
        $criterio[] = [
            'AND',
            'titulo',
            'like', 
            "%{$busca}%"
        ];
    }

    if($_SESSION['login']['pessoa']['tipo_pessoa'] == 'fisica') {
        $posts = buscar (
            'publicacao',
            [
                'titulo',
                'data_publicacao',
                'id_publicacao',
                'foto_nome_publi',
                'texto',
                '(select nome
                    from pessoa
                    where id_pessoa = publicacao.id_pessoa) as nome',
                '(select foto_nome_pessoa
                    from pessoa
                    where id_pessoa = publicacao.id_pessoa) as foto_nome_pessoa'
            ],
            $criterio,
            'data_publicacao DESC'
        );
    } else if($_SESSION['login']['pessoa']['tipo_pessoa'] == 'juridica') {
        $posts = buscar (
            'oferta',
            [
                'titulo',
                'data_oferta',
                'id_oferta',
                'foto_nome_oferta',
                'texto',
                '(select nome
                    from pessoa
                    where id_pessoa = oferta.id_pessoa) as nome',
                '(select foto_nome_pessoa
                    from pessoa
                    where id_pessoa = oferta.id_pessoa) as foto_nome_pessoa'
            ],
            $criterio,
            'data_oferta DESC'
        );
    }
?>

<body>
    <?php include('includes/navigator.php'); ?>

    <?php include('includes/busca.php'); ?>

    <?php if($_SESSION['login']['pessoa']['tipo_pessoa'] == 'fisica') : ?>
    <?php
        foreach($posts as $post) :
            $data = date_create($post['data_publicacao']);
            $data = date_format($data, 'd/m/Y');
            $hora = date_create($post['data_publicacao']);
            $hora = date_format($hora, 'H:i');
            $fotos = explode(';',$post['foto_nome_publi']);
    ?>
    <hr id="divider">
    <div class="container-post">
        <div class="img-post">
            <?php foreach($fotos as $foto) : ?>
                <?php if ($foto != '') : ?>
                    <img src='<?php echo"upload/post/".$foto; ?>'>
                <?php endif; ?>
            <?php endforeach ?>
        </div>
        <div class="text-post">
            <div class="title-post">
                <?php echo $post['titulo']?>
            </div>
            <div class="link-post">
                <a href="comunidade/#post<?php echo $post['id_publicacao']?>">ir à postagem</a>
            </div>
            <div class="desc-post">
                <?php echo $post['texto']?>
            </div>
            <div class="date-post">
                <?php echo $data . ' às ' . $hora?>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
    <hr id="divider">
    <?php else : ?>
        <?php
        foreach($posts as $post) :
            $data = date_create($post['data_oferta']);
            $data = date_format($data, 'd/m/Y');
            $hora = date_create($post['data_oferta']);
            $hora = date_format($hora, 'H:i');                            
            $fotos = explode(';',$post['foto_nome_oferta']);                                 
    ?>
    <hr id="divider">
    <div class="container-post">
        <div class="img-post">
            <?php foreach($fotos as $foto) : ?>
                <?php if ($foto != '') : ?>
                    <img src='<?php echo"upload/oferta/".$foto; ?>'>
                <?php endif; ?>
            <?php endforeach ?>
        </div>
        <div class="text-post">
            <div class="title-post">
                <?php echo $post['titulo']?>
            </div>
            <div class="link-post">
                <a href="oferta_detalhe.php?id_oferta=<?php echo $post['id_oferta']?>">ir à publicação</a>
            </div>
            <div class="desc-post">
                <?php echo $post['texto']?>
            </div>
            <div class="date-post">
                <?php echo $data . ' às ' . $hora?>
            </div>
        </div>
    </div>

    <?php endforeach; ?>
    <hr id="divider">
    <?php endif; ?>
    <?php include('includes/footer.php'); ?>
</body>

</html>