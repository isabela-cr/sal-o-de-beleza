<?php
class pessoa{

  private $nome;
  private $telefone;
  private $procedimento;


  public function __construct($nome,$telefone,$procedimento){
    $this->nome= $nome;
    $this->telefone= $telefone;
    $this->procedimento= $procedimento;
  }

	

  public function setNome($nome){
           $this->nome = $nome;   
  }

	public function getNome(){
           return $this->nome;
	} 

  public function setTelefone($telefone){
           $this->telefone = $telefone;   
  }

	public function getTelefone(){
           return $this->telefone;
  }
  public function setProcedimento($procedimento){
           $this->procedimento = $procedimento;   
  }

	public function getProcedimento(){
           return $this->procedimento;
	}

  public function __toString(){
      $resultado =
      "Nome:" .$this->nome."<br>".
      "Telefone:" .$this->telefone."<br>".
      "Procedimento:" .$this->procedimento."<br>";

      return $resultado;
  } 
}
