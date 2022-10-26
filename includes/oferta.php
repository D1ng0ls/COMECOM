<div>
    <?php
        foreach($_GET as $indice => $dado) {
            $$indice = limparDados($dado);
        }

        $data_atual = date('Y-m-d H:i:s');

        $criterio = [
            ['data_publicacao', '<=', $data_atual]
        ];

        if(!empty($busca)) {
            $criterio[] = [
                'AND',
                'titulo',
                'like', 
                "%{$busca}%"
            ];
        }

        $posts = buscar (
            'publicacao',
            [
                'titulo',
                'data_publicacao',
                'id_publicacao',
                'preco_original',
                'desconto',
                'preco_atual',
                'inicio_promocao',
                'termino_promocao',
                'foto_nome_publi',
                '(select nome
                    from pessoa
                    where id_pessoa = publicacao.id_pessoa) as nome'
            ],
            $criterio,
            'data_publicacao DESC'
        );
    ?>
    <div class="main">
        <?php
            foreach($posts as $post) :
                $data = date_create($post['data_publicacao']);
                $data = date_format($data, 'd/m/Y');
                $hora = date_create($post['data_publicacao']);
                $hora = date_format($hora, 'H:i');                            
                $fotos = explode(';',$post['foto_nome_publi']);                                 
        ?>
        <div class="item">
            <a href='../oferta_detalhe.php'>
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
                    <div class='item-price'>
                        <span class='item-oldPrice'>R$ <?php echo $post['preco_original']?></span>
                        <span class='item-newPrice'>R$ <?php echo $post['preco_atual']?></span>
                    </div>
                </div>
            </a>
            <div class='item-expire'>
                <span>fazervnkfss</span>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>        