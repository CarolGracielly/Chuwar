<?php

	if($acao=="atacar"){   //Método de aprovar usuário

		//Definindo o relatório de retorno
		$msg = "RELATÓRIO DE BATALHA <br>";
            
        //Recuperando ID's dos paises atacante e defensor
        $Atacante=$_GET["idAtacante"];
        $Defensor=$_GET["idDefensor"];

        //Recuperando dados do usuário
        $U = new Usuario();
		$U->setId($_SESSION["id"]);

		//Instanciando um jogo 
		$Batalha = new Jogo($U);

		//Verifica se o jogo realmente existe
		if ($Batalha->checaExistencia() == 1){

			//Carregando Jogo para ver quais países necessitam de alteração
			$Batalha->carregaJogo();

			//Carrega os países a serem alterados
			$paisesUs = $Batalha->getPaisesUsuario();
			$paisesCp = $Batalha->getPaisesComputador();

			//Instanciando Data Acess Object
			$dao = new JogoDAO($U->getId(),$paisesUs, $paisesCp, $Atacante, $Defensor);

			//Realizando ações ofensivas (OBS - #$!%$#@$%)
			$msg .= $dao->atacarInimigo();
			$dao->verificaAtaque();
			$msg .= $dao->contraAtacar();
			$dao->sortearExercitos();
			$msg .= "---Você Recebeu 6 tropas---<br>";
			$msg .= "---Computador Recebeu 6 tropas---<br>";
			$dao->atualizarDB();
		}        
            
    }

?>