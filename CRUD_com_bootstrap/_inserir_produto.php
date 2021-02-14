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
        $numero_produto=$_POST['nro_produto'];
        $nome_produto=$_POST['nome_produto'];
        $quantidade_produto=$_POST['qtd_produto'];
        $tipo_produto=$_POST['tipo_produto'];
        $fornecedor_produto=$_POST['fornecedor_produto'];

        include "conexao.php"; //traz o conteudo do script de conexão. poderia ser require tb.
        //variável de inserção
        $sql="insert into estoque (numero_produto, nome_produto, categoria, quantidade, fornecedor) 
        VALUES ($numero_produto, '$nome_produto', '$tipo_produto', $quantidade_produto, '$fornecedor_produto')";
        //echo "$sql";
        //Inserção
        $inserir_produto= mysqli_query ($conn,$sql);
    ?>
    <div class="container_sucesso">
        
        <a class="alert alert-success" role="alert" href="adicionar_produto.php">
            Produto cadastrado com sucesso! Clique para retornar.
        </a>

    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>


