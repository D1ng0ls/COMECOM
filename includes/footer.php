<?php

?>

<!DOCTYPE html>
<body>
    <footer class="navFooter">
        <a href="#nav-top">
            <div class="footerBackToTop">
                <span class="footerBackToTopText">Voltar ao início</span>
            </div>
        </a>

        <div class="footerVerticalColumn">
            <div class="footerVerticalRow">
                <div class="footerLinkCol">
                    <div class="footerHeadCol">Setores</div>
                    <ul>
                        <li class="nav-first"><a href="<?php if($url != $home) echo "../../" ?>categoria/eletronicos/" class="nav_a">Eletrônicos</a></li>
                        <li><a href="<?php if($url != $home) echo "../../" ?>categoria/mercado/" class="nav_a">Mercado</a></li>
                        <li><a href="<?php if($url != $home) echo "../../" ?>categoria/moda_casa/" class="nav_a">Moda & Casa</a></li>
                        <li><a href="<?php if($url != $home) echo "../../" ?>categoria/petshop/" class="nav_a">Petshop</a></li>
                    </ul>
                </div>
                <div class="footerSpaceCol"></div>
                <div class="footerLinkCol">
                    <div class="footerHeadCol">Setores</div>
                    <ul>
                        <li class="nav-first"><a href="" class="nav_a">Eletrônicos</a></li>
                        <li><a href="" class="nav_a">Mercado</a></li>
                        <li><a href="" class="nav_a">Moda & Casa</a></li>
                        <li><a href="" class="nav_a">Petshop</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="footerLine"></div>

        <div class="footerCopyrightLine">
            <div class="footerLogoLine">
                <a href="">
                    <div class="logoSprite"></div>
                </a>
            </div>
            <ul>
                <li class="nav-first">
                © Copyright 2022-2024 Cuprom. Todos os direitos reservados
                </li>
            </ul>
        </div>
    </footer>
</body>
</html>