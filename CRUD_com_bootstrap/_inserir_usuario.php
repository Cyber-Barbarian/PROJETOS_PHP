<?php 
session_start();
require 'logout.php';
testTimeOut();?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="css/estilo.css" rel="stylesheet">
    <title>Confirmação de envio</title>
</head>
<body>
<?php
include 'conexao.php';
include 'scripts/password.php';

$nome_usuario=$_POST['nomeusuario'];
$email=$_POST['email_user'];
$senha=$_POST['pwdusuario'];
$nivel_de_acesso=$_POST['nivelusuario'];
$status='Ativo';

$sql="insert into usuarios (nome_usuario, email, senha,nivel_de_acesso,Status) values ('$nome_usuario', '$email', sha1('$senha'),'$nivel_de_acesso','$status') ";

$inserir=mysqli_query($conn, $sql);

?>

<div class="container_sucesso">
        <a class="alert alert-success" role="alert" href="cadastro_de_usuario.php">
            Novo Usuário cadastrado com sucesso! Clique para retornar.
        </a>

    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>