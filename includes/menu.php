<div class="container_categoria">
    <input type="checkbox" id="check">
    <label for="check" class="menu_btn">
        <i class="fas fa-bars"></i>
    </label>
    <ul class="nav justify-content-center">
        <li class="nav-item login_menu">
            <div class="container_user justify-content-end">
                <div class="user">
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
                                <span style="font-weight: 500;"><?php echo $_SESSION['login']['pessoa']['nome']?></span> 
                            </span>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </li>
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