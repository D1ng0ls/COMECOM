<?php
    //include('conexao.php');
    header("Expires: Sun, 25 Jul 1997 06:02:34 GMT");
    header("Cache-Control: no-cache");
    header("Pragma: no-cache");

    $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $home = $_SERVER['HTTP_HOST'] . "/cuprom/";
    $elt = $_SERVER['HTTP_HOST'] . "/cuprom/categoria/eletronicos/";
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuprom</title>
</head>
<body>
    <header class="cabecalho">
        <form action="busca" method="GET" class="justify-content-end">
        
        <div class="menu <?php if($url == $elt) echo "eletronicos" ?>">
            <div class="logo">
                <a href="<?php if($url != $home) echo "../../" ?>"><img src="<?php if($url != $home) echo "../../" ?>media/logo.png" alt="Logo Cuprom" width="64px" height="64px"></a>
            </div>
            
            <div class="container_categoria">
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <a href="<?php if($url != $home) echo "../../" ?>categoria/eletronicos/" class="nav-link active">Eletrônicos</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php if($url != $home) echo "../../" ?>categoria/mercado/" class="nav-link active">Mercado</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php if($url != $home) echo "../../" ?>categoria/moda_casa/" class="nav-link active">Moda & Casa</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php if($url != $home) echo "../../" ?>categoria/petshop/" class="nav-link active">Petshop</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php if($url != $home) echo "../../" ?>categoria/comunidade/" class="nav-link active">Comunidade</a>
                    </li>
                </ul>
            </div>

            <div class="container_search justify-content-end">
                <div class="inputs"><input type="text" placeholder="Pesquisar..." name="query"><img src="<?php if($url != $home) echo "../../" ?>media/search_icon.png" alt="Pesquisar"></div>
            </div>
        </div>
    </form>
    </header>
</body>
</html>