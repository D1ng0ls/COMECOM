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
    $fotos_name = array();
    $fotos = array_filter($_FILES['foto']['name']); 
    // Count the number of uploaded files in array
    $total_count = count($_FILES['foto']['name']);
    // Loop through every file
    for( $i=0 ; $i < $total_count ; $i++ ) {
        //The temp file path is obtained
        $tmpFilePath = $_FILES['foto']['tmp_name'][$i];
        //A file path needs to be present
        if ($tmpFilePath != ""){
            //Setup our new file path
            $foto_name = $_FILES['foto']['name'][$i];
            $path_parts = pathinfo($foto_name);
            $imageFileType = strtolower(pathinfo($foto_name, PATHINFO_EXTENSION));
            $foto_name = $path_parts['filename'].time().".".$imageFileType ;
            $newFilePath = "../upload/" . $foto_name;
            
            //File is uploaded to temp dir
            if(move_uploaded_file($tmpFilePath, $newFilePath)) {
                $fotos_name[] = $foto_name;
            }
        }
    }
    
    $id_publicacao = (int)$id_publicacao;

    switch($acao) {
        case 'insert':
            $dados = [
                'titulo' => $titulo,
                'texto' => $texto,
                // 'foto_blob_publi' => $foto_blob_publi,
                'foto_nome_publi' => implode(";", $fotos_name),//$foto_nome_publi,
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