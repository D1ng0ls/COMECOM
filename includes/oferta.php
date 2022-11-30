<div class="teste">
    <?php
        $order = null;
    
        foreach($_GET as $indice => $dado) {
            $$indice = limparDados($dado);
        }

        foreach($_POST as $indice => $dado) {
            $$indice = limparDados($dado);
        }

        $data_atual = date('Y-m-d H:i:s');
        $data = new \DateTime(date('Y-m-d H:i:s'));

        $criterio = [
            ['inicio_oferta', '<=', $data_atual]
        ];

        $criterio[] = [
            'AND', 'termino_oferta', '>=', $data_atual
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

        // $i=0;

        // for($ctd=1;$ctd<=20;$ctd++){
        //     $store = 'store'.$ctd;
        //     if(!empty($$store)){
        //         if($i == 0) {
        //             $criterio[] = [
        //                 'AND', 'id_pessoa', '=', $store
        //             ];
        //             $i=1;
        //         } else {
        //             $criterio[] = [
        //                 'OR', 'id_pessoa', '=', $store
        //             ];
        //         }
        //     }
        // }

        if(!empty($mark)){
            $criterio[] = [
                'AND', 'marca', '=', $mark
            ];
        }        

        if(!empty($busca)) {
            $criterio[] = [
                'AND',
                'titulo',
                'like', 
                "%{$busca}%"
            ];
        }

        if (!empty($order) && $order == "-new"){
            $ordenar = "data_oferta DESC";
        } else if ($order == "+new"){
            $ordenar = "data_oferta ASC";
        } else if ($order == "-price"){
            $ordenar = "preco_atual DESC";
        } else if ($order == "+price"){
            $ordenar = "preco_atual ASC";
        } else {
            $ordenar = "data_oferta DESC";
        }

        $registros_pagina = 20;

        if(!empty($view)) {
            $registros_pagina = $view;
        }
        
        $pagina_atual = 1;
        if(isset($pagina)){
            $pagina_atual = $pagina;
        }
        
        $inicio_registro = ($pagina_atual-1) * $registros_pagina;
        $ofertas = contar('oferta');
            
        $posts = buscar (
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
            $ordenar,
            $inicio_registro,
            $registros_pagina
        );
    ?>
    <div class="main">
        <?php
            foreach($posts as $post) :                  
                $fotos = explode(';',$post['foto_nome_oferta']);  
                $fotos = explode(';',$post['foto_nome_oferta']);
                            $fotos = explode(';',$post['foto_nome_oferta']);
                            $dateInterval = new \DateTime(date($post['termino_oferta']));
                            $dateInterval = $dateInterval -> diff($data);                             
        ?>
        <?php url($url, $elt, $mrc, $mec, $pet); ?>
        <?php if($url == $elt) : ?>
            <?php if($post['categoria'] == 'eletronicos') : ?>
                <div class="item">
                    <a href='<?php echo "../../oferta_detalhe.php?id_oferta=".$post['id_oferta']?>'>
                        <div class="img">
                            <?php foreach($fotos as $foto) : ?>
                                <?php if ($foto != '') : ?>
                                    <img src='<?php echo"../../upload/oferta/".$foto; ?>' style="width: 100%; height: 200px;">
                                <?php endif; ?>
                            <?php endforeach ?>
                        </div>
                        <div class='item-info'>
                            <div class='item-name'><h4><?php echo $post['titulo']?></h4></div>
                            <!-- <?php if($post['categoria'] == 'mercado') { echo 'bruh'; } ?></div> -->
                            <div class='item-price'>
                                <span class='item-oldPrice'>R$ <?php echo $post['preco_original']?></span>
                                <span class='item-newPrice'>R$ <?php echo $post['preco_atual']?></span>
                            </div>
                        </div>
                    </a>
                    <div class='item-expire'>
                        <span><!--<?php echo $dateInterval->d."d ".$dateInterval->h."h ".$dateInterval->i."min"?>-->59d 59h 59min</span>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
        <!-- Mercado -->
        <?php if($url == $mrc) : ?>
            <?php if($post['categoria'] == 'mercado') : ?>
                <div class="item">
                    <a href='<?php echo "../../oferta_detalhe.php?id_oferta=".$post['id_oferta']?>'>
                        <div class="img">
                            <?php foreach($fotos as $foto) : ?>
                                <?php if ($foto != '') : ?>
                                    <img src='<?php echo"../../upload/oferta/".$foto; ?>' style="width: 100%; height: 200px;">
                                <?php else : ?>
                                    <img src='../../media/oferta5.jpg' style="width: 100%; height: 200px;">
                                <?php endif; ?>
                            <?php endforeach ?>
                        </div>
                        <div class='item-info'>
                            <div class='item-name'><h4><?php echo $post['titulo']?></h4></div>
                            <!-- <?php if($post['categoria'] == 'mercado') { echo 'bruh'; } ?></div> -->
                            <div class='item-price'>
                                <span class='item-oldPrice'>R$ <?php echo $post['preco_original']?></span>
                                <span class='item-newPrice'>R$ <?php echo $post['preco_atual']?></span>
                            </div>
                        </div>
                    </a>
                    <div class='item-expire'>
                        <span><?php echo $dateInterval->d."d ".$dateInterval->h."h ".$dateInterval->i."min"?></span>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
        <!-- Moda & Casa -->
        <?php if($url == $mec) : ?>
            <?php if($post['categoria'] == 'modaecasa') : ?>
                <div class="item">
                    <a href='<?php echo "../../oferta_detalhe.php?id_oferta=".$post['id_oferta']?>'>
                        <div class="img">
                            <?php foreach($fotos as $foto) : ?>
                                <?php if ($foto != '') : ?>
                                    <img src='<?php echo"../../upload/oferta/".$foto; ?>' style="width: 100%; height: 200px;">
                                <?php else : ?>
                                    <img src='../../media/oferta5.jpg' style="width: 100%; height: 200px;">
                                <?php endif; ?>
                            <?php endforeach ?>
                        </div>
                        <div class='item-info'>
                            <div class='item-name'><h4><?php echo $post['titulo']?></h4></div>
                            <!-- <?php if($post['categoria'] == 'modaecasa') { echo 'bruh'; } ?></div> -->
                            <div class='item-price'>
                                <span class='item-oldPrice'>R$ <?php echo $post['preco_original']?></span>
                                <span class='item-newPrice'>R$ <?php echo $post['preco_atual']?></span>
                            </div>
                        </div>
                    </a>
                    <div class='item-expire'>
                        <span><?php echo $dateInterval->d."d ".$dateInterval->h."h ".$dateInterval->i."min"?></span>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
        <!-- Petshop -->
        <?php if($url == $pet) : ?>
            <?php if($post['categoria'] == 'petshop') : ?>
                <div class="item">
                    <a href='<?php echo "../../oferta_detalhe.php?id_oferta=".$post['id_oferta']?>'>
                        <div class="img">
                            <?php foreach($fotos as $foto) : ?>
                                <?php if ($foto != '') : ?>
                                    <img src='<?php echo"../../upload/oferta/".$foto; ?>' style="width: 100%; height: 200px;">
                                <?php else : ?>
                                    <img src='../../media/oferta5.jpg' style="width: 100%; height: 200px;">
                                <?php endif; ?>
                            <?php endforeach ?>
                        </div>
                        <div class='item-info'>
                            <div class='item-name'><h4><?php echo $post['titulo']?></h4></div>
                            <!-- <?php if($post['categoria'] == 'petshop') { echo 'bruh'; } ?></div> -->
                            <div><h5 style="text-transform: uppercase;"><?php echo $post['nome']?></h5></div><!-- nome de quem postou  -->
                            <div><h5 style="text-transform: uppercase;"><?php echo $post['marca']?></h5></div>
                            <div><h5 style="text-transform: uppercase;"><?php echo $post['categoria']?></h5></div>
                            <div class='item-price'>
                                <span class='item-oldPrice'>R$ <?php echo $post['preco_original']?></span>
                                <span class='item-newPrice'>R$ <?php echo $post['preco_atual']?></span>
                            </div>
                        </div>
                    </a>
                    <div class='item-expire'>
                        <span><?php echo $dateInterval->d."d ".$dateInterval->h."h ".$dateInterval->i."min"?></span>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>