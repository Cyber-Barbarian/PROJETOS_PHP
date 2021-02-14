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
    require 'conexao.php';
    $id=$_POST['id_usuario'];
    $nivelusuario=$_POST['nivelusuario'];
    $nome_usuario=$_POST['nome_usuario'];

    $update = "UPDATE usuarios SET nivel_de_acesso='$nivelusuario', Status = 'Ativo' WHERE id_usuario='$id'";

    //$atualizacao=mysqli_query($conn,$update);
    if ($nivelusuario == 0){
        echo "
            <div class='container_sucesso' style='max-width: auto;'>
            <h3>É preciso dar um nível de acesso ao usuário!</h3><br><br><br>    
            <a class='alert alert-warning' role='alert' href='aprovar_usuarios.php'>
                Clique para retornar.
                </a>
            </div>
            ";
    }else{
    //echo "$update";
    $aprovar=mysqli_query($conn,$update);
    echo "
    <div class='container_sucesso' style='max-width: auto;'>
    <h3>Usuário '$nome_usuario' aprovado com sucesso! </h3><br><br><br>    
    <a class='alert alert-success' role='alert' href='aprovar_usuarios.php'>
        Clique para retornar.
        </a>
    
    </div>
    ";}
    ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>