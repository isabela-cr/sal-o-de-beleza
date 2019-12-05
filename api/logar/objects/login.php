<?php
class clientes{
 
    // database connection and table name
    private $conn;
    private $table_name = "login";
 
    // object properties
    public $id;
    public $usuario;
    public $senha;

 
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
                id=:id, usuario=:usuario, senha=:senha";
 
    // prepare query
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->id=htmlspecialchars(strip_tags($this->id));
    $this->usuario=htmlspecialchars(strip_tags($this->usuario));
    $this->senha=htmlspecialchars(strip_tags($this->senha));

 
    // bind values
    $stmt->bindParam(":id", $this->id);
    $stmt->bindParam(":usuario", $this->usuario);
    $stmt->bindParam(":senha", $this->senha);

  
 
    // execute query
    if($stmt->execute()){
        return true;
    }
 
    return false;
     
}
// delete the product
function delete(){
 
    // delete query
    $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
 
    // prepare query
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->id=htmlspecialchars(strip_tags($this->id));
 
    // bind id of record to delete
    $stmt->bindParam(1, $this->id);
 
    // execute query
    if($stmt->execute()){
        return true;
    }
 
    return false;
     
}
// update the product
function update(){
 
    // update query
    $query = "UPDATE
                " . $this->table_name . "
            SET
                usuario = :usuario
                
            WHERE
                id = :id";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->id=htmlspecialchars(strip_tags($this->id));
    $this->usuario=htmlspecialchars(strip_tags($this->usuario));
    
 
    // bind new values
    $stmt->bindParam(":id", $this->id);
    $stmt->bindParam(":usuario", $this->usuario);
   
 
    // execute the query
    if($stmt->execute()){
        return true;
    }
 
    return false;
}
}
?>