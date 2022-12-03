<?php 
    require_once 'includes/funcoes.php';
    require_once 'core/conexao_mysql.php';
    require_once 'core/sql.php';
    require_once 'core/mysql.php';

    foreach($_GET as $indice => $dado) {
        $$indice = limparDados($dado);
    }

    $data_atual = date('Y-m-d H:i:s');

    $criterio = [
       ['inicio_oferta', '<=', $data_atual]
    ];

    if(!empty($minPrice) && $minPrice >0){
        $criterio[] = [
            'AND', 'preco_atual', '>=', $minPrice
        ];
    }

    if(!empty($maxPrice) && $maxPrice >0){
        $criterio[] = [
            'AND', 'preco_atual', '<=', $maxPrice
        ];
    }

    if(!empty($store)){
        $criterio[] = [
            'AND', 'id_pessoa', '=', $store
        ];
    }

    if(!empty($mark)){
        $criterio[] = [
            'AND', 'marca', '=', $mark
        ];
    }        

    if (!empty($order)) {
        if ($order == "-new"){
            $ordenar = "data_oferta DESC";
        } else if ($order == "+new"){
            $ordenar = "data_oferta ASC";
        } else if ($order == "-price"){
            $ordenar = "preco_atual DESC";
        } else if ($order == "+price"){
            $ordenar = "preco_atual ASC";
        }
    } else {
        $ordenar = "data_oferta DESC";
    }

    if(!empty($busca)) {
        $criterio[] = [
            'AND',
            'titulo',
            'like', 
            "%{$busca}%"
        ];
        $criterio []= [
            'OR',
            'marca',
            'like',
            "%{$busca}%"
        ];
    }

    $ofertas = buscar (
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
        $criterio,
        $ordenar
    );
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/style-navegador.css">
    <link rel="stylesheet" href="style/style-categorias.css">
    <link rel="stylesheet" href="style/style-mq.css">
    <link rel="stylesheet" href="style/search.css">
    <?php include('includes/settings.php'); ?>
    <title>COMECOM | Buscar</title>
</head>

<body>
<?php include('includes/navigator.php'); ?>
<div class="cabecao">
        <h1>Buscar</h1>
    </div>
    <div class="container-anuncios">
        <div class="container-left">
            <?php
                require_once 'includes/funcoes.php';
                require_once 'core/conexao_mysql.php';
                require_once 'core/sql.php';
                require_once 'core/mysql.php';

                foreach($_GET as $indice => $dado) {
                    $$indice = limparDados($dado);
                }

                $data_atual = date('Y-m-d H:i:s');
                $data = new \DateTime(date('Y-m-d H:i:s'));

                $criterio = [['tipo_pessoa', '=', 'juridica']];

                $posts = agrupar(
                    'oferta',
                    [   
                        'marca',
                    ],
                'marca ASC',
                "marca"
                );

                $result = buscar(
                    'pessoa',
                    [   
                        'nome',
                        'id_pessoa',
                    ],
                    $criterio,
                    'nome ASC'
                );

            ?>

            <div>
                <div class="filtros">
                    <nav>
                        <div class="mobile-menu">
                            <h3>
                                <svg style="color: var(--color-purple);" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M3.6 3.6a1.2 1.2 0 0 1 1.2-1.2h14.4a1.2 1.2 0 0 1 1.2 1.2v3.6a1.2 1.2 0 0 1-.352.848L14.4 13.697V18a1.2 1.2 0 0 1-.352.848l-2.4 2.4A1.2 1.2 0 0 1 9.6 20.4v-6.703L3.952 8.048A1.2 1.2 0 0 1 3.6 7.2V3.6Z" clip-rule="evenodd"/>
                                </svg>    
                                Filtrar por:
                            </h3>
                        </div>
                        <ul class="nav-list">
                            <form method="get">
                                <input type="hidden" name="busca" value="<?php echo $busca?>">
                                <div class="teste">
                                    <li>
                                        <div class="filter-price filter">
                                            <h4>Preço</h4>
                                            <label class="containerPrice">R$
                                                <input type="text" maxlength="9" name="minPrice" id="minPrice" class="text" placeholder="Min." value="<?php echo $minPrice ?? "" ?>">
                                            </label>
                                            <label class="containerPrice">R$
                                                <input type="text" maxlength="9" name="maxPrice" id="maxPrice" class="text" placeholder="Max." value="<?php echo $maxPrice ?? "" ?>">
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="filter-store filter">
                                            <h4>Lojas</h4>
                                            <?php
                                                foreach($result as $entidade):
                                            ?>
                                            <label class='container'>
                                                <input type='checkbox' name='store' id='store' class='check' value='<?php echo $entidade['id_pessoa'] ?>'>
                                                <?php echo $entidade['nome'] ?>
                                                <span class='checkmark'></span>
                                            </label>
                                            <?php endforeach; ?>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="filter-brand filter">
                                            <h4>Marcas</h4>
                                            <?php
                                                foreach($posts as $post) :
                                            ?>
                                            <label class='container'>
                                                <input type='checkbox' name='mark' id='mark' class='check' value='<?php echo $post['marca'] ?>'>
                                                <?php echo $post['marca'] ?>
                                                <span class='checkmark'></span>
                                            </label>
                                            <?php endforeach; ?>
                                        </div>
                                    </li>
                                    <input type="submit" name="sendPrice" id="sendPrice" value="Enviar">
                                </div>
                            <!-- </form> -->
                        </ul>
                    </nav>
                </div>
            </div>
            <script src="scripts/mobile-navbar-filters.js"></script>
        </div>
        <div class="container-right">
            <div class="ordenador">
                <nav class="teste">
                    <div class="mobile-menu-teste">
                        <h3>
                            <svg style="color: var(--color-purple);" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                                <path d="m17 20-4-4m-6 0V4v12ZM7 4 3 8l4-4Zm0 0 4 4-4-4Zm10 4v12V8Zm0 12 4-4-4 4Z"/>
                            </svg>
                            Ordenar por:
                        </h3>
                    </div>
                    <ul class="nav-list-teste">
                        <form method="post">
                            <div class="ordenador2">
                                <li>
                                    <div class="filter-order filter">
                                        <label class="container2">
                                            Ordenar:
                                            <select class="select" name="order" id="order">
                                                <option value="-new">Recentes</option>
                                                <option value="+new">Antigos</option>
                                                <option value="+price">Preço Crescente</option>
                                                <option value="-price">Preço Decrescente</option>
                                            </select>
                                        </label>
                                    </div>
                                </li>
                                <div class="filter-button filter">
                                    <input type="submit" name="sendPrice" id="sendPrice" value="Enviar">
                                </div>
                            </div>
                        </form>
                    </ul>
                </nav>
        </div>
        <div class="main">
        <?php
            foreach($ofertas as $oferta) :                  
                $fotos = explode(';',$oferta['foto_nome_oferta']);  
                $fotos = explode(';',$oferta['foto_nome_oferta']);
                $fotos = explode(';',$oferta['foto_nome_oferta']);
                $dateInterval = new \DateTime(date($oferta['termino_oferta']));
                $dateInterval = $dateInterval -> diff($data);                             
        ?>
            <div class="item">
                <a href='<?php echo "oferta_detalhe.php?id_oferta=".$oferta['id_oferta']?>'>
                    <div class="img">
                        <?php foreach($fotos as $foto) : ?>
                            <?php if ($foto != '') : ?>
                                <img src='<?php echo"upload/oferta/".$foto; ?>' style="height: 250px;">
                            <?php endif; ?>
                        <?php endforeach ?>
                    </div>
                    <div class='item-info'>
                        <div class='item-name'><h4><?php echo $oferta['titulo']?></h4></div>
                        <div class='item-price'>
                            <span class='item-oldPrice' id="oldPrice<?php echo $oferta['id_oferta']?>"><?php echo $oferta['preco_original']?></span>
                            <span class='item-newPrice' id="newPrice<?php echo $oferta['id_oferta']?>"><?php echo $oferta['preco_atual']?></span>
                        </div>
                    </div>
                </a>
                <div class='item-expire'>
                    <span><?php echo $dateInterval->d."d ".$dateInterval->h."h ".$dateInterval->i."min"?></span>
                </div>
            </div>
            <script>
                var precoAntigo = Number(document.getElementById('oldPrice<?php echo $oferta['id_oferta']?>').innerHTML);
                document.getElementById('oldPrice<?php echo $oferta['id_oferta']?>').innerHTML = parseFloat(precoAntigo.toFixed(2)).toLocaleString('pt-BR', {
                    currency: 'BRL',
                    style: 'currency',
                    minimumFractionDigits: 2
                });

                var precoNovo = Number(document.getElementById('newPrice<?php echo $oferta['id_oferta']?>').innerHTML);
                document.getElementById('newPrice<?php echo $oferta['id_oferta']?>').innerHTML = parseFloat(precoNovo.toFixed(2)).toLocaleString('pt-BR', {
                    currency: 'BRL',
                    style: 'currency',
                    minimumFractionDigits: 2
                });
            </script>
        <?php endforeach; ?>
        </div>
    </div>
</div>
    
<?php include('includes/footer.php'); ?>
</body>
</html>