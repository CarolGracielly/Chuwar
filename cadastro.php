<?php
    //ini_set('display_erros', 0);
    //error_reporting(0);
    include("includes/eventos.php");

    if(isset($logado)){
        include("views/home.php");
    }
    else{
        include("views/cadastro.php");
    }
?>

