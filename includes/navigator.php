<header class="cabecalho" id="nav-top">
    <form action="busca" method="GET">
    <div class="menu <?php echo cor($url, $elt, $mrc, $mec, $pet, $com, $home) ?> ">
        <div class="logo">
            <a href="<?php echo url($url, $com, $home) ?>"><img src="<?php echo url($url, $com, $home) ?>media/COMECOM-cabecalho.png" alt="Logo Cuprom"></a>
        </div>

        <div class="container_search justify-content-end">
            <div class="inputs">
                <div class="input-search"><input type="text" placeholder="Pesquisar..." name="query"></div>
                <div class="submit-search"><img src="<?php echo url($url, $com, $home) ?>media/search_icon.png" alt="Pesquisar"></div>
            </div>
        </div>

        <div class="container_user justify-content-end">
            <div class="user">
                <?php if(!isset($_SESSION['login'])) : ?>
                    <a href="<?php echo url($url, $com, $home) ?>login.php">
                        <img class="user-img" src="<?php echo url($url, $com, $home) ?>media/login.png" alt="login">
                        <span class="user-text">Login</span>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="container_categoria">
        <ul class="nav justify-content-center">
            <li class="nav-item first-item">
                <a href="<?php echo url($url, $com, $home) ?>categoria/eletronicos/" class="nav-link active">Eletrônicos</a>
            </li>
            <li class="nav-item">
                <a href="<?php echo url($url, $com, $home) ?>categoria/mercado/" class="nav-link active">Mercado</a>
            </li>
            <li class="nav-item">
                <a href="<?php echo url($url, $com, $home) ?>categoria/moda_casa/" class="nav-link active">Moda & Casa</a>
            </li>
            <li class="nav-item">
                <a href="<?php echo url($url, $com, $home) ?>categoria/petshop/" class="nav-link active">Petshop</a>
            </li>
            <li class="nav-item last-item">
                <a href="<?php echo url($url, $com, $home) ?>comunidade/" class="nav-link active">Comunidade</a>
            </li>
        </ul>
    </div>
    </form>
</header>