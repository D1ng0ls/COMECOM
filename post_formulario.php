<!-- começo -->
<!DOCTYPE html>
<html lang="pt_BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Teste</title>
    </head>
    <body>
        <div>
            <div>
                <div>
                    <?php
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
                    <h2>Post</h2>
                    <form method="post" action="core/post_repositorio.php">
                        <input  type="hidden" name="acao"
                                value="<?php echo empty($id) ? 'insert' : 'update' ?>">
                        <input  type="hidden" name="id_publicacao"
                                value="<?php echo $entidade['id_publicacao'] ?? '' ?>">
                        <div>
                            <label  for="titulo">Título</label>
                            <input  type="text"
                                    require="required" id="titulo" name="titulo"
                                    value="<?php echo $entidade['titulo'] ?? ''?>">
                        </div>
                        <div>
                            <label for="texto">Texto</label>
                            <textarea   type="text"
                                        require="required" id="texto" name="texto" rows="5">
                                <?php echo $entidade['texto'] ?? ''?>
                            </textarea>
                        </div>
                        <div>
                            <label for="texto">Postar em</label>
                            <?php
                                $data = (!empty($entidade['data_publicacao']))?
                                    explode(' ', $entidade['data_publicacao'])[0] : '';
                                $hora = (!empty($entidade['data_publicacao']))?
                                    explode(' ', $entidade['data_publicacao'])[1] : '';

                            ?>
                            <div>
                                <div>
                                    <input  type="date"
                                            require="required"
                                            id="data_publicacao"
                                            name="data_publicacao"
                                            value="<?php echo $data ?>">
                                </div>
                                <div>
                                    <input  type="time"
                                            require="required"
                                            id="hora_postagem"
                                            name="hora_postagem"
                                            value="<?php echo $hora ?>">
                                </div>
                            </div>
                        </div>
                        <div>
                            <button type="submit">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>