<header class="cabecalho" id="nav-top">
    <form action="<?php echo url($url, $com, $home) ?>busca" method="post">
        <div class="menu">
            <div class="logo">
                <a href="<?php echo url($url, $com, $home) ?>"><img src="<?php echo url($url, $com, $home) ?>media/COMECOM-cabecalho.png" alt="Logo Cuprom"></a>
            </div>

            <div class="container_search justify-content-end <?php if($url == $abt) { echo "comunidade";} else { echo "";};?>">
                <div class="inputs">
                    <div class="input-search"><input type="text" placeholder="Pesquisar..." name="query"></div>
                    <div class="submit-search">
                        <svg style="color: white;" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                            <path d="m21 21-6-6m2-5a7.001 7.001 0 0 1-11.95 4.95A7 7 0 1 1 17 10Z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="container_user justify-content-end">
                <div class="user">
                    <?php if(!isset($_SESSION['login'])) : ?>
                        <a href="<?php echo url($url, $com, $home) ?>login.php">
                            <img class="user-img" src="<?php echo url($url, $com, $home) ?>media/icons/solid/user.svg" alt="login">
                            <span class="user-text">Login</span>
                        </a>
                    <?php endif; ?>
                    <?php if(isset($_SESSION['login'])) : ?>
                        <a href="<?php echo url($url, $com, $home) ?>usuario.php">
                            <?php if (!isset($_SESSION['login']['pessoa']['foto_nome_pessoa'])) : ?>
                                <img class="user-img" src="<?php echo url($url, $com, $home) ?>media/icons/solid/user.svg" alt="login">
                            <?php endif; ?>
                            <?php if (isset($_SESSION['login']['pessoa']['foto_nome_pessoa'])) : ?>
                                <img class="user-img" src="<?php echo url($url, $com, $home) ?>media/foto_nome_pessoa" alt="usuário">
                            <?php endif; ?>
                            <span class="user-text" style="font-weight: 500;">
                                Olá, <span style="font-weight: 500;"><?php echo $_SESSION['login']['pessoa']['nome']?></span> 
                            </span>
                        </a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php include 'menu.php' ?>
    </form>
</header>