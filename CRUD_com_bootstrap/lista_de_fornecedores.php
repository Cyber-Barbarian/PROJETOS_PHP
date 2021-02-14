<?php 
session_start();
require 'logout.php';
testTimeOut();?>
<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="css/estilo.css" rel="stylesheet">
    <title>Listagem de Categorias</title>
</head>
<body>
    
    <div id="container" style="max-width: 400px;margin-left: auto; margin-right: auto;"> 
    <h1>Lista de Produtos</h1><br>
    <div style="text-align:right;">
        <a href="menu.php" class="btn btn-primary" id="botao_voltar">Voltar</a><br>
    </div>
        <table class="table table-hover">
            <thead>
            <tr>
            
            <th scope="col">Fornecedores</th>
            
            
            </tr>
        </thead>
        <tbody>
            <?php
                require "conexao.php";
                $sql = "select * from fornecedor";
                $busca=mysqli_query($conn, $sql);
                
                while ($array = mysqli_fetch_array($busca)) {
                    $id_fornecedor=$array['id_fornecedor'];
                    $fornecedor= $array['fornecedor'];
                    ?>

                    <tr>
                    <td><?php echo "$fornecedor";?></td>
                    <td>
                    <a class="btn btn-outline-warning btn-sm" style="color:black" href="editar_fornecedor.php?id=<?php echo $id_fornecedor?>" role="button"><i class="fas fa-edit"></i>&nbsp;Alterar dados</a>
                       <!--testear aqui inserir um alerta em javascript do tipo "deseja realmente cancelar?" >> ok ; Cancelar --> 
                    <a class="btn btn-outline-danger btn-sm" style="color:black" href="deletar_fornecedor.php?id=<?php echo $id_fornecedor?>" role="button"><i class="far fa-trash-alt"></i>&nbsp;Remover</a>
                    </td>
                    </tr>
                <?php } ?>
            
                
            
        </tbody>
    </table>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/459f661b70.js" crossorigin="anonymous"></script>
</body>
</html>