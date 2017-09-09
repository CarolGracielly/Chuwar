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
				
			if (count($paisesCp) > 1){	//Se o computador possuir somente um país e ele foi atacado e perdeu end game para computador
					
					$ataquesPossiveis = $dao->carregarPossibilidades();
					$dao->calcularEstrategia($ataquesPossiveis);

					if (count($paisesUs) > 1){	//Se o computador possuir somente um país e ele foi atacado (com certeza foi) e perdeu end game para usuário

						$msg .= $dao->contraAtacar();
						$msg .= $dao->sortearExercitos();
					}
					else{

						$fim = true;
					}
					
			}
			else{

				$fim = true;

			}


			$dao->atualizarDB();

			if ($fim){

				if (count($paisesCp == 1)){

					$msg = "---FIM DE JOGO---<br>Uma Nova Partida foi Iniciada para você";

					//Reiniciando o Jogo
					$id = $U->getId();
					$conexao = new DB;
			    	$conexao=$conexao->getConnection();

			    	//Primeiramente Recuperando Jogo que estava sendo usado
			    	$rs = $conexao->prepare("UPDATE jogos SET emJogo = 0 where id_usuario = ? AND emJogo = 1");
			    	$rs->bindParam(1,$id);
			    	$rs->execute();


				}
				else if (count($paisesUs) == 1){

					$msg = "---FIM DE JOGO---<br>Uma Nova Partida foi Iniciada para você";

					//Primeiramente Recuperando Jogo que estava sendo usado
			    	$rs = $conexao->prepare("UPDATE jogos SET emJogo = 0 where id_usuario = ? AND emJogo = 1");
			    	$rs->bindParam(1,$id);
			    	$rs->execute();
				}

			}

			
		}        
            
    }

?>