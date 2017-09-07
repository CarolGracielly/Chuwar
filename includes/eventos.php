<?php

    //Startando uma sessão
    ob_start();
    session_start();

    //globais
    $home="http://localhost/ChuvaInc/ChuWar/";
    $title="Chuwar - the Game";
    $startaction="";
    $msg="";
    if(isset($_GET["acao"])){

        $acao=$_GET["acao"];
        $startaction=1;
    }

    //INCLUDE DAS CLASSES PARA USO DE CONEXÕES COM O BANCO
    include("classes/DAO/DB.class.php");    //Classe de Conexão
    include("classes/DAO/Usuarios.class.php");  //Classe DAO de Usuários

    //INCLUDE DAS CLASSES PARA USO DE MANIPULAÇÃO DE DADOS
    include("classes/bean/Usuario.class.php");  //Classe Responsável para armazenar dados do usuário logado e seus países
    include("classes/bean/Computador.class.php"); //Classe Responsável para armazenar países do computador
    include("classes/bean/Pais.class.php"); //Classe Responsável por servir como estrutura para vetor de retornopara usuário
    include("classes/bean/Jogo.class.php"); //Classe Responsável de controlar o fluxo do jogo

    //OBS- Conexão com banco realizada somente em classes DAO

    //Metodo de Cadastro
    if($startaction == 1){

        //Métodos de Controle de Usuário
        include("controllers/cadastro.php");
        include("controllers/logar.php");
        include("controllers/logout.php");

    }

//Método de Checagem
if(isset($_SESSION["usuario"]) && isset($_SESSION["senha"])){ //função de verificação de existencia de uma sessão
    $logado=1;
}

//var de estilo
if($msg == ""){
    $display="display:none;";
}
else{
    $display="display:block;";
}


?>
