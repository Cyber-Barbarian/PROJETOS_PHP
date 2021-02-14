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

$sql="SELECT * FROM ESTOQUE WHERE id_estoque='$identificador'";
$busca=mysqli_query($conn,$sql);
$resultado=mysqli_fetch_array($busca);

$id_estoque=$resultado['id_estoque'];
$numero_produto=$resultado['numero_produto'];
$nome_produto=$resultado['nome_produto'];
$quantidade_produto=$resultado['quantidade'];
$categoria=$resultado['categoria'];
$fornecedor=$resultado['fornecedor'];

/* echo "
$id_estoque
$numero_produto
$nome_produto
$quantidade_produto
$categoria
$fornecedor" */
?>
<form  method="post" action="_atualizar_produto.php" id="formulario_alteracao">
    <h4>Formulário de Alteração:</h4>
        <div class="container">
        <div style="text-align:right;">
            <a href="lista_de_produtos.php" class="btn btn-primary" id="botao_voltar">Voltar</a><br>
        </div>
            <div class="mb-3">
                <label>Número do produto</label>
                <input type="number" class="form-control" name="numero_produto" required autocomplete="off" value=<?php echo $numero_produto?> readonly>
                <!-- aqui adicionamos o id_estoque mas não o exibimos. ele precisa estar dentro do formulário para ser enviado!-->
                <input type="number" class="form-control" name="id_estoque" required autocomplete="off" value=<?php echo $id_estoque?> style="display : none">
            </div>
            <div class="mb-3">
                <label>Nome do produto</label>
                <input type="text" class="form-control" name="nome_produto" required autocomplete="off" value=<?php echo $nome_produto?>>
            </div>
            <div class="mb-3">
                <label>Quantidade do produto</label>
                <input type="number" class="form-control" name="qtd_produto" required autocomplete="off" value=<?php echo $quantidade_produto?>>
            </div>
            <div class="mb-3">
                <select class="form-select" aria-label="Default select example" name="tipo_produto" required autocomplete="off" value=<?php echo $categoria?>> 
                    <option value=<?php echo $categoria?> selected><?php echo $categoria?></option>
                    <div id="seletor_categoria">
                    <?php 
                    require 'conexao.php';
                    $sql="select * from categoria";
                    $busca_categoria=mysqli_query($conn,$sql);
                    while ($array_categoria = mysqli_fetch_array($busca_categoria)){
                        $value_categoria=utf8_encode($array_categoria['categoria']);
                        echo "<option value='$value_categoria'>$value_categoria</option>";
                    }
                    




                    //$array_categorias = array("Periféricos","Hardware","Software","Celulares");
                    //foreach ($array_categorias as $value){
                    //    if ($value==$categoria) {
                    //        continue;
                    //        # code...
                    //    }else{
                    //        echo"<option value='$value'>$value</option>";
//
                    //    }
                    //}
                    ?>
                    <!-- <option value="Periféricos">Periféricos</option> -->
                    <!-- <option value="Hardware">Hardware</option> -->
                    <!-- <option value="Software">Software</option> -->
                    <!-- <option value="Celulares">Celulares</option> -->
                    </div>
                </select>
            </div>
            <div class="mb-3">
                <select class="form-select" aria-label="Default select example" name="fornecedor_produto" required>
                    <option value=<?php echo $fornecedor?> selected><?php echo $fornecedor?></option>
                <?php
                    require 'conexao.php';
                    $sql="select distinct * from fornecedor";
                    $busca_fornecedor=mysqli_query($conn,$sql);
                    while ($array_fornecedor = mysqli_fetch_array($busca_fornecedor)){
                        $value_fornecedor=$array_fornecedor['fornecedor'];
                        echo "<option value='$value_fornecedor'>$value_fornecedor</option>";
                    }
                       //$array_fornecedor = array("Fornecedor A","Fornecedor B","Fornecedor C");
                       //foreach ($array_fornecedor as $value){
                       //    if ($value==$fornecedor) {
                       //        continue;
                       //        # code...
                       //    }else{
                       //        echo"<option value='$value'>$value</option>";

                       //    }
                       //}
                ?>
                    <!-- <option value="Fornecedor A">Fornecedor A</option>
                    <option value="Fornecedor B">Fornecedor B</option>
                    <option value="Fornecedor C">Fornecedor C</option> -->
                </select>
            </div>
            <div style="text-align : right;">
                <button class="btn btn-success" id="botao_atualizar_1" type="submit">Atualizar</button>
            </div>
            
        </div>
    </div>
</form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script> 
</body>
</html>
