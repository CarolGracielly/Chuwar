<?php

    if($acao=="logout"){   //para fazer logout no sistema
            
            setcookie("logado","");
            unset($_SESSION["email"],$_SESSION["nome"],$_SESSION["nivel"],$_SESSION["senha"]);
            
        }

?>