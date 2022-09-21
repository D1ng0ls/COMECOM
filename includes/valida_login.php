<?php
    $_SESSION['url_retorno'] = $_SERVER['PHP_SELF'];

    if(!isset($_SESSION['login'])) {
        header('Location: login.php');
        exit;
    }
?>