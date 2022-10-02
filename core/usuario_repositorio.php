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
            if ($tipo_pessoa == 'fisica') {
                $dados = [
                    'tipo_pessoa' => $tipo_pessoa,
                    'nome' => $nome,
                    'email' => $email,
                    'senha' => crypt($senha, $salt),
                    'endereco' => $endereco,
                    'telefone' => $telefone,
                    'documento' => $cpf
                ];
            }
            else {
                if($tipo_pessoa == 'juridica') {
                    $dados = [
                        'tipo_pessoa' => $tipo_pessoa,
                        'nome' => $nome,
                        'email' => $email,
                        'senha' => crypt($senha, $salt),
                        'endereco' => $endereco,
                        'telefone' => $telefone,
                        'documento' => $cnpj,
                        'qnt_lojas' => $qnt_lojas
                    ];
                }
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
                ['id_pessoa', 'tipo_pessoa', 'nome', 'email', 'senha', 'endereco', 'telefone', 'documento', 'qnt_lojas', 'adm'],
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
                'tipo_pessoa' => $tipo_pessoa,
                'nome' => $nome,
                'email' => $email,
                'endereco' => $endereco,
                'telefone' => $telefone,
                'documento' => $documento,
                'qnt_lojas' => $qnt_lojas
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
                ['id_pessoa', 'tipo_pessoa', 'nome', 'email', 'senha', 'endereco', 'telefone', 'documento', 'qnt_lojas', 'adm'],
                $criterio
            );

            if(count($retorno) > 0) {
                if(crypt($senha, $salt) == $retorno[0]['senha']) {
                    $_SESSION['login']['pessoa'] = $retorno[0];
                    if(!empty($_SESSION['url_retorno'])) {
                        header('Location: ' . $_SESSION['url_retorno']);
                        $_SESSION['url_retorno'] = '';
                        exit;
                    }else
                    {
                        print_r("Olá");
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