<?php

include_once("conecta.php");

$nome = filter_input(INPUT_POST,"nome", FILTER_SANITIZE_STRING);
$telefone = filter_input(INPUT_POST,"telefone", FILTER_SANITIZE_STRING);
$procedimento = filter_input(INPUT_POST,"procedimento", FILTER_SANITIZE_STRING);
$datadarealizacao = filter_input(INPUT_POST,"datadarealizacao", FILTER_SANITIZE_STRING);
$datadoretorno = filter_input(INPUT_POST,"datadoretorno", FILTER_SANITIZE_STRING);
$result_usuario= "INSERT INTO (nome,telefone,procedimento, datadarealizacao, datadoretorno) VALUES ($nome, $telefone,$procedimento, $datadarealizacao, $datadoretorno);
$resultado_usuario = mysqli_query() 

