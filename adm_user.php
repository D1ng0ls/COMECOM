<!DOCTYPE html>
<?php
    require_once 'includes/funcoes.php';
    require_once 'core/conexao_mysql.php';
    require_once 'core/sql.php';
    require_once 'core/mysql.php';

    include('includes/settings.php');
    if(!isset($_SESSION['login'])){
        header("Location: login.php");
        exit();
    }
    if($_SESSION['login']['pessoa']['adm'] !== 1) {
        header('Location: /COMECOM/');
        exit();
    }
    if($url == $user) {
        header('Location: usuarios.php');
        exit();
    }

    foreach($_GET as $indice => $dado) {
        $$indice = limparDados($dado);
    }

    $criterio = [
        ['id_pessoa', '=', $id_pessoa]
    ];

    $tipos = buscar(
        'pessoa',
        [
            'tipo_pessoa',
        ],
        $criterio,
    );

    foreach($tipos as $tipo) {
        if($tipo['tipo_pessoa'] == 'fisica') {
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
        } else if($tipo['tipo_pessoa'] == 'juridica') {
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
    }

    $pessoas = buscar (
        'pessoa',
        [
            'data_criacao',
            'foto_nome_pessoa'
        ],
        $criterio,
        'data_criacao DESC'
    );

    $usuarios = buscar(
        'pessoa',
        [   
            'id_pessoa',
            'ativo',
            'nome',
            'email',
            'documento',
            'telefone',
            'data_criacao',
            'foto_nome_pessoa',
            'qnt_lojas',
            'tipo_pessoa',
            'cidade',
        ],
        $criterio,
        'data_criacao DESC'
    );

    foreach($pessoas as $pessoa) :
        $data = date_create($pessoa['data_criacao']);
        $data = date_format($data, 'd/m/Y');
    endforeach;
?>
<html lang="pt_BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style/style-usuarios.css">
        <link rel="stylesheet" href="style/style.css">
        <link rel="stylesheet" href="style/style-navegador.css">
        <link rel="stylesheet" href="style/style-busca.css">
        <link rel="stylesheet" href="style/style-usuario.css">
        <link rel="stylesheet" href="style/style-mq.css">
        <title>COMECOM | USUÁRIO</title>
    </head>

    <body>
        <?php
            include 'includes/navigator.php';
            include 'includes/valida_login.php';
        ?>
        <?php foreach($usuarios as $user) : ?>
        <div class="info-user2">
            <div class="title-page">
                <h1 id="info">Informações do Usuário</h1>
                <p>Verifique os dados de um usuário</p>
            </div>
            
            <div class="input-user foto-user input-left">
                    <div class="foto">
                        <label>Foto:</label>
                        <label for="foto">
                            <?php if (!isset($user['foto_nome_pessoa'])) : ?>
                                <img class="user-img" src="<?php echo url($url, $com, $home) ?>media/icons/solid/user.svg" alt="login">
                            <?php else : ?>
                                <img id="preview" src='upload/user/<?php echo $user['foto_nome_pessoa']; ?>' style="width: 24%; height: 130px; border-radius: 50%;">
                            <?php endif; ?>
                        </label>
                    </div>
                </div>
                <div class="input-user nome-user">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" id="nome" value="<?php echo $user['nome'] ?>" readonly="readonly">
                </div>
                <div class="input-user doc-user2">
                    <label for="documento">Documento:</label>
                    <input type="text" name="documento" id="documento" value="<?php echo $user['documento'] ?>" onclick="view()" readonly="readonly">
                </div>
                <div class="input-user email-user input-left medium">
                    <label for="email">Email:</label>
                    <input type="text" name="email" id="email" value="<?php echo $user['email'] ?>" readonly="readonly">
                </div>
                <div class="input-user phone-user input-right medium">
                    <label for="telefone">Telefone:</label>
                    <input type="text" name="telefone" id="telefone" value="<?php echo $user['telefone'] ?>" readonly="readonly">
                </div>
                <div class="input-user cidade-user medium input-left">
                    <label for="cidade">Cidade:</label>
                    <input type="text" name="cidade" id="cidade" value="<?php echo $user['cidade'] ?>" readonly="readonly">
                </div>
                <?php if($user['tipo_pessoa'] == 'juridica') : ?>
                <div class="input-user qnt-lojas medium input-right">
                    <label for="qnt_lojas">Quantidade de lojas:</label>
                    <input type="number" name="qnt_lojas" id="qnt_lojas" value="<?php echo $user['qnt_lojas'] ?>" readonly="readonly">
                </div>
                <?php endif; ?>
                <div class="input-user data-user <?php if($user['tipo_pessoa'] == 'juridica'){echo "input-left";} else { echo "medium input-right";} ?>">
                    <label for="data">Ativo desde:</label>
                    <input type="text" name="data" id="data" value="<?php echo $data?>" readonly="readonly">
                </div>
                <div class="input-user excluir-user medium">
                    <input type="submit" value="Excluir Conta">
                </div>
                <div class="input-user desativar-user input-right medium">
                    <input type="submit" value="<?php echo ($user['ativo']==1) ? 'Desativar' : 'Ativar'; ?> Conta">
                </div>
            </div>
        </div>
        <div class="post-user">
            <div class="title-page">
                <h1 id="info">Atividade do Usuário</h1>
                <p>Verifique as publicações feitas pelo usuário</p>
            </div>
            
            <?php if($user['tipo_pessoa'] == 'fisica') : ?>
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
            <div class="delete-post ">
                <a href="core/post_repositorio.php?acao=delete&id_publicacao=<?php echo $post['id_publicacao']?>&id_pessoa=<?php echo $user['id_pessoa']?>"><input type="submit" value="Excluir Postagem"></a>
            </div>
            <?php endforeach; else: ?>
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
            <div class="delete-post ">
                <a href="core/oferta_repositorio.php?acao=delete&id_oferta=<?php echo $post['id_oferta']?>&id_pessoa=<?php echo $user['id_pessoa']?>"><input type="submit" value="Excluir Postagem"></a>
            </div>
            <?php endforeach; ?>
            <hr id="divider">
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
        <?php
            include 'includes/footer.php';
        ?>
    </body>
</html>