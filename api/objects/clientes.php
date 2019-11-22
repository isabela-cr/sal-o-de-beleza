<?php
class clientes{
 
    // database connection and table name
    private $conn;
    private $table_name = "clientes";
 
    // object properties
    public $id;
    public $nome;
    public $telefone;
    public $procedimento;
    public $datadarealizacao;
    public $retorno;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    
    }
function read(){
 
    // select all query
    $query = "SELECT * FROM  
            ". $this->table_name . " c ";
         
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // execute query
    $stmt->execute();
 
    return $stmt;
}
// create product
function create(){
 
    // query to insert record
    $query = "INSERT INTO
                " . $this->table_name . "
            SET
                id=:id, nome=:nome, procedimento=:procedimento, datadarealizacao=:datadarealizacao, retorno=:retorno";
 
    // prepare query
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->id=htmlspecialchars(strip_tags($this->id));
    $this->nome=htmlspecialchars(strip_tags($this->nome));
    $this->procedimento=htmlspecialchars(strip_tags($this->procedimento));
    $this->datadarealizacao=htmlspecialchars(strip_tags($this->datadarealizacao));
    $this->retorno=htmlspecialchars(strip_tags($this->retorno));

 
    // bind values
    $stmt->bindParam(":id", $this->id);
    $stmt->bindParam(":nome", $this->nome);
    $stmt->bindParam(":procedimento", $this->procedimento);
    $stmt->bindParam(":datadarealizacao", $this->datadarealizacao);
    $stmt->bindParam(":retorno", $this->retorno);
  
 
    // execute query
    if($stmt->execute()){
        return true;
    }
 
    return false;
     
}
}
?>