<?php

	if ($acao =="reset"){

		//Recuperando dados do usuário
        $U = new Usuario();
		$U->setId($_SESSION["id"]);
		
		$msg = "---SEU JOGO FOI REINICIADO---<br>Boa Sorte";
		//Reiniciando o Jogo
		$id = $U->getId();
		$conexao = new DB;
		$conexao=$conexao->getConnection();
		//Inativando o jogo
		$rs = $conexao->prepare("UPDATE jogos SET emJogo = 0 where id_usuario = ? AND emJogo = 1");
		$rs->bindParam(1,$id);
		$rs->execute();

	}

?>