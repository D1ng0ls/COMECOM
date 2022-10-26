<!DOCTYPE html>
<html lang="pt_BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../style/style.css">
        <link rel="stylesheet" href="../style/style-navegador.css">
        <link rel="stylesheet" href="../style/style-oferta-formulario.css">
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
                    <div class="title-page">
                        <div class="container-title-page-1">
                            Ofertas
                        </div>
                        <div class="container-title-page-2">
                            Formulário de cadastramento de produtos
                        </div>
                    </div>        
                    <div class="container1-oft">
                        <div class="oft-titulo">
                            <input  type="text"
                                    require="required" id="titulo" name="titulo" placeholder="Nome do produto"
                                    value="<?php echo $entidade['titulo'] ?? ''?>">
                        </div>
                        <div class="oft-textarea">
<textarea type="text" require="required" id="texto" name="texto" rows="3" placeholder="Descrição" style="resize: none">
<?php echo $entidade['texto'] ?? ''?>
</textarea>
                        </div>
                        <div class="oft-prec-orig">
                            <input  type="number" placeholder="Preço original em R$"
                                    require="required" id="prec-orig" name="preco_original"
                                    value="<?php echo $entidade['preco_original'] ?? ''?>">
                        </div>
                        <div class="oft-desconto">
                            <input  type="number" placeholder="Desconto em R$"
                                    require="required" id="desconto" name="desconto"
                                    value="<?php echo $entidade['desconto'] ?? ''?>">
                        </div>
                        <div class="oft-prec-atual">
                            <input  type="number" placeholder="Preço atual em R$"
                                    require="required" id="prec-atual" name="preco_atual"
                                    value="<?php echo $entidade['preco_atual'] ?? ''?>">
                        </div>
                        <label for="data-publi">Início da promoção</label><br>
                        <div class="oft-data">
                            <input  type="date"
                                    require="required" id="data" name="inicio_promocao"
                                    value="<?php echo $entidade['inicio_promocao'] ?? ''?>">
                        </div>
                        <label for="data-publi">Término da promoção</label><br>
                        <div class="oft-data">
                            <input  type="date"
                                    require="required" id="data" name="termino_promocao"
                                    value="<?php echo $entidade['termino_promocao'] ?? ''?>">
                        </div> 
                        <div class="oft-choose-container">
                            <input  type="file" 
                                    id="foto" 
                                    name="foto[]" 
                                    accept="image/*" 
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