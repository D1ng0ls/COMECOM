<!-- começo -->
<!DOCTYPE html>
<html lang="pt_BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style/style-post-formulario.css">
        <title>Teste</title>
    </head>
    <body>
        <div>
            <div>
                <div>
                    <?php
                        session_start();
                        include 'includes/valida_login.php';
                    ?>
                </div>
            </div>
            <div>
                <div>
                    <?php
                        require_once 'includes/funcoes.php';
                        require_once 'core/conexao_mysql.php';
                        require_once 'core/sql.php';
                        require_once 'core/mysql.php';

                        foreach($_GET as $indice => $dado) {
                            $$indice = limparDados($dado);
                        }

                        if(!empty($id)) {
                            $id = (int)$id;

                            $criterio = [
                                ['id_publicacao', '=', $id]
                            ];

                            $retorno = buscar(
                                'publicacacao',
                                ['*'],
                                $criterio
                            );

                            $entidade = $retorno[0];
                        }
                    ?>
                    <form method="post" action="core/post_repositorio.php">
                        <input  type="hidden" name="acao"
                                value="<?php echo empty($id) ? 'insert' : 'update' ?>">
                        <input  type="hidden" name="id_publicacao"
                                value="<?php echo $entidade['id_publicacao'] ?? '' ?>">
                        <div class="container1">
                            <div class="post-post"><h2>Post</h2></div>
                            <div class="post-titulo">
                                <input  type="text"
                                        require="required" id="titulo" name="titulo" placeholder="Título"
                                        value="<?php echo $entidade['titulo'] ?? ''?>">
                            </div>
                            <div class="post-textarea">
<textarea type="text"
require="required" id="texto" name="texto" rows="5" placeholder="Texto (opcional)">
<?php echo $entidade['texto'] ?? ''?>
</textarea>
                            </div>
                            <div class="post-desconto">
                                <input  type="number" placeholder="Valor do desconto - Ex: 00" require="required" 
                                        id="desconto" name="desconto"
                                        value="<?php echo $entidade['desconto'] ?? ''?>">
                            </div>
                            <div class="post-termino-promocao">
                                <label for="termino_promocao">Término da promoção</label><br>
                                <input  type="date" require="required" 
                                        id="termino_promocao" name="termino_promocao"
                                        value="<?php echo $entidade['termino_promocao'] ?? ''?>">
                            </div>
                        </div>
                        <div class="post-button">
                            <button type="submit">Postar</button>
                        </div>
                        <!-- <div class="">
                            <input  type="file" 
                                    id="foto" 
                                    name="foto" 
                                    accept="image/*"
                                    value="<?php echo $entidade['foto_blob_publi'] ?? ''?>" />
                        </div>  -->
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>