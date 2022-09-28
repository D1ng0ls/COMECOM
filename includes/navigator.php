<?php
    session_start();
?>

<header class="cabecalho" id="nav-top">
    <form action="<?php echo url($url, $com, $home) ?>busca" method="post">
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
                    <?php if(isset($_SESSION['login'])) : ?>
                        <a href="<?php echo url($url, $com, $home) ?>usuario.php?id_pessoa=<?php echo $_SESSION['login']['pessoa']['id_pessoa'] ?>">
                            <?php if (!isset($_SESSION['login']['pessoa']['foto_nome_pessoa'])) : ?>
                                <img class="user-img" src="<?php echo url($url, $com, $home) ?>media/login.png" alt="login">
                            <?php endif; ?>
                            <?php if (isset($_SESSION['login']['pessoa']['foto_nome_pessoa'])) : ?>
                                <img class="user-img" src="<?php echo url($url, $com, $home) ?>media/foto_nome_pessoa" alt="login">
                            <?php endif; ?>
                            <span class="user-text">
                                Você!
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