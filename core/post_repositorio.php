<?php
    session_start();
    require_once '../includes/valida_login.php';
    require_once '../includes/funcoes.php';
    require_once 'conexao_mysql.php';
    require_once 'sql.php';
    require_once 'mysql.php';

    foreach($_POST as $indice => $dado) {
        $$indice = limparDados($dado);
    }

    foreach($_GET as $indice => $dado) {
        $$indice = limparDados($dado);
    }

    $id = (int)$id;

    switch($acao) {
        case 'insert':
            $dados = [
                'titulo' => $titulo,
                'texto' => $texto,
                'data_publicacao' => "$data_postagem $hora_postagem",
                'id_pesssoa' => $_SESSION['login']['pessoa']['id_pessoa']
            ];

            insere (
                'publicacao',
                $dados
            );

            break;
        case 'update':
            $dados = [
                'titulo' => $titulo,
                'texto' => $texto,
                'data_publicacao' => "$data_postagem $hora_postagem",
                'id_pessoa' => $_SESSION['login']['pessoa']['id_pessoa']
            ];

            $criterio = [
                ['id_publicaco', '=', $id]
            ];

            atualiza (
                'publicaco',
                $dados,
                $criterio
            );

            break;
        case 'delete':
            $criterio = [
                ['id_publicaco', '=', $id]
            ];

            deleta (
                'publicacao',
                $criterio
            );

            break;
    }

    header('Location: ../home.php');
    
?>