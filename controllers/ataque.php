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
				
			if (count($paisesCp) > 1){	//Se o computador possuir mais de 1 pais ele vai calcular ataque
					
					$ataquesPossiveis = $dao->carregarPossibilidades();
					$dao->calcularEstrategia($ataquesPossiveis);
					
					if (count($paisesUs) > 1){	//Se o usuário tiver mais de 1 pais ele ira contra atacar

						$msg .= $dao->contraAtacar();
						$msg .= $dao->sortearExercitos();
					}
					
			}
			
			$dao->atualizarDB();

			//Verificação do Vencedor
			if (count($paisesCp) == 1){

					$msg = "---FIM DE JOGO---<br>---VOCÊ ENCURRALOU OS EXERCÍTOS INIMIGOS---<br>Uma Nova Partida foi Iniciada para você";
					//Reiniciando o Jogo
					$id = $U->getId();
					$conexao = new DB;
			    	$conexao=$conexao->getConnection();
			    	//Inativando o jogo
			    	$rs = $conexao->prepare("UPDATE jogos SET emJogo = 0 where id_usuario = ? AND emJogo = 1");
			    	$rs->bindParam(1,$id);
			    	$rs->execute();
			}
			if (count($paisesUs) == 1){

					$msg = "---FIM DE JOGO---<br>---SEU UNICO PAÍS FICOU TOTALMENTE VUNERÁVEL!---<br>Uma Nova Partida foi Iniciada para você";
					//Reiniciando o Jogo
					$id = $U->getId();
					$conexao = new DB;
			    	$conexao=$conexao->getConnection();
			    	//Inativando o jogo
			    	$rs = $conexao->prepare("UPDATE jogos SET emJogo = 0 where id_usuario = ? AND emJogo = 1");
			    	$rs->bindParam(1,$id);
			    	$rs->execute();
			}
			
		}        
            
    }
?>