<?php

include ("pessoa.php");

$pessoa1 = new pessoa ("Isabela",33987170,"Corte");
$pessoa2 = new pessoa("Fatima",33307077,"Escova");

$json = json_encode($pessoa1);
echo $pessoa1;
echo "<br>";
echo $json;


$json = json_encode($pessoa2);
echo $pessoa2;
echo "<br>";
echo $json;


?>

