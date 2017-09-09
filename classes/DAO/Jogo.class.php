<?php

	class JogoDAO{

		//Atributos
		private $idUsuario = NULL;
		private $Atacante = NULL;
		private $Defensor = NULL;
		private $paisesUs = NULL;
		private $paisesCp = NULL;
		private $OrigemCp = NULL;
		private $AlvoCp = NULL;

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
		  * @param $paisOrigem indice referente a quem ataca
		  * @param $paisDefensor indice referente a quem defende
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
					$nomePais = $this->paisesCp[$DestinoKey]->getNome();
				}
			}

			if($this->ocuparPais($OrigemKey, $DestinoKey)){	//Caso o ataque ocorrer mas você conquistar o país

				return "Você Conquistou o País Inimigo (".$nomePais.")! <br>";
			}
			else{	//Caso o ataque ocorreu mas você perdeu a batalha

				return "Você Falhou em capturar o País (".$nomePais.")! <br>";
			}

		}

		function tomarPais($paisOrigem, $paisDefensor){

			$tropasAliadas = $this->paisesCp[$paisOrigem]->getTropas();	//Recebe número de tropas das forças aliadas (Computador)
			$tropasInimigas = $this->paisesUs[$paisDefensor]->getTropas();	//Recebe número de tropas das forças inimigas (usuário)

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
				$this->paisesUs[$paisDefensor]->setTropas($tropasInimigas);
				$OBJ = $this->paisesUs[$paisDefensor];	//Recuperando o país
				unset($this->paisesUs[$paisDefensor]);	//Removendo-o do computador
				$this->paisesCp[] = $OBJ;

				//Retornando Sucesso para o usuário
				return true;
			}
			else{

				//Atualizando Tropas do Inimigo
				$this->paisesUs[$paisDefensor]->setTropas($tropasInimigas);
				//Retornando fracasso para o usuário
				return false;
			}


		}

		/**
		  * @param $paisOrigem indice referente a quem ataca
		  * @param $paisDefensor indice referente a quem defende
		  * @return retorna true se conquistou o pais ou false se falhou
		  */
		function contraAtacar(){

			foreach ($this->paisesCp as $key => $value) {

				if (isset($this->paisesCp[$key])){
				
					if($value->getID() == $this->OrigemCp){

						//Recuperando informações necessárias
						$OrigemKey = $key;	//Recupera posição no vetor
					}
				}
			}

			foreach ($this->paisesUs as $key => $value) {

					if($value->getID() == $this->AlvoCp){

						//Recuperando informações necessárias
						$DestinoKey = $key;	//Recupera posição no vetor
						$nomePais = $this->paisesUs[$DestinoKey]->getNome();
					}
		
			}

			if($this->tomarPais($OrigemKey, $DestinoKey)){	//Caso o ataque ocorrer mas você conquistar o país

				return "Computador conquistou seu pais (".$nomePais.")! <br>";
			}
			else{	//Caso o ataque ocorreu mas você perdeu a batalha

				return "Computador Falhou em capturar seu País (".$nomePais.")! <br>";
			}

		}

		function calcularEstrategia($possibilidades){
			//Verifica qual é a melhor jogada a ser feita
			$melhor = $possibilidades[0]; //Por padrão a melhor sempre começará sendo a primeira
			$melhorVantagem = 0;

			foreach ($possibilidades as $key => $value) {
				
				$tropasAliadas = $value["tropasAtacante"];
				$tropasInimigas	= $value["tropasDefensor"];

				if ($tropasAliadas - $tropasInimigas > $melhorVantagem){

					$melhorVantagem = $tropasAliadas - $tropasInimigas;
					$melhor = $value;
				}

			}

			//Setando o ataque com melhor vantagem
			$this->OrigemCp = $melhor["atacante"];
			$this->AlvoCp = $melhor["defensor"];

		}

		function carregarPossibilidades(){

			$possibilidades = [];

			//Função que analisa qual é a melhor tatica
          	foreach ($this->paisesCp as $key => $value) {

		            $front = $value->getFronteiras();
		            $listaFronteiras = explode(",", $front);
		            
		            foreach ($listaFronteiras as $item => $valor){

		                foreach ($this->paisesUs as $pais => $p) {

		                  $nomePais = $p->getNome();
		                  $idAtacante = $value->getID();
		                  $idDefensor = $p->getID();
		                  $tropasAtacante = $value->getTropas();
		                  $tropasDefensor = $p->getTropas();


		                  if(strcmp($valor, $nomePais) == 0){
		                    //Possível Ataque
		                  	$possibilidades[] = [
		                  		"atacante" => $idAtacante,
		                  		"defensor" => $idDefensor,
		                  		"tropasAtacante" => $tropasAtacante,
		                  		"tropasDefensor" => $tropasDefensor
		                  	];
		                  }
		                }            
		            }
	           
          }

          return $possibilidades;
         
		}

		function sortearExercitos(){
			//Distribui 6 tropas aleatóriamente para os 2 jogadores

			//Definindo quantos países cad ausuário tem
			$CountUs = count($this->paisesUs) - 1;
			$CountCp = count($this->paisesCp) - 1;

			for ($i = 0; $i < 6; $i++){

				do{
					$pos = rand(0, $CountUs);
					
				}while(!isset($this->paisesUs[$pos]));

				$this->paisesUs[$pos]->incrementar();

			}

			for ($i = 0; $i < 6; $i++){

				do{
					$pos = rand(0, $CountCp);
					
				}while(!isset($this->paisesCp[$pos]));

				$this->paisesCp[$pos]->incrementar();

			}

			return "---Você Recebeu 6 tropas---<br>---Computador Recebeu 6 tropas---<br>";

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