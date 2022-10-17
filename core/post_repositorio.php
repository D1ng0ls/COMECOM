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

    // //Upload da foto
    // $foto_nome_publi = $_FILES['foto']['name'];
    // $target_dir = "upload/";
    // $target_file = $target_dir . basename($_FILES["foto"]["name"]);

    // //Select file type
    // $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // //Valid file extensions
    // $extensions_arr = array("jpg", "jpeg", "png", "gif");


    // //Check entension
    // if(in_array($imageFileType, $extensions_arr))
    // {
    //     if(move_uploaded_file($_FILES['foto']['tmp_name'], $target_dir.$foto_nome_publi))
    //     {
    //         $foto_blob_publi = addslashes(file_get_contents($target_dir.$foto_nome_publi));
    //     }
    // }

    $id = (int)$id;

    switch($acao) {
        case 'insert':
            $dados = [
                'titulo' => $titulo,
                'texto' => $texto,
                'desconto' => $desconto,
                'termino_promocao' => $termino_promocao,
                // 'foto_blob_publi' => $foto_blob_publi,
                // 'foto_nome_publi' => $foto_nome_publi,
                'id_pessoa' => $_SESSION['login']['pessoa']['id_pessoa']
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
                'desconto' => $desconto,
                'termino_promocao' => $termino_promocao,
                // 'foto_blob_publi' => $foto_blob_publi,
                // 'foto_nome_publi' => $foto_nome_publi,
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

    header('Location: ../comunidade/');
    
?>