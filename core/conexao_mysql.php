<?php
    date_default_timezone_set('America/Sao_Paulo');

    function conecta() : mysqli
    {
        $servidor = 'localhost';
        $banco = 'comecom';
<<<<<<< HEAD
        $port = 3307;// 3306
=======
        $port = 3307;// 3307
>>>>>>> 3768c352b3749bbbd1b5436c1040c28672a087cb
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

    function desconecta($conexao)
    {
        mysqli_close($conexao);
    }
?>