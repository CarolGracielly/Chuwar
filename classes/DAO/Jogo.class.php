<?php

	class JogoDAO{

		//Atributos
		private $idUsuario = NULL;
		private $Atacante = NULL;
		private $Defensor = NULL;
		private $paisesUs = NULL;
		private $paisesCp = NULL;

		//Método Construtor Padrão da Classe
		function __construct($id, $PU, $PC, $At, $Df){

			$this->idUsuario = $id;
			$this->paisesUs = $PU;
			$this->paisesCp = $PC;
			$this->Atacante = $At;
			$this->Defensor = $Df;
		}

		//Métodos de Classe

		/*
			Aqui serão definidos todos os métodos
			que se referem a atacar países e defender.
			Essa Classe salvara o jogo na tabela Status_Paises
			com o método salvarJogo mas antes disso manipulara 
			os 2 vetores ($paisesUs e $paisesCp) para que se
			manipule os países corretamente para os 2 jogadores.
		*/

		/**
		  * @param $paisOrigem objeto do tipo país referente a quem ataca
		  * @param $paisDefensor objeto do tipo país referente a quem defende
		  * @return retorna true se conquistou o pais ou false se falhou
		  */
		function ocuparPais($paisOrigem, $paisDefensor){

			$tropasAliadas = $this->paisesUs[$paisOrigem]->getTropas();	//Recebe número de tropas das forças aliadas
			$tropasInimigas = $this->paisesCp[$paisDefensor]->getTropas();	//Recebe número de tropas das forças inimigas

			for ($i = 1; $i <= $tropasAliadas; $i++){
				//Realizando o ataque ao país inimigo
				$dado = rand(1, 10);

				if ($dado > 5){

					$tropasInimigas--;
				}
			}

			if ($tropasInimigas <= 0){

				$tropasInimigas = 1;	//Ocupa o país deixando um soldado no país ocupado

				//Transferindo o país para o novo dono
				$this->paisesCp[$paisDefensor]->setTropas($tropasInimigas);
				$OBJ = $this->paisesCp[$paisDefensor];	//Recuperando o país
				unset($this->paisesCp[$paisDefensor]);	//Removendo-o do computador
				$this->paisesUs[] = $OBJ;

				//Retornando Sucesso para o usuário
				return true;
			}
			else{

				//Atualizando Tropas do Inimigo
				$this->paisesCp[$paisDefensor]->setTropas($tropasInimigas);
				//Retornando fracasso para o usuário
				return false;
			}

		}

		function atacarInimigo(){

			foreach ($this->paisesUs as $key => $value) {
				
				if($value->getID() == $this->Atacante){

					//Recuperando informações necessárias
					$OrigemKey = $key;	//Recupera posição no vetor
				}
			}

			foreach ($this->paisesCp as $key => $value) {
				
				if($value->getID() == $this->Defensor){

					//Recuperando informações necessárias
					$DestinoKey = $key;	//Recupera posição no vetor
				}
			}

			if($this->ocuparPais($OrigemKey, $DestinoKey)){	//Caso o ataque ocorrer mas você conquistar o país

				$msg = "Você Conquistou o País Inimigo!";
			}
			else{	//Caso o ataque ocorreu mas você perdeu a batalha

				$msg = "Você Falhou o ataque contra o País Inimigo!";
			}

		}

		function sortearExercitos(){

		}

		function atualizarDB(){

    		
			//Recuperando Save do jogo no banco de dados
			$id = $this->idUsuario;
      		$conexao = new DB;
		    $conexao=$conexao->getConnection();
		    $rs = $conexao->prepare("Select ID from jogos where id_usuario = ? and emJogo = 1");
		    $rs->bindParam(1,$id);
		    if ($rs->execute()){
		    	
		    	$row = $rs->fetch(PDO::FETCH_OBJ);
		    	$idJogo = $row->ID;

		      	foreach ($this->paisesUs as $key => $value) {

			        //Definindo Variáveis para o php parar de encher o saco
			        $tropas = $value->getTropas();
			        $pertence = "Jogador";
			        $paisId = $value->getID();

			        $rs = $conexao->prepare("UPDATE status_paises SET tropas = ?, Pertence = ? WHERE Jogo_ID = ? and Pais_ID = ?");
			        $rs->bindParam(1,$tropas);
			        $rs->bindParam(2,$pertence);
			        $rs->bindParam(3,$idJogo);
			        $rs->bindParam(4,$paisId);
			        $rs->execute();
		      	}

		      	foreach ($this->paisesCp as $key => $value) {

			        //Definindo Variáveis para o php parar de encher o saco
			        $tropas = $value->getTropas();
			        $pertence = "Computador";
			        $paisId = $value->getID();

			        $rs = $conexao->prepare("UPDATE status_paises SET tropas = ?, Pertence = ? WHERE Jogo_ID = ? and Pais_ID = ?");
			        $rs->bindParam(1,$tropas);
			        $rs->bindParam(2,$pertence);
			        $rs->bindParam(3,$idJogo);
			        $rs->bindParam(4,$paisId);
			        $rs->execute();
		      	}

    		}
    		else{

      			//erro ao salvar dados, defeito está na conexão com o banco
      			$flash="OPS!... ouve algum erro em nosso Sistema. Por Favor contate administrador!";
      			echo $flash;
    		}

	}

	}

?>