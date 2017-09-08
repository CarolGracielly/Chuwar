<?php

	class JogoDAO{

		//Atributos
		private $Atacante = NULL;
		private $Defensor = NULL;
		private $paisesUs = NULL;
		private $paisesCp = NULL;

		//Método Construtor Padrão da Classe
		function __construct($PU, $PC, $At, $Df){

			$this->paisesUs = $PU;
			$this->paisesCp = $PC;
			$this->Atacante = $At;
			$this->Defensor = $Df;
		}

		//Métodos de Classe

	}

?>