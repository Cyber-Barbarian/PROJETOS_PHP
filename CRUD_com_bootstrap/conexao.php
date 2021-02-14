<?php

$servername = "localhost";
$username = "root";
$username ="RafaelProenca";
$password = "busHido01";
$database = "teste_estoque";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
mysqli_set_charset($conn,'utf8'); //deve ser colocado para evitar erros de encode entre o script e a tabela 

// // Check connection
// if (!$conn) {
//   die("Connection failed: " . mysqli_connect_error());
// }
// echo "Connected successfully";
?>
