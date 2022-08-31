<?php
    $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $home = $_SERVER['HTTP_HOST'] . "/COMECOM/";
    $elt = $_SERVER['HTTP_HOST'] . "/COMECOM/categoria/eletronicos/";
    $mrc = $_SERVER['HTTP_HOST'] . "/COMECOM/categoria/mercado/";
    $mec = $_SERVER['HTTP_HOST'] . "/COMECOM/categoria/moda_casa/";
    $pet = $_SERVER['HTTP_HOST'] . "/COMECOM/categoria/petshop/";
    $com = $_SERVER['HTTP_HOST'] . "/COMECOM/comunidade/";

    function url($url, $com, $home) : string {
        if($url == $com) {
            return "../";
        } else if($url != $home) {
            return "../../";
        } else {
            return "";
        }
    }

    function cor($url, $elt, $mrc, $mec, $pet, $com, $home) : string {
        if($url == $elt) return "eletronicos";
        if($url == $mrc) return "mercado";
        if($url == $mec) return "modaecasa";
        if($url == $pet) return "petshop";
        if($url == $com) return "comunidade";
        if($url == $home) return "home";
    }
?>

<link rel="shortcut icon" type="x-icon" href="<?php echo url($url, $com, $home) ?>media/shortcut.png">