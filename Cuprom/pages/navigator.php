<?php
    //include('conexao.php');
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
        <div class="logo">
            <img src="../media/logo.png" alt="Logo Cuprom" width="64px" height="64px">
        </div>
        <div class="menu">
            <nav>
                <a href="../categoria/mercado/">Mercado</a> | 
                <a href="../categoria/eletronicos/">Eletrônicos</a> | 
                <a href="../categoria/petshop/">Petshop</a> | 
                <a href="../categoria/moda&casa">Moda e Casa</a> | 
                <a href="../categoria/comunidade">Comunidade</a>
            </nav>
        </div>
        <div class="search">
            <form action="busca" method="GET">
                <input type="text" placeholder="Pesquisar..." name="query">
                <button type="submit">🔍</button>
            </form>
        </div>
    </header>
</body>
</html>