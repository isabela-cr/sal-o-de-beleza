<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
include_once '../config/database.php';
 
// instantiate product object
include_once '../objects/clientes.php';
 
$database = new Database();
$db = $database->getConnection();
 
$clientes = new Clientes($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// make sure data is not empty
if(
    !empty($data->id) &&
    !empty($data->nome) &&
    !empty($data->telefone) &&
    !empty($data->procedimento) &&
    !empty($data->datadarealizacao) &&
    !empty($data->retorno)
){
 
    // set product property values
    $clientes->id = $data->id;
    $clientes->nome = $data->nome;
    $clientes->telefone = $data->telefone;
    $clientes->procedimento = $data->procedimento;
    $clientes->datadarealizacao = $data->datadarealizacao;
    $clientes->retorno = $data->retorno;

 
    // create the product
    if($clientes->create()){
 
        // set response code - 201 created
        http_response_code(201);
 
        // tell the user
        echo json_encode(array("message" => "Product was created."));
    }
 
    // if unable to create the product, tell the user
    else{
 
        // set response code - 503 service unavailable
        http_response_code(503);
 
        // tell the user
        echo json_encode(array("message" => "Unable to create product."));
    }
}
 
// tell the user data is incomplete
else{
 
    // set response code - 400 bad request
    http_response_code(400);
 
    // tell the user
    echo json_encode(array("message" => "Unable to create product. Data is incomplete."));
}
?>