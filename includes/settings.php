<?php
    session_start();
?>

<?php
    $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $home = $_SERVER['HTTP_HOST'] . "/COMECOM/";
    $elt = $_SERVER['HTTP_HOST'] . "/COMECOM/categoria/eletronicos/";
    $mrc = $_SERVER['HTTP_HOST'] . "/COMECOM/categoria/mercado/";
    $mec = $_SERVER['HTTP_HOST'] . "/COMECOM/categoria/moda_casa/";
    $pet = $_SERVER['HTTP_HOST'] . "/COMECOM/categoria/petshop/";
    $com = $_SERVER['HTTP_HOST'] . "/COMECOM/comunidade/";
    $abt = $_SERVER['HTTP_HOST'] . "/COMECOM/comunidade/aboutus.php";
    $pgu = $_SERVER['HTTP_HOST'] . "/COMECOM/usuario.php";
    $sct = $_SERVER['HTTP_HOST'] . "/COMECOM/security.php";
    $dct = $_SERVER['HTTP_HOST'] . "/COMECOM/deactivate.php";
    $faq = $_SERVER['HTTP_HOST'] . "/COMECOM/comunidade/faq.php";
    $users = $_SERVER['HTTP_HOST'] . "/COMECOM/usuarios.php";
    $oft = $_SERVER['HTTP_HOST'] . "/COMECOM/includes/oferta_formulario.php";
    $user = $_SERVER['HTTP_HOST'] . "/COMECOM/user.php";
    $sea = $_SERVER['HTTP_HOST'] . "/COMECOM/search.php";

    function url($url, $com, $home) : string {
        if($url == $home) {
            return "";
        }else if($url == $GLOBALS['abt'] || $url == $com || $url == $GLOBALS['faq']){
            return "../";
        } else if($url == $GLOBALS['pgu'] || $url == $GLOBALS['sct'] || $url == $GLOBALS['dct']){
            return "";
        } else if($url == $GLOBALS['elt']) {
            return "../../";
        } else if($url == $GLOBALS['mrc']) {
            return "../../";
        } else if($url == $GLOBALS['mec']) {
            return "../../";
        } else if($url == $GLOBALS['pet']) {
            return "../../";
        } else if($url == $GLOBALS['com']) {
            return "../../";
        } else if($url == $GLOBALS['abt']) {
            return "../../";
        } else if($url == $GLOBALS['oft']) {
            return "../";
        } else {
            return "/COMECOM/";
        }
    }

    function url2() : string {
        return "/COMECOM/";
    }

    function url3() : string {
        return "../";
    }

    function nome($url) : string {
        if($url == $GLOBALS['elt']) return "Eletrônicos";
        if($url == $GLOBALS['mrc']) return "Mercado";
        if($url == $GLOBALS['mec']) return "Moda & Casa";
        if($url == $GLOBALS['pet']) return "Petshop";
    }

    function categoria($url) : string {
        switch($url) {
            case $GLOBALS['elt']:
                return "eletronicos";
                break;
            case $GLOBALS['mrc']:
                return "mercado";
                break;
            case $GLOBALS['mec']:
                return "modaecasa";
                break;
            case $GLOBALS['pet']:
                return "petshop";
                break;
            default :
                return "";
                break;
        }
    }

    if($url == $pgu) {
        session_reset();
    }
?>

<link rel="shortcut icon" type="x-icon" href="<?php echo url($url, $com, $home) ?>media/shortcut.png">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">