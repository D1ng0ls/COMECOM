<?php
    //include('conexao.php');
    header("Expires: Sun, 25 Jul 1997 06:02:34 GMT");
    header("Cache-Control: no-cache");
    header("Pragma: no-cache");

    $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $home = $_SERVER['HTTP_HOST'] . "/cuprom/";
    $elt = $_SERVER['HTTP_HOST'] . "/cuprom/categoria/eletronicos/";
    $mrc = $_SERVER['HTTP_HOST'] . "/cuprom/categoria/mercado/";
    $mec = $_SERVER['HTTP_HOST'] . "/cuprom/categoria/moda_casa/";
    $pet = $_SERVER['HTTP_HOST'] . "/cuprom/categoria/petshop/";
    $com = $_SERVER['HTTP_HOST'] . "/cuprom/comunidade/";

    function url($url, $com, $home) : string {
        if($url == $com) {
            return "../";
        } else if($url != $home) {
            return "../../";
        }
    }

    function cor($url, $elt, $mrc, $mec, $pet, $com) : string {
        if($url == $elt) return "eletronicos";
        if($url == $mrc) return "mercado";
        if($url == $mec) return "modaecasa";
        if($url == $pet) return "petshop";
        if($url == $com) return "comunidade";
    }
?>

<!DOCTYPE html>
<body>
    <header class="cabecalho" id="nav-top">
        <form action="busca" method="GET">
        <div class="menu <?php echo cor($url, $elt, $mrc, $mec, $pet, $com)?> ">
            <div class="logo">
                <a href="<?php echo url($url, $com, $home) ?>"><img src="<?php echo url($url, $com, $home) ?>media/logo.png" alt="Logo Cuprom"></a>
            </div>
            
            <div class="container_categoria">
                <ul class="nav justify-content-center">
                    <li class="nav-item">
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
                    <li class="nav-item">
                        <a href="<?php echo url($url, $com, $home) ?>comunidade/" class="nav-link active">Comunidade</a>
                    </li>
                </ul>
            </div>

            <div class="container_search justify-content-end">
                <div class="inputs">
                    <div class="input-search"><input type="text" placeholder="Pesquisar..." name="query"></div>
                    <div class="submit-search"><img src="<?php echo url($url, $com, $home) ?>media/search_icon.png" alt="Pesquisar"></div>
                </div>
            </div>
        </div>
    </form>
    </header>
</body>
</html>