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
// search products

function search($keywords){
 
    // select all query
    $query = "SELECT
                c.name as category_name, p.id, p.nome, p.telefone, p.procedimento, p.datadarealizacao, p.retorno
            FROM
                " . $this->table_name . " p
                LEFT JOIN
                    categories c
                        ON p.category_id = c.id
            WHERE
                p.name LIKE ? OR p.telefone LIKE ? OR c.name LIKE ?
            ORDER BY
                p.retorno DESC";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $keywords=htmlspecialchars(strip_tags($keywords));
    $keywords = "%{$keywords}%";
 
    // bind
    $stmt->bindParam(1, $keywords);
    $stmt->bindParam(2, $keywords);
    $stmt->bindParam(3, $keywords);
 
    // execute query
    $stmt->execute();
 
    return $stmt;
}

}
?>