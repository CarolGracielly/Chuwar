<?php
if($acao=="logar"){    //Ação do Evento de Logar no Sistema

            $usuario=$_POST["usuario"];
            $senha=sha1($_POST["senha"]."Mazurco066");

            //Validação para ver se ha campos vazios
            if(empty($usuario)||empty($senha)){
                $msg="Há Campos Vazios";
            }
            else{

                //Tudo Correto pronto para fazer login
                $conectar= new Usuarios;
                echo"<div class=\"flash\">";
                $conectar=$conectar->Login($usuario,$senha);
                echo"</div>";

            }

        }
?>
