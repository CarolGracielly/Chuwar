<?php

    class Usuarios{

        public function Cadastrar($nome,$usuario,$senha){

            //Tratamento das Variáveis
            $nome=ucwords(strtolower($nome));
            $senha=sha1($senha."Mazurco066");

            //Método inserção com PDO
            $conexao = new DB;
            $conexao=$conexao->getConnection();
            $stmt = $conexao->prepare("INSERT INTO usuarios(nome, usuario, senha) VALUES(?, ?, ?)");
            $stmt->bindParam(1,$nome);
            $stmt->bindParam(2,$usuario);
            $stmt->bindParam(3,$senha);
            if($stmt->execute()){

              $flash="Cadastro Realizado com Sucesso! Fique a Vontade para jogar.";
              //Fechando Conexão
              $conexao = null;
              $stmt = null;

            }
            else{

                $flash="OPS!... ouve algum erro em nosso Sistema. Por Favor contate administrador!";
            }

            //retorno para usuário
            echo $flash;

        }

        public function Login($usuario,$senha){

            //Método inserção com PDO
            $conexao = new DB;
            $conexao=$conexao->getConnection();
            $rs = $conexao->prepare("SELECT * FROM usuarios WHERE usuario = ? and senha = ?");
            $rs->bindParam(1, $usuario);
            $rs->bindParam(2, $senha);
            if($rs->execute()){
                if($rs->rowCount() > 0){
                    //Sucesso no login
                    $flash="Login Correto";
                    //Passando dados para um array e do array para info da sessão
                    $row = $rs->fetch(PDO::FETCH_OBJ);
                    $_SESSION["id"]=$row->ID;
                    $_SESSION["usuario"]=$row->usuario;
                    $_SESSION["nome"]=$row->nome;
                    $_SESSION["senha"]=$row->senha;
                    setcookie("logado",1);

                    //Mensagem de boas vindas para o usuário
                    $name=$row->nome;
                    $row=null;
                    echo $flash;
                    echo " Bem vindo $name";
                }
                else{
                    //Falha no login
                    $flash="Usuário ou Senha incorreto(s)";
                    echo $flash;
                }
            }
            else{
                //Falha conexão com banco
                $flash="OPS!... ouve algum erro em nosso Sistema. Por Favor contate administrador!";
                echo $flash;
            }

            //Finalizando conexão com banco
            $con = new DB;
            $con=$con->closeConnectionLogin($conexao,$rs);


        }

    }

?>
