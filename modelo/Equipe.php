<?php

class Equipe {

  public $nome;
  public $idTecno;

  public function __construct($nome, $idTecno) {
      $this->nome = $nome;
      $this->idTecno = $idTecno;
  }
}

?>