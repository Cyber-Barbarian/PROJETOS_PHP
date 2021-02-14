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
    <title>Exclusão de produto</title>
</head>
<body>
<?php
include 'conexao.php';
/*OBS, quando passamos o href 
href="editar_produto.php?id=<?php echo $id_estoque?>"
quer dizer que passamos para frente a variável id_estoque com o nome de id, via metodo get
para recuperar temos que chamar por id, dando o nome que quisermos
Podemos gerar assim urls dinâmicas
*/
$id_estoque=$_GET['id'];
$sql = "DELETE FROM estoque WHERE id_estoque='$id_estoque'";

$query=mysqli_query($conn,$sql);

//echo $sql;
?>

<div class="container_sucesso" style="max-width: 600px;">
    <a class="alert alert-danger" role="alert" href="lista_de_produtos.php">
    Produto deletado com sucesso! Clique para retornar.
    </a>    
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</body>
</html>


