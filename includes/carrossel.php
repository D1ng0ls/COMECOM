<?php $j=1; while ($j<=3) { echo "
    <div class='viewed'>
        <div class='container'>
            <div class='row'>
                <div class='col'>
                    <div class='bbb_viewed_title_container'>
                        <h3 class='bbb_viewed_title' style='text-align: center;'>".ofertas($j)."</h3>
                    </div>
                    <div class='bbb_viewed_slider_container'>                         
                        <div class='owl-carousel owl-theme bbb_viewed_slider'>";
                                $i=1; while($i<=5){ echo"
                            <a href='#'>
                                <div class='owl-item'>
                                    <div class='bbb_viewed_item discount d-flex flex-column align-items-center justify-content-center text-center'>
                                        <div class='bbb_viewed_image'><img src='media/oferta5.jpg' alt=''></div>
                                        <div class='bbb_viewed_content text-center'>
                                            <div class='bbb_viewed_price'>R$".$i."00,00<span>R$".$i."000,00</span></div>
                                            <div class='bbb_viewed_name'>Samsung Mobile</div>
                                        </div>
                                        <ul class='item_marks'>
                                            <li class='item_mark item_discount'>-90%</li>
                                        </ul>
                                    </div>
                                </div>
                            </a>
                            "; $i++;}; 
                        echo "</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    ";
    $j++;}
?>
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