<?php

class Pais{

	private $ID;
	private $Nome;
	private $tropas;
	private $fronteiras;

	//Métodos Getter and Setter
	function setID($id){

		$this->ID = $id;
	}

	function getID(){

		return $this->ID;
	}

	function setNome($nome){

		$this->Nome = $nome;
	}

	function getNome(){

		return $this->Nome;
	}

	function setTropas($Tropas){

		$this->tropas = $Tropas;
	}

	function getTropas(){

		return  $this->tropas;
	}

	function setFronteiras($fronteiras){

		$this->fronteiras = $fronteiras;
	}

	function getFronteiras(){

		return $this->fronteiras;
	}

	function incrementar(){

		$this->tropas++;
	}

	function decrementar(){

		$this->tropas--;
	} 
}

?>