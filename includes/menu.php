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
        <li>
            <?php if ((isset($_SESSION['login']))
                    && ($_SESSION['login']['pessoa']['adm'] === 1)) : ?>
                <li class="nav-item">
                    <a class="#" href="<?php echo url($url, $com, $home) ?>usuarios.php">Usuários</a>
                </li>
            <?php endif; ?>
        </li>
    </ul>
</div>