<?php
require_once 'includes/funcoes.php';
require_once 'core/conexao_mysql.php';
require_once 'core/sql.php';
require_once 'core/mysql.php';

foreach($_GET as $indice => $dado) {
    $$indice = limparDados($dado);
}

$data_atual = date('Y-m-d H:i:s');
$data = new \DateTime(date('Y-m-d'));

$criterio = [
    ['data_oferta', '<=', $data_atual]
];

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
            where id_pessoa = oferta.id_pessoa) as nome, (select cidade
            from pessoa
            where id_pessoa = oferta.id_pessoa) as cidade'
    ],
    $criterio,
    'data_oferta DESC, desconto ASC'
);

?>

<div class='viewed'>
    <div class='container'>
        <div class='row'>
            <div class='col'>
                <div class='bbb_viewed_title_container'>
                    <h3 class='bbb_viewed_title' style='text-align: center;'>Melhores Ofertas:</h3>
                </div>
                <div class='bbb_viewed_slider_container'>                     
                    <div class='owl-carousel owl-theme bbb_viewed_slider'>
                    <?php
                        foreach($posts as $post) :
                            $fotos = explode(';',$post['foto_nome_oferta']);                               
                    ?>
                        <?php if($post['desconto'] >= '60') : ?>
                        <div class='owl-item'>
                            <div class='bbb_viewed_item discount d-flex flex-column align-items-center justify-content-center text-center'>
                                <?php foreach($fotos as $foto) : ?>
                                    <a href='oferta_detalhe.php?id_oferta=<?php echo $post['id_oferta']?>'><div class='bbb_viewed_image'><img src='upload/oferta/<?php echo $foto?>' alt='<?php echo $foto?>'></div></a>
                                <?php endforeach; ?>
                                <div class='bbb_viewed_content text-center'>
                                    <div class='bbb_viewed_price'>R$<?php echo number_format($post['preco_atual'], 2, ',', '')?><span>R$<?php echo number_format($post['preco_original'], 2, ',', '');?></span></div>
                                    <a href='oferta_detalhe.php?id_oferta=<?php echo $post['id_oferta']?>'><div class='bbb_viewed_name'><?php echo $post['titulo']?></div></a>
                                </div>
                                <ul class='item_marks'>
                                    <li class='item_mark item_discount'>-<?php echo $post['desconto']?>%</li>
                                </ul>
                            </div>
                        </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
<div class='viewed'>
    <div class='container'>
        <div class='row'>
            <div class='col'>
                <div class='bbb_viewed_title_container'>
                    <h3 class='bbb_viewed_title' style='text-align: center;'>Novidades:</h3>
                </div>
                <div class='bbb_viewed_slider_container'>                         
                    <div class='owl-carousel owl-theme bbb_viewed_slider'>
                    <?php
                        foreach($posts as $post) :                  
                            $fotos = explode(';',$post['foto_nome_oferta']);
                            $fotos = explode(';',$post['foto_nome_oferta']);
                            $dateInterval = new \DateTime(date($post['data_oferta']));
                            $dateInterval = $dateInterval -> diff($data);
                    ?>
                        <?php if(($dateInterval->days) <= 7) : ?>
                        <div class='owl-item'>
                            <div class='bbb_viewed_item discount d-flex flex-column align-items-center justify-content-center text-center'>
                                <?php foreach($fotos as $foto) : ?>
                                    <a href='oferta_detalhe.php?id_oferta=<?php echo $post['id_oferta']?>'><div class='bbb_viewed_image'><img src='upload/oferta/<?php echo $foto?>' alt='<?php echo $foto?>'></div></a>
                                <?php endforeach; ?>
                                <div class='bbb_viewed_content text-center'>
                                    <div class='bbb_viewed_price'>R$<?php echo number_format($post['preco_atual'], 2, ',', '')?><span>R$<?php echo number_format($post['preco_original'], 2, ',', '');?></span></div>
                                    <a href='oferta_detalhe.php?id_oferta=<?php echo $post['id_oferta']?>'><div class='bbb_viewed_name'><?php echo $post['titulo']?></div></a>
                                </div>
                                <ul class='item_marks'>
                                    <li class='item_mark item_discount'>-<?php echo $post['desconto']?>%</li>
                                </ul>
                            </div>
                        </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class='viewed'>
    <div class='container'>
        <div class='row'>
            <div class='col'>
                <div class='bbb_viewed_title_container'>
                    <h3 class='bbb_viewed_title' style='text-align: center;'>Tempo Limitado:</h3>
                </div>
                <div class='bbb_viewed_slider_container'>                         
                    <div class='owl-carousel owl-theme bbb_viewed_slider'>
                    <?php
                        foreach($posts as $post) :
                            $fotos = explode(';',$post['foto_nome_oferta']);
                            $dateInterval = new \DateTime(date($post['termino_oferta']));
                            $dateInterval = $dateInterval -> diff($data);                           
                    ?>
                        <?php if(($dateInterval->days) > 7) :?>
                        <div class='owl-item'>
                            <div class='bbb_viewed_item discount d-flex flex-column align-items-center justify-content-center text-center'>
                                <?php foreach($fotos as $foto) : ?>
                                    <a href='oferta_detalhe.php?id_oferta=<?php echo $post['id_oferta']?>'><div class='bbb_viewed_image'><img src='upload/oferta/<?php echo $foto?>' alt='<?php echo $foto?>'></div></a>
                                <?php endforeach; ?>
                                <div class='bbb_viewed_content text-center'>
                                    <div class='bbb_viewed_price'>R$<?php echo number_format($post['preco_atual'], 2, ',', '')?><span>R$<?php echo number_format($post['preco_original'], 2, ',', '');?></span></div>
                                    <a href='oferta_detalhe.php?id_oferta=<?php echo $post['id_oferta']?>'><div class='bbb_viewed_name'><?php echo $post['titulo']?></div></a>
                                </div>
                                <ul class='item_marks'>
                                    <li class='item_mark item_discount'>-<?php echo $post['desconto']?>%</li>
                                </ul>
                            </div>
                        </div>
                        <?php endif; ?>
                        
                    <?php
                    
                endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js'></script>
<script type='text/javascript'>
    $(document).ready(function()
    {
        if($('.bbb_viewed_slider').length)
        {
            var viewedSlider = $('.bbb_viewed_slider');

            viewedSlider.owlCarousel(
            {
                loop:true,
                margin:30,
                autoplay:true,
                autoplayTimeout:6000,
                nav:false,
                dots:false,
                responsive:
                {
                    0:{items:1},
                    575:{items:2},
                    768:{items:3},
                    991:{items:4},
                    1199:{items:6}
                }
            });

            if($('.bbb_viewed_prev').length)
            {
                var prev = $('.bbb_viewed_prev');
                prev.on('click', function()
                {
                    viewedSlider.trigger('prev.owl.carousel');
                });
            }

            if($('.bbb_viewed_next').length)
            {
                var next = $('.bbb_viewed_next');
                next.on('click', function()
                {
                    viewedSlider.trigger('next.owl.carousel');
                });
            }
        }
    });
</script>
<script type='text/javascript'>
    var myLink = document.querySelector('a[href="#"]');
    myLink.addEventListener('click', function(e) {
    e.preventDefault();
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.js"></script>