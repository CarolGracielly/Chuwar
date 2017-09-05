<?php

//Setando o Usuário Ativo no momento
$usuario = new Usuario();
$usuario->setId($_SESSION["id"]);
$usuario->setNome($_SESSION["nome"]);
$usuario->setUsername($_SESSION["usuario"]);
$usuario->setSenha($_SESSION["senha"]);

//Imprimindo os 2 jogadores da partida na tela (Usuário e Computador)
echo "<br>".$usuario->getNome()." Vs Computador <br><br>";

//Criando um novo jogo e checando se ha partida
$jogo = new Jogo($usuario);

if ($jogo->checaExistencia() == 0){
  //Implementar Método para criar um novo jogo
  $jogo->setPaisesUsuario();
  $jogo->setPaisesComputador();

  //Definindo Vetores de Retorno para Usuário
  $Vusuario = $jogo->getPaisesUsuario();
  $Vcomputador = $jogo->getPaisesComputador();
}
else{
  //Implementar Método para carregar um jogo existente
}

?>
