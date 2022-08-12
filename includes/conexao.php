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
?>