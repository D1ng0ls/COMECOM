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
            $dados = [
                'nome' => $nome,
                'email' => $email,
                'senha' => crypt($senha, $salt)
            ];

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
                ['id_pessoa', 'nome', 'email', 'senha', 'adm'],
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
        case 'update':
            $id = (int)$id;
            $dados = [
                'nome' => $nome,
                'email' => $email
            ];

            $criterio = [
                ['id_pessoa', '=', $id]
            ];

            atualiza (
                'pessoa',
                $dados,
                $criterio
            );

            break;

            break;
        case 'login':
            $criterio = [
                ['email', '=', $email],
                ['AND', 'ativo', '=', 1]
            ];

            $retorno = buscar (
                'pessoa',
                ['id_pessoa', 'nome', 'email', 'senha', 'adm'],
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
            case 'logout':
                session_destroy();
                break;
            case 'status':
                $id = (int)$id;
                $valor = (int)$valor;

                $dados = [
                    'ativo' => $valor
                ];

                $criterio = [
                    ['id_pessoa', '=', $id]
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
                $id = (int)$id;
                $valor = (int)$valor;

                $dados = [
                    'adm' => $valor
                ];

                $criterio = [
                    ['id_pessoa', '=', $id]
                ];

                atualiza (  
                    'pessoa',
                    $dados,
                    $criterio
                );

                header('Location: ../usuarios.php');
                exit;
                break;
    }
    header('Location: ../');
?>