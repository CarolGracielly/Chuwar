<?php

	if($acao=="atacar"){   //Método de aprovar usuário

		//Definindo o relatório de retorno
		$msg = "RELATÓRIO DE BATALHA <br>";
		$fim = false;
            
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
				
			if (count($paisesCp) > 1){
					
					$ataquesPossiveis = $dao->carregarPossibilidades();
					$dao->calcularEstrategia($ataquesPossiveis);
					$msg .= $dao->contraAtacar();
					$msg .= $dao->sortearExercitos();
			}
			else{

				$fim = true;

			}

			//Veridicação Final para ver se usuário foi ou não aniquilado
			if (count($paisesUs) == 0){

				$fim = true;
			}

			$dao->atualizarDB();

			if ($fim){

				if (count($paisesCp == 0)){

					$msg = "---VOCE GANHOU---<br>Uma Nova Partida foi Iniciada para você";

					//Reiniciando o Jogo
					$id = $U->getId();
					$conexao = new DB;
			    	$conexao=$conexao->getConnection();

			    	//Primeiramente Recuperando Jogo que estava sendo usado
			    	$rs = $conexao->prepare("UPDATE jogos SET emJogo = 0 where id_usuario = ? AND emJogo = 1");
			    	$rs->bindParam(1,$id);
			    	$rs->execute();


				}
				else if (count($paisesUs) == 0){

					$msg = "---VOCE PERDEU---<br>Uma Nova Partida foi Iniciada para você";

					//Primeiramente Recuperando Jogo que estava sendo usado
			    	$rs = $conexao->prepare("UPDATE jogos SET emJogo = 0 where id_usuario = ? AND emJogo = 1");
			    	$rs->bindParam(1,$id);
			    	$rs->execute();
				}

			}

			
		}        
            
    }

?>