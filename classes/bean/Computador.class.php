<?php

class Computador{

  //Atributos
  private $paises = NULL;

  //Métodos Getter and Setter
  public function setPaises($paises){

		$this->paises = $paises;
	}

	public function getPaises(){

		return $this->paises;
	}

}

?>
