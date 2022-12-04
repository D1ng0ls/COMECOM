<?php
    session_start();
    require_once '../includes/funcoes.php';
    require_once 'conexao_mysql.php';
    require_once 'sql.php';
    require_once 'mysql.php';
    $salt = 'ifsp'; 

    foreach($_POST as $indice => $dado) {
        $$indice = limparDados($dado);
    }

    foreach($_GET as $indice => $dado) {
        $$indice = limparDados($dado);
    }

    switch($acao) {
        case 'insert':
            unset($_SESSION['msg']['email']);
            // unset($_SESSION['msg_doc']['documento']);
            
            $criterio = [
                ['email', '=', $email]                
            ];

            $retorno = buscar (
                'pessoa',
                ['id_pessoa'],
                $criterio
            );
            
            if(count($retorno) > 0) {
                $_SESSION['msg']['email'] = "E-mail já cadastrado!";
                // if(count($retorno) > 0)
                // {
                //     $_SESSION['msg_doc']['documento'] = "Documento duplicado!";
                // }         
                header('Location: ../register.php');              
            }
            else {
                if ($tipo_pessoa == 'fisica') {
                    $dados = [
                        'tipo_pessoa' => $tipo_pessoa,
                        'nome' => $nome,
                        'email' => $email,
                        'senha' => crypt($senha, $salt),
                        'cidade' => $cidade,
                        'telefone' => $telefone,
                        'documento' => $cpf,
                    ];
                }
                else {
                    if($tipo_pessoa == 'juridica') {
                        $dados = [
                            'tipo_pessoa' => $tipo_pessoa,
                            'nome' => $nome,
                            'email' => $email,
                            'senha' => crypt($senha, $salt),
                            'cidade' => $cidade,
                            'telefone' => $telefone,
                            'documento' => $cnpj,
                            'qnt_lojas' => $qnt_lojas,
                        ];
                    }
                }
                header('Location: ../');
            }

            insere (
                'pessoa',
                $dados
            );  

            $criterio = [
                ['email', '=', $email],
                ['AND', 'ativo', '=', 1]
            ];

            $retorno = buscar (
                'pessoa',
                ['id_pessoa', 'tipo_pessoa', 'nome', 'email', 'senha', 'cidade', 'telefone', 'documento', 'qnt_lojas', 'adm'],
                $criterio
            );

            if(count($retorno) > 0) {
                if(crypt($senha, $salt) == $retorno[0]['senha']) {
                    $_SESSION['login']['pessoa'] = $retorno[0];
                    if(!empty($_SESSION['url_retorno'])) {
                        header('Location: ' . $_SESSION['url_retorno']);
                        $_SESSION['url_retorno'] = '';
                        exit;
                    }
                }
            }

            break;
        // case 'update_foto':
            // //$foto = filter_input(INPUT_POST, 'imagem', FILTER_DEFAULT);
            // //var_dump($imagem);

            // // Separa as informações da imagem base64 pelo ";"
            // list($type, $imagem) = explode(';', $imagem);
            // list(, $imagem) = explode(',', $imagem);
    
            // // Desconverter a imagem base64
            // $imagem = base64_decode($imagem);
    
            // // Atribuir a extensão da imagem PNG
            // $imagem_nome = time() . '.png';

            // file_put_contents('../upload/user/' . $imagem_nome, $imagem);

            // echo $imagem_nome;
            // break;
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
                    $newFilePath = "../upload/user/" . $foto_name;
                    if(move_uploaded_file($tmpFilePath, $newFilePath)) {
                        $fotos_name[] = $foto_name;
                    }
                }
            }

            $id_pessoa = (int)$id_pessoa;

            if(empty($fotos_name)) {
            $dados = [
                'tipo_pessoa' => $tipo_pessoa,
                'nome' => $nome,
                'email' => $email,
                'cidade' => $cidade,
                'telefone' => $telefone,
                'documento' => $documento,
                'qnt_lojas' => $qnt_lojas
            ];
            } else {
                $dados = [
                    'tipo_pessoa' => $tipo_pessoa,
                    'nome' => $nome,
                    'email' => $email,
                    'cidade' => $cidade,
                    'telefone' => $telefone,
                    'documento' => $documento,
                    'qnt_lojas' => $qnt_lojas,
                    'foto_nome_pessoa' => implode(";", $fotos_name)
                ];
            }

            $criterio = [
                ['id_pessoa', '=', $id_pessoa]
            ];

            atualiza (
                'pessoa',
                $dados,
                $criterio
            );
            $retorno = buscar (
                'pessoa',
                ['id_pessoa', 'tipo_pessoa', 'nome', 'email', 'senha', 'cidade', 'telefone', 'documento', 'qnt_lojas', 'foto_nome_pessoa', 'adm'],
                $criterio
            );

            if(count($retorno) > 0) {
                    $_SESSION['login']['pessoa'] = $retorno[0];
            }   

            header('Location: ../usuario.php#info');
            exit;
            break;

        case 'trocasenha':
            unset($_SESSION['msg']['user']);
            if(crypt($senha, $salt) == $_SESSION['login']['pessoa']['senha']) {

            $id_pessoa = (int)$id_pessoa;
            $dados = [
                'senha' => crypt($novasenha, $salt)
            ];

            $criterio = [
                ['id_pessoa', '=', $id_pessoa]
            ];

            atualiza (
                'pessoa',
                $dados,
                $criterio
            );

            header('Location: ../usuario.php#info');

            } else {
                $_SESSION['msg']['user'] = "Senhas não conferem!";
                header('Location: ../security.php');
            }
            
            exit;
            break;
        case 'login':
            unset($_SESSION['msg']['email']);
            $criterio = [
                ['email', '=', $email],
                ['AND', 'ativo', '=', 1]
            ];

            $retorno = buscar (
                'pessoa',
                ['id_pessoa', 'tipo_pessoa', 'nome', 'email', 'senha', 'cidade', 'telefone', 'documento', 'qnt_lojas', 'foto_nome_pessoa', 'adm'],
                $criterio
            );

            if(count($retorno) > 0) {
                if(crypt($senha, $salt) == $retorno[0]['senha']) {
                    $_SESSION['login']['pessoa'] = $retorno[0];
                    if(!empty($_SESSION['url_retorno'])) {
                        header('Location: ' . $_SESSION['url_retorno']);
                        $_SESSION['url_retorno'] = '';
                        exit;
                    }
                    break;
                } 
            }        
            $_SESSION['msg']['login'] = "E-mail ou senha inválido(s)!";
            header('Location: ../login.php');
            exit;            

            break;
        case 'logout':
            session_destroy();
            header('Location: ../login.php');
            break;
        case 'status':
            $id_pessoa = (int)$id_pessoa;
            $valor = (int)$valor;

            $dados = [
                'ativo' => $valor
            ];

            $criterio = [
                ['id_pessoa', '=', $id_pessoa]
            ];

            atualiza (
                'pessoa',
                $dados,
                $criterio
            );

            header('Location: ../usuarios.php');
            exit;
            break;
        case 'adm':
            $id_pessoa = (int)$id_pessoa;
            $valor = (int)$valor;

            $dados = [
                'adm' => $valor
            ];

            $criterio = [
                ['id_pessoa', '=', $id_pessoa]
            ];

            atualiza (  
                'pessoa',
                $dados,
                $criterio
            );

            header('Location: ../usuarios.php');
            exit;
            break;
        case 'apagar': 
            $criterio = [
                ['id_pessoa', '=', $id_pessoa]
            ];

            deleta (
                'publicacao',
                $criterio
            );

            deleta (
                'pessoa',
                $criterio
            );
            session_destroy();
            
            break;
    }
   header('Location: ../');
?>