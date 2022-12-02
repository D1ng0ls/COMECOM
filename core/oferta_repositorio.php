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
    
    $id_oferta = (int)$id_oferta;

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
                    $foto_name = $path_parts['filename'].time().".".$imageFileType;
                    $newFilePath = "../upload/oferta/" . $foto_name;
                    if(move_uploaded_file($tmpFilePath, $newFilePath)) {
                        $fotos_name[] = $foto_name;
                    }
                }
            }

            $dados = [
                'titulo' => $titulo,
                'texto' => $texto,
                'preco_original' => $preco_original,
                'desconto' => $desconto,
                'preco_atual' => $preco_atual,
                'inicio_oferta' => $inicio_oferta,
                'termino_oferta' => $termino_oferta,
                'foto_nome_oferta' => implode(";", $fotos_name),
                'categoria' => $categoria,
                'marca' => $marca,
                'endereco' => $endereco,
                'id_pessoa' => $_SESSION['login']['pessoa']['id_pessoa']
            ];

            insere (
                'oferta',
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
                    $foto_name = $path_parts['filename'].time().".".$imageFileType;
                    $newFilePath = "../upload/oferta/" . $foto_name;
                    if(move_uploaded_file($tmpFilePath, $newFilePath)) {
                        $fotos_name[] = $foto_name;
                    }
                }
            }

            $dados = [
                'titulo' => $titulo,
                'texto' => $texto,
                'preco_original' => $preco_original,
                'desconto' => $desconto,
                'preco_atual' => $preco_atual,
                'inicio_oferta' => $inicio_oferta,
                'termino_oferta' => $termino_oferta,
                'foto_nome_oferta' => implode(";", $fotos_name),
                'categoria' => $categoria,
                'marca' => $marca,
                'endereco' => $endereco,
                'id_pessoa' => $_SESSION['login']['pessoa']['id_pessoa']
            ];

            $criterio = [
                ['id_oferta', '=', $id]
            ];

            atualiza (
                'oferta',
                $dados,
                $criterio       
            );

            break;
        case 'delete':
            $criterio = [
                ['id_oferta', '=', $id_oferta]
            ];

            deleta (    
                'oferta',
                $criterio
            );

            header('Location: ../user.php?id_pessoa='.$id_pessoa);

            break;
    }    
    if($categoria == 'eletronicos') {
        header('Location: /COMECOM/categoria/eletronicos/');
    } else if($categoria == 'mercado') {
        header('Location: /COMECOM/categoria/mercado/');
    } else if($categoria == 'modaecasa') {
        header('Location: /COMECOM/categoria/moda_casa/');
    } else if($categoria == 'petshop') {
        header('Location: /COMECOM/categoria/petshop/');
    }
?>