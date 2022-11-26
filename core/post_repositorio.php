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
    
    $id_publicacao = (int)$id_publicacao;

    switch($acao) {
        case 'insert':
            $fotos_name = array();
            $fotos = array_filter($_FILES['foto']['name']); 
            $total_count = count($_FILES['foto']['name']);

            for( $i=0 ; $i < $total_count ; $i++ ) {      
                $tmpFilePath = $_FILES['foto']['tmp_name'][$i];
                if ($tmpFilePath != ""){
                    $foto_name = $_FILES['foto']['name'][$i];
                    $path_parts = pathinfo($foto_name);
                    $imageFileType = strtolower(pathinfo($foto_name, PATHINFO_EXTENSION));
                    $foto_name = $path_parts['filename'].time().".".$imageFileType ;    
                    $newFilePath = "../upload/post/" . $foto_name;
                    if(move_uploaded_file($tmpFilePath, $newFilePath)) {
                        $fotos_name[] = $foto_name;
                    }
                }
            }

            $dados = [
                'titulo' => $titulo,
                'texto' => $texto,
                'foto_nome_publi' => implode(";", $fotos_name),//$foto_nome_publi,
                'id_pessoa' => $_SESSION['login']['pessoa']['id_pessoa']
            ];

            insere (
                'publicacao',
                $dados
            );

            break;
        case 'update':
            $fotos_name = array();
            $fotos = array_filter($_FILES['foto']['name']); 
            $total_count = count($_FILES['foto']['name']);

            for( $i=0 ; $i < $total_count ; $i++ ) {      
                $tmpFilePath = $_FILES['foto']['tmp_name'][$i];
                if ($tmpFilePath != ""){
                    $foto_name = $_FILES['foto']['name'][$i];
                    $path_parts = pathinfo($foto_name);
                    $imageFileType = strtolower(pathinfo($foto_name, PATHINFO_EXTENSION));
                    $foto_name = $path_parts['filename'].time().".".$imageFileType ;    
                    $newFilePath = "../upload/post/" . $foto_name;
                    if(move_uploaded_file($tmpFilePath, $newFilePath)) {
                        $fotos_name[] = $foto_name;
                    }
                }
            }

            $dados = [
                'titulo' => $titulo,
                'texto' => $texto,
                'foto_nome_publi' => implode(";", $fotos_name),
                'id_pessoa' => $_SESSION['login']['pessoa']['id_pessoa']
            ];

            $criterio = [
                ['id_publicacao', '=', $id_pessoa]
            ];

            atualiza (
                'publicaco',
                $dados,
                $criterio       
            );

            break;
        case 'delete':
            $criterio = [
                ['id_publicacao', '=', $id_publicacao]
            ];

            deleta (
                'publicacao',
                $criterio
            );

            header('Location: ../user.php?id_pessoa='.$id_pessoa);

        break;
    }

    header('Location: ../comunidade/');
?>