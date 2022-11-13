<!DOCTYPE html>
<html lang="pt_BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../style/style.css">
        <link rel="stylesheet" href="../style/style-navegador.css">
        <link rel="stylesheet" href="../style/style-oferta-formulario.css">
        <link rel="stylesheet" href="../style/style-mq.css">
        <title>COMECOM | Oferta formulário</title>
        <?php include('settings.php'); ?>
    </head>
    <body>
        <?php include('../includes/navigator.php'); ?>
        <div class="content-oferta">
            <?php
                if(!isset($_SESSION['login']) || $_SESSION['login']['pessoa']['tipo_pessoa'] == 'fisica'){
                    header("Location: ../login.php");
                    exit();
                }
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
                        ['id_oferta', '=', $id]
                    ];

                    $retorno = buscar(
                        'oferta',
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
                    <input  type="hidden" name="id_oferta"
                            value="<?php echo $entidade['id_oferta'] ?? '' ?>">
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
                            <input  type="text" required
                                    id="titulo" name="titulo" placeholder="Nome do produto"
                                    value="<?php echo $entidade['titulo'] ?? ''?>">
                        </div>
                        <div class="oft-textarea">
<textarea type="text" id="texto" name="texto" rows="3" placeholder="Descrição" style="resize: none" required>
<?php echo $entidade['texto'] ?? ''?>
</textarea>
                        </div>
                        <div class="oft-marca">
                            <input  type="text" required
                                    id="marca" name="marca" placeholder="Marca"
                                    value="<?php echo $entidade['marca'] ?? ''?>">
                        </div>
                        <div class="oft-prec-orig">
                            <input  type="number" placeholder="Preço original em R$"
                                    id="prec-orig" name="preco_original" required
                                    value="<?php echo $entidade['preco_original'] ?? ''?>" oninput="calcular()">
                        </div>
                        <div class="oft-desconto">
                            <input  type="number" placeholder="Desconto em %" required
                                    require="required" id="desconto" name="desconto" min = "1" max="99"
                                    value="<?php echo $entidade['desconto'] ?? ''?>" oninput="calcular()">
                        </div>
                        <div class="oft-prec-atual">
                            <input  type="number" placeholder="Preço atual em R$" required
                                    require="required" id="prec-atual" name="preco_atual"
                                    value="<?php echo $entidade['preco_atual'] ?? ''?>" disabled>
                        </div>
                        <label for="categoria">Categoria</label>
                        <div class="oft-categoria">
                            <select id="categoria" name="categoria"
                                    require="required">
                                <option value="eletronicos"><p>Eletrônicos</p></option>
                                <option value="mercado"><p>Mercado</p></option>
                                <option value="modaecasa"><p>Moda & Casa</p></option>
                                <option value="petshop"><p>Petshop</p></option>
                            </select>
                        </div>
                        <label for="data-publi">Início da promoção</label><br>
                        <div class="oft-data">
                            <input  type="date" required
                                    require="required" id="data" name="inicio_oferta"
                                    value="<?php echo $entidade['inicio_oferta'] ?? ''?>">
                        </div>
                        <label for="data-publi">Término da promoção</label><br>
                        <div class="oft-data">
                            <input  type="date" required
                                    require="required" id="data" name="termino_oferta"
                                    value="<?php echo $entidade['termino_oferta'] ?? ''?>">
                        </div>
                        <div class="oft-choose-container">
                            <input  type="file" 
                                    id="foto" 
                                    name="foto[]" 
                                    accept="image/*" 
                                    required>
                        </div>  
                    </div>
                    <div class="oft-button">
                        <button type="submit">Postar</button>
                    </div>
                </form>
            </div>
        </div>
        <?php include('../includes/footer.php'); ?>
        <script>
            function calcular() {
                var preco = document.getElementById('prec-orig');
                var desconto = document.getElementById('desconto');
                var novoPreco = document.getElementById('prec-atual');

                if(desconto.value<=0){
                    desconto.value = 1;
                } else if(desconto.value>=100) {
                    desconto.value = 99;
                }

                novoPreco.value = (((100 - desconto.value) * preco.value)/100).toFixed(2).toLocaleString('pt-BR');
            }
        </script>
    </body>
</html>