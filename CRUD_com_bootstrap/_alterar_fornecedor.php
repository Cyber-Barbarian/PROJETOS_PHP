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
    <title>Document</title>
</head>
<body>  
    <?php
        include 'conexao.php';
        $id_fornecedor = $_POST['id_fornecedor'];
        $fornecedor = $_POST['novo_fornecedor'];
        
        $sql = "UPDATE fornecedor
        SET fornecedor='$fornecedor' WHERE id_fornecedor='$id_fornecedor'";
        
        $update=mysqli_query($conn,$sql);
    ?>
    <div class="container_sucesso" style="max-width: 600px;">
        <a class="alert alert-success" role="alert" href="lista_de_fornecedores.php">
        Fornecedor alterada com sucesso! Clique para retornar.
        </a>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>

