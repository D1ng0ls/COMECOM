<header class="cabecalho" id="nav-top">
    <form action="<?php echo url($url, $com, $home) ?>busca" method="post">
        <div class="menu">
            <div class="logo">
                <a href="
                    <?php 
                        if($url == $pgu || $url == $sct || $url == $dct || $url == $users) { 
                            echo url2(); 
                        } else { 
                            echo url($url, $com, $home);} 
                    ?>">
                    <img src="<?php echo url($url, $com, $home) ?>media/COMECOM-cabecalho.png" alt="Logo Cuprom" class="img1-navigator">
                </a>
                <a href="
                    <?php 
                        if($url == $pgu || $url == $sct || $url == $dct || $url == $users) { 
                            echo url2(); 
                        } else { 
                            echo url($url, $com, $home);} 
                    ?>">
                    <img src="<?php echo url($url, $com, $home) ?>media/COMECOM-cabecalho-2.png" alt="Bruh" class="img2-navigator">
                </a>
            </div>

            <div class="container_search justify-content-end <?php if($url == $abt) { echo "comunidade";} else { echo "";};?>">
                <div class="inputs">
                    <div class="input-search">
                        <?php include 'buscar.php' ?>
                    </div>
                    <div class="submit-search">
                        <svg style="color: white;" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                            <path d="m21 21-6-6m2-5a7.001 7.001 0 0 1-11.95 4.95A7 7 0 1 1 17 10Z"/>
                        </svg>
                    </div>
                </div>
            </div>
            
            
            <div class="container_user justify-content-end">
                <div class="user">
                    <div class="login_navigator">
                        <?php if(!isset($_SESSION['login'])) : ?>
                            <a href="<?php echo url($url, $com, $home) ?>login.php">
                                <img class="user-img" src="<?php echo url($url, $com, $home) ?>media/icons/solid/user2.svg" alt="login">
                                <span class="user-text">Login</span>
                            </a>
                        <?php endif; ?>
                        <?php if(isset($_SESSION['login'])) : ?>
                            <a href="<?php echo url($url, $com, $home) ?>usuario.php">
                                <?php if (!isset($_SESSION['login']['pessoa']['foto_nome_pessoa'])) : ?>
                                    <img class="user-img" src="<?php echo url($url, $com, $home) ?>media/icons/solid/user2.svg" alt="login">
                                <?php endif; ?>
                                <?php if (isset($_SESSION['login']['pessoa']['foto_nome_pessoa'])) : ?>
                                    <img class="user-img" src="<?php echo url($url, $com, $home) ?>upload/user/<?php echo $_SESSION['login']['pessoa']['foto_nome_pessoa']?>" alt="usuário">
                                <?php endif; ?>
                                <span class="user-text" style="font-weight: 500;">
                                    <span style="font-weight: 500; vertical-align: middle;"><?php echo $_SESSION['login']['pessoa']['nome']?></span> 
                                </span>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'menu.php' ?>
    </form>
</header>