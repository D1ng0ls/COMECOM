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
                    <li class="nav-first"><a href="<?php echo url($url, $com, $home) ?>categoria/eletronicos/" class="nav_a">Eletrônicos</a></li>
                    <li><a href="<?php echo url($url, $com, $home) ?>categoria/mercado/" class="nav_a">Mercado</a></li>
                    <li><a href="<?php echo url($url, $com, $home) ?>categoria/moda_casa/" class="nav_a">Moda & Casa</a></li>
                    <li><a href="<?php echo url($url, $com, $home) ?>categoria/petshop/" class="nav_a">Petshop</a></li>
                </ul>
            </div>
            <div class="footerSpaceCol"></div>
            <div class="footerLinkCol">
                <div class="footerHeadCol">Comunidade</div>
                <ul>
                    <li class="nav-first"><a href="<?php echo url($url, $com, $home) ?>comunidade/" class="nav_a">Entrar</a></li>
                    <li><a href="<?php echo url($url, $com, $home) ?>comunidade/rules.html" class="nav_a">Regras</a></li>
                    <li><a href="<?php echo url($url, $com, $home) ?>comunidade/faq.php" class="nav_a">FAQ</a></li>
                </ul>
            </div>
            <div class="footerSpaceCol"></div>
            <div class="footerLinkCol">
                <div class="footerHeadCol">Conheça-nos</div>
                <ul>
                    <li class="nav-first"><a href="<?php echo url($url, $com, $home) ?>comunidade/aboutus.php" class="nav_a">Sobre nós</a></li>
                    <li><a href="<?php echo url($url, $com, $home) ?>comunidade/aboutus.php#contato" class="nav_a">Contato</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="footerLine"></div>

    <div class="footerCopyrightLine">
        <div class="footerLogoLine">
            <a href="<?php if($url == $pgu || $url == $sct) { echo url2(); } else { echo url($url, $com, $home);} ?> ">
                <div class="logoSprite"></div>
            </a>
        </div>
        <ul>
            <li class="nav-first">
            © Copyright 2022 COMECOM<br> Todos os direitos reservados
            </li>
        </ul>
    </div>
</footer>