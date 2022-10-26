<!DOCTYPE html>
<html lang="pt_BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../style/style.css">
        <link rel="stylesheet" href="../style/style-navegador.css">
        <link rel="stylesheet" href="../style/oferta_formulario.css">
        <title>COMECOM | Oferta formulário</title>
        <?php include('settings.php'); ?>
    </head>
    <body>
        <?php include('../includes/navigator.php'); ?>
        <div class="content-oferta">
        <?php
            include '../includes/valida_login.php';
            require_once '../includes/funcoes.php';
            require_once '../core/conexao_mysql.php';
            require_once '../core/sql.php';
            require_once '../core/mysql.php';

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
            <div class="container-formulario">
                <form method="post" action="../core/oferta_repositorio.php" enctype="multipart/form-data">
                    <input  type="hidden" name="acao"
                            value="<?php echo empty($id) ? 'insert' : 'update' ?>">
                    <input  type="hidden" name="id_publicacao"
                            value="<?php echo $entidade['id_publicacao'] ?? '' ?>">
                    <div class="container1-oft">
                        <div class="oft-titulo">
                            <input  type="text"
                                    require="required" id="titulo" name="titulo" placeholder="Título"
                                    value="<?php echo $entidade['titulo'] ?? ''?>">
                        </div>
                        <div class="oft-textarea">
<textarea type="text" require="required" id="texto" name="texto" rows="3" placeholder="Descrição" style="resize: none">
<?php echo $entidade['texto'] ?? ''?>
</textarea>
                        </div>
                        <div class="oft-prec-orig">
                            <label for="desconto">Preço original</label>
                            <input  type="number"
                                    require="required" id="desconto" name="desconto"
                                    value="<?php echo $entidade['desconto'] ?? ''?>">
                        </div>
                        <div class="oft-desconto">
                            <label for="desconto">Desconto</label>
                            <input  type="number"
                                    require="required" id="desconto" name="desconto"
                                    value="<?php echo $entidade['desconto'] ?? ''?>">
                        </div>
                        <div class="oft-prec-atual">
                            <label for="desconto">Preço atual</label>
                            <input  type="number"
                                    require="required" id="desconto" name="desconto"
                                    value="<?php echo $entidade['desconto'] ?? ''?>">
                        </div>
                        <div class="oft-data">
                            <label for="msg_data">Início publicação</label>
                            <input  type="date"
                                    require="required" id="data" name="data"
                                    value="<?php echo $entidade['inicio_promocao'] ?? ''?>">
                        </div>
                        <div class="oft-data">
                            <label for="msg_data">Término publicação</label>
                            <input  type="date"
                                    require="required" id="data" name="data"
                                    value="<?php echo $entidade['termino_promocao'] ?? ''?>">
                        </div>
                        <div class="oft-choose-container">
                            <input  type="file" 
                                    id="foto" 
                                    name="foto[]" 
                                    accept="image/*" 
                                    multiple="multiple"
                                    />
                        </div>  
                    </div>
                    <div class="oft-button">
                        <button type="submit">Postar</button>
                    </div>
                </form>
            </div>
        </div>
        <?php include('../includes/footer.php'); ?>
    </body>
</html>