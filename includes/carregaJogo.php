<?php

//Setando o Usuário Ativo no momento
$usuario = new Usuario();
$usuario->setId($_SESSION["id"]);
$usuario->setNome($_SESSION["nome"]);
$usuario->setUsername($_SESSION["usuario"]);
$usuario->setSenha($_SESSION["senha"]);

//Imprimindo os 2 jogadores da partida na tela (Usuário e Computador)
echo "<br><b>".$usuario->getNome()." Vs Computador </b><br><br>";

//Criando um novo jogo e checando se ha partida
$jogo = new Jogo($usuario);

if ($jogo->checaExistencia() == 0){
  //Implementar Método para criar um novo jogo
  $jogo->setPaisesUsuario();
  $jogo->setPaisesComputador();

  //Definindo Vetores de Retorno para Usuário
  $Vusuario = $jogo->getPaisesUsuario();
  $Vcomputador = $jogo->getPaisesComputador();

  //Gravando no Banco
  $jogo->novoJogo($Vusuario, $Vcomputador);
}
else{
  //Implementar Método para carregar um jogo existente
  $jogo->carregaJogo();	

  //Definindo Vetores de Retorno para Usuário
  $Vusuario = $jogo->getPaisesUsuario();
  $Vcomputador = $jogo->getPaisesComputador();
}

?>
