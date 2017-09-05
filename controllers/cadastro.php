<?php
if($acao == "cadastrar"){   //Ação do Evento Cadastrar Usuário

            $nome=$_POST["nome"];
            $usuario=$_POST["usuario"];
            $senha=$_POST["senha"];

            //Validação para ver se ha campos vazios
            if(empty($nome)||empty($usuario)||empty($senha)){

                $msg="Há Campos Vazios!";
            }
            else{   //todos campos preenchidos

                     //Senha com poucos digitos (inválida)
                    if(strlen($senha)<8){
                        $msg="Senha muito curta!";
                    }
                    else{
                        //Executa Classe de Cadastro
                        $conectar= new Usuarios;
                        echo"<div class=\"flash\">";
                        $conectar=$conectar->Cadastrar($nome,$usuario,$senha);
                        echo"</div>";
                    }

            }
        }
?>
