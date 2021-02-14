<?php 
session_start();
require 'logout.php';
testTimeOut();?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-16">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="css/estilo.css" rel="stylesheet">
</head>
<body>

<form  method="post" action="_inserir_produto.php" id="formulario_cadastro" accept-charset="latin-1">
<h4>Formulário de cadastro:</h4>
    <div class="container">
    <div style="text-align:right;">
        <a href="menu.php" class="btn btn-primary" id="botao_voltar">Voltar</a><br>
    </div>
    <div class="mb-3">
        <label>Número do produto</label>
        <input type="number" class="form-control" name="nro_produto" required autocomplete="off">
        <!-- adicionar checkboxes que se marcam com check se o campo está ok em js
        <div class="checkbox_campo">
            <input class="form-check-input" type="checkbox" value="false" id="checkbox_campo" disabled>
        </div>    -->
    </div>
    <div class="mb-3">
        <label>Nome do produto</label>
        <input type="text" class="form-control" name="nome_produto" required autocomplete="off">
    </div>
    <div class="mb-3">
        <label>Quantidade do produto</label>
        <input type="number" class="form-control" name="qtd_produto" required autocomplete="off">
    </div>
    <div class="mb-3">
        <select class="form-select" aria-label="Default select example" name="tipo_produto" required autocomplete="off"> 
            <option value="" selected>Selecione a categoria</option>
            <?php
                include 'conexao.php';
                $sql="SELECT * FROM teste_estoque.CATEGORIA";
                //echo $sql;
                $selecao_categorias=mysqli_query($conn, $sql);

                while ($array_categorias=mysqli_fetch_array($selecao_categorias)) {
                    $categoria_selecionada=utf8_encode($array_categorias['categoria']);
                    echo"<option value= '$categoria_selecionada'>$categoria_selecionada</option>";
                }

                //o php não permite esse tipo de loop com mysqli, diferente do python
                //$array_categorias = mysqli_fetch_array($selecao_categorias);
                //foreach ($array_categorias as $categ){
                //    $categoria_selecionada=$categ['categoria'];
                //    echo"<option value= '$categoria_selecionada'>$categoria_selecionada</option>";
                //};
            ?>
            
            <!--
            <option value="Periféricos">Periféricos</option>
            <option value="Hardware">Hardware</option>
            <option value="Software">Software</option>
            <option value="Celulares">Celulares</option>
            SUPERADO!-->
        </select>
    </div>
    <div class="mb-3">
        <select class="form-select" aria-label="Default select example" name="fornecedor_produto" required>
            <option value="" selected>Fornecedor</option>
            <?php
            include 'conexao.php';
            $sql="select * from fornecedor";
            $query=mysqli_query($conn,$sql);
            
            while ($array_fornecedor = mysqli_fetch_array($query)){
                $fornecedor_x=$array_fornecedor['fornecedor'];
                echo "<option value='$fornecedor_x'>$fornecedor_x</option>";
                # code...
            }

            ?>
            <!--<option value="Fornecedor A">Fornecedor A</option>
            <option value="Fornecedor B">Fornecedor B</option>
            <option value="Fornecedor C">Fornecedor C</option>-->
        </select>
    </div>
    <div style="text-align : right;">
        <button class="btn btn-success" id="botao_cadastro_1" type="submit">Cadastrar</button>
    </div>
    
    </div>
</form> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>