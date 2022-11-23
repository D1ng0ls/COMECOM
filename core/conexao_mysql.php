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
>>>>>>> e3859b7128a4c92607c07047bfaecc6cacf6db12
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