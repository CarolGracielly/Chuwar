<?php

class Usuario{

  //Atributos de um usuário
  private $id;
  private $nome;
  private $username;
  private $senha;
  private $paises = NULL;

  //Métodos getter e Setter
  public function setId($id){

    $this->id = $id;
  }

  public function getId(){

    return $this->id;
  }

  public function setNome($nome){

    $this->nome = $nome;
  }

  public function getNome(){

    return $this->nome;
  }

  public function setUsername($username){

    $this->username = $username;
  }

  public function getUsername(){

    return $this->username;
  }

  public function setSenha($senha){

    $this->senha = $senha;
  }

  public function getSenha(){

    return $this->senha;
  }

  public function setPaises($paises){

		$this->paises = $paises;
	}

	public function getPaises(){

		return $this->paises;
	}

}
?>
