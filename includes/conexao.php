<<<<<<< HEAD:includes/conexao.php
<?php 
    $hostname= "localhost";
    $port = 3307; //3306 - home | 3307 - school
    $username = "root";
    $password = "";
    $database = "cuprom";
    $con = mysqli_connect($hostname, $username, $password, $database, $port);

    if(mysqli_connect_errno()){
        printf("Erro ao conectar ao banco de dados: %s\n<br><br>", mysqli_connect_error());
        exit;
    }
=======
<?php 
    function conecta() : mysqli
    {
        $servidor = 'localhost';
        $banco = 'cuprom';
        $port = 3306;// 3307
        $usuario = 'root';
        $senha = '';
        $conexao = mysqli_connect($servidor, $usuario, $senha, $banco, $port);

        if(!$conexao){
            echo 'Erro: Não foi possível conectar ao MySql.' . PHP_EOL;
            echo 'Debugging errno: ' . mysqli_connect_errno() . PHP_EOL;
            echo 'Debugging error: ' . mysqli_connect_error() . PHP_EOL;
            return null;
        }
        return $conexao;
    }

    // if(mysqli_connect_error())
    // {
    //     printf("Erro ao conectar ao banco de dados: %s\n", mysqli_connect_error());
    //     exit;
    // }
    // printf("Banco de dados conectados com sucesso \o/<br><br>");

    function desconecta($conexao)
    {
        mysqli_close($conexao);
    }
>>>>>>> aa80959b12cf2dc6bca81f14c43888019286d9f8:pages/conexao.php
?>