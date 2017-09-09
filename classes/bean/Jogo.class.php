<?php

class Jogo{

  //Atributos
  private $usuario;
  private $computador;
  private $mensagem;
  private $Vpaises = NULL;

  //Método construtor da classe
  function __construct(Usuario $user){

    //Definindo usuário logado e computador que jogará contra o jogador
    $this->usuario = $user;
    $this->computador = new Computador();

    //Recuperando os países do banco de dados
    $this->Vpaises = $this->recuperaPaises();

  }

  //Metodos Getter and Setter()
  function setPaisesUsuario(){
    //Função para sortear países para o usuário
    $this->usuario->setPaises($this->sortearPaises());
  }

  function setPaisesComputador(){
    //Função para sortear paises para o computador
    $this->computador->setPaises($this->sortearPaises());
  }

  function getPaisesUsuario(){
    //Função para retornar paises do usuário
    return $this->usuario->getPaises();
  }

  function getPaisesComputador(){
    //Função para Retornar países do computador
    return $this->computador->getPaises();
  }

  //Métodos de classe

  /**
    * @return retorna 0 se não tiver nenhuma partida e 1 se ja existir pratida
    */
  function checaExistencia(){
    //Método que checa se há um jogo em andamento para esse usuário - OK
    $conexao = new DB;
    $conexao=$conexao->getConnection();
    $rs = $conexao->prepare("SELECT * FROM jogos where id_usuario = ? and emJogo = 1");
    $id = $this->usuario->getId();
    $rs->bindParam(1, $id);
    if($rs->execute()){

        if($rs->rowCount() > 0){

          return 1;

        }
        else{

          return 0;

        }

    }
    else{ //Erro de banco de dados

      $flash="OPS!... ouve algum erro em nosso Sistema. Por Favor contate administrador!";
      echo $flash;

    }

  }

  /**
    * @return retorna os países disponiveis no banco
    */
  function recuperaPaises(){
    //Função que pega os países do banco e jogam no array de países da classe - OK
    $conexao = new DB;
    $conexao=$conexao->getConnection();
    $rs = $conexao->prepare("SELECT * FROM paises");
    if ($rs->execute()){

      $paises = [];
        
      while($pais = $rs->fetch(PDO::FETCH_OBJ)){

        $objeto = new Pais();
        $objeto->setID($pais->ID);
        $objeto->setNome($pais->Nome);
        $objeto->setTropas($pais->tropas);
        $objeto->setFronteiras($pais->fronteiras);
        $paises[] = $objeto; 
      }

      return $paises;

    }
    else{

      $flash="OPS!... ouve algum erro em nosso Sistema. Por Favor contate administrador!";
      echo $flash;

    }

  }

  /**
    * @return retorna um vetor de países para o jogador ou computador
    */
  function sortearPaises(){
    //função que sorteia paises para usuário e computador
    $selecao = array_rand($this->Vpaises, 6);
		$lista = [];

			foreach ($selecao as $key){

				$lista[] = $this->Vpaises[$key];
				unset($this->Vpaises[$key]);

			}

    return $lista;

  }

  /**
    * @param paisesUsuario recebe o vetor de países que pertence ao usuário
    * @param paisesComputador recebe o vetor de países que pertence ao computador
    */
  function novoJogo($paisesUsuario, $paisesComputador){
    //Função que iniciará um novo jogo , distribuirá os paises e salvara no banco a nova partida
    $conexao = new DB;
    $conexao=$conexao->getConnection();
    $rs = $conexao->prepare("INSERT INTO jogos(id_usuario, emJogo) VALUES(?, 1)");
    $id = $this->usuario->getId();
    $rs->bindParam(1,$id);
    if ($rs->execute()){

      $conexao = new DB;
      $conexao=$conexao->getConnection();
      $rs = $conexao->prepare("Select ID from jogos where id_usuario = ? and emJogo = 1");
      $rs->bindParam(1,$id);
      $rs->execute();
      $row = $rs->fetch(PDO::FETCH_OBJ);
      $idJogo = $row->ID;

      foreach ($paisesUsuario as $key => $value) {

        //Definindo Variáveis para o php parar de encher o saco
        $idPais = $value->getID();
        $nomePais = $value->getNome();
        $tropasPais = $value->getTropas();
        $fronteirasPais = $value->getFronteiras();

        $pertence = "Jogador";
        $rs = $conexao->prepare("INSERT INTO status_paises(Jogo_ID, Pais_ID, Nome, tropas, Pertence, fronteiras) VALUES(?,?,?,?,?,?)");
        $rs->bindParam(1,$idJogo);
        $rs->bindParam(2,$idPais);
        $rs->bindParam(3,$nomePais);
        $rs->bindParam(4,$tropasPais);
        $rs->bindParam(5,$pertence);
        $rs->bindParam(6,$fronteirasPais);
        $rs->execute();
      }

      foreach ($paisesComputador as $key => $value) {

        //Definindo Variáveis para o php parar de encher o saco
        $idPais = $value->getID();
        $nomePais = $value->getNome();
        $tropasPais = $value->getTropas();
        $fronteirasPais = $value->getFronteiras();

        $pertence = "Computador";
        $rs = $conexao->prepare("INSERT INTO status_paises(Jogo_ID, Pais_ID, Nome, tropas, Pertence, fronteiras) VALUES(?,?,?,?,?,?)");
        $rs->bindParam(1,$idJogo);
        $rs->bindParam(2,$idPais);
        $rs->bindParam(3,$nomePais);
        $rs->bindParam(4,$tropasPais);
        $rs->bindParam(5,$pertence);
        $rs->bindParam(6,$fronteirasPais);
        $rs->execute();
      }

    }
    else{
      //erro ao salvar dados, defeito está na conexão com o banco
      $flash="OPS!... ouve algum erro em nosso Sistema. Por Favor contate administrador!";
      echo $flash;
    }

  }

  function carregaJogo(){
    //função que carrega um jogo existente, restaurando da ultima rodada feita
    $conexao = new DB;
    $conexao=$conexao->getConnection();
    $rs = $conexao->prepare("Select ID from jogos where id_usuario = ? and emJogo = 1");
    $id = $this->usuario->getId();  //Recupera id do usuário
    $rs->bindParam(1,$id);
    if ($rs->execute()){
      
      $row = $rs->fetch(PDO::FETCH_OBJ);
      $idJogo = $row->ID;  //Recupera ID do jogo

      //Recuperando Países do usuário
      $rs = $conexao->prepare("SELECT * from status_paises WHERE Jogo_ID = ? and Pertence = 'Jogador'");
      $rs->bindParam(1,$idJogo);
      $rs->execute();
      if($rs->rowCount() > 0){

        $paisesUs = [];
        while($pais = $rs->fetch(PDO::FETCH_OBJ)){

          $objeto = new Pais();
          $objeto->setID($pais->Pais_ID);
          $objeto->setNome($pais->Nome);
          $objeto->setTropas($pais->tropas);
          $objeto->setFronteiras($pais->fronteiras);
          $paisesUs[] = $objeto; 
        }

        $this->usuario->setPaises($paisesUs);
      }

      //Recuperando Países do Computador
      $rs = $conexao->prepare("SELECT * from status_paises WHERE Jogo_ID = ? and Pertence = 'Computador'");
      $rs->bindParam(1,$idJogo);
      $rs->execute();
      if($rs->rowCount() > 0){
        
        $paisesCp = [];
        while($pais = $rs->fetch(PDO::FETCH_OBJ)){

          $objeto = new Pais();
          $objeto->setID($pais->Pais_ID);
          $objeto->setNome($pais->Nome);
          $objeto->setTropas($pais->tropas);
          $objeto->setFronteiras($pais->fronteiras);
          $paisesCp[] = $objeto; 
        }

        $this->computador->setPaises($paisesCp);
      }
    

    }
    else{
      //erro ao carregar dados, defeito está na conexão com o banco
      $flash="OPS!... ouve algum erro em nosso Sistema. Por Favor contate administrador!";
      echo $flash;
    }

  }

}

 ?>
