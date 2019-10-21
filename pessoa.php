<?php
class pessoa implements JsonSerializable {
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
public function jsonSerialize() {
 return [
  'nome' => $this->nome,
  'telefone' => $this->telefone,
  'procedimento' => $this->procedimento

           ];

}
}

class clientes extends pessoa{
public function newMethod()
{
 //echo "De um novo método na classe". __CLASS__;


}
}
 

 ("pessoa.php");
$pessoa1 = new pessoa ("Isabela",33987170,"Corte");
$pessoa2 = new pessoa("Fatima",33307077,"Escova");
$clientes = new clientes("Nome","Telefone","Procedimento");
$json = json_encode($pessoa1);
//echo $pessoa1;
echo "<br>";
echo $json;
$json = json_encode($pessoa2);
//echo $pessoa2;
echo "<br>";
echo $json;
//$clientes = newMethod;
