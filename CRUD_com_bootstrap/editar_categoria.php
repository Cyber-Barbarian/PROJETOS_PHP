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
    <title>Alteração de produto</title>
</head>

<body>

    
<?php 

require "conexao.php";

/*OBS, quando passamos o href 
href="editar_produto.php?id=<?php echo $id_estoque?>"
quer dizer que passamos para frente a variável id_estoque com o nome de id, via metodo get
para recuperar temos que chamar por id, dando o nome que quisermos
Podemos gerar assim urls dinâmicas
*/
$identificador=$_GET['id'];

$sql="SELECT * FROM categoria WHERE id_categoria='$identificador'";
$busca=mysqli_query($conn,$sql);
$resultado=mysqli_fetch_array($busca);

$id_categoria=$resultado['id_categoria'];
$categoria=utf8_encode($resultado['categoria']);


/* echo "
$id_estoque
$numero_produto
$nome_produto
$quantidade_produto
$categoria
$fornecedor" */
?>
<div class="container" style="padding-top:100px; max-width:500px;">
    <div style="text-align:right;">
        <a href="lista_de_categorias.php" class="btn btn-primary" id="botao_voltar">Voltar</a><br>
    </div>
    <form action="_alterar_categoria.php" method="post"">
        <div class="form-group">
            <label><h4>Alterar categoria <?php echo"$categoria";?> para</h4></label>
            <input type="text" class="form-control" name="id_categoria" value=<?php echo $id_categoria?> style="display : none">
            <input type="text" class="form-control" name="nova_categoria" placeholder="Digite a categoria que deseja no lugar">
            <div style="text-align:right;"><br>
            <button type="submit" class="btn btn-success" id="botao_cadastro_1">Alterar</button>
            </div>
        </div>
    
    </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script> 
</body>
</html>
