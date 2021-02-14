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
    <title>Listagem de Produtos</title>
</head>
<body>
<?php 
session_start();
require 'conexao.php';
$user=$_SESSION['nome_user'];
$email=$_SESSION['email_user'];
if (!isset($user)){
    header("Location: index.php");
    exit();
}

$sql="SELECT nivel_de_acesso from usuarios where nome_usuario = '$user' and email = '$email' and Status = 'Ativo'";
$buscar=mysqli_query($conn, $sql);
$array_nivel=mysqli_fetch_array($buscar);
$nivel=$array_nivel['nivel_de_acesso'];
?>

    <div class="container" style="margin-top : 40px"> 
    <h1>Lista de Produtos</h1><br>
    <div style="text-align:right;">
        <a href="menu.php" class="btn btn-primary" id="botao_voltar">Voltar</a><br>
    </div>
        <table class="table table-hover">
            <thead>
            <tr>
            <th scope="col">Número do produto</th>
            <th scope="col">Nome</th>
            <th scope="col">Categoria</th>
            <th scope="col">Quantidade</th>
            <th scope="col">Fornecedor</th>
            <th scope="col">Ação</th>
            
            </tr>
        </thead>
        <tbody>
            <?php
                require "conexao.php";
                $sql = "select * from estoque";
                $busca=mysqli_query($conn, $sql);
                
                while ($array = mysqli_fetch_array($busca)) {
                    $id_estoque=$array['id_estoque'];
                    $numero_produto=$array['numero_produto'];
                    $nome_produto=$array['nome_produto'];
                    $categoria=$array['categoria'];
                    $quantidade=$array['quantidade'];
                    $fornecedor=$array['fornecedor'];
                    /*poderia ser feito aqui, mas ia atrapalhar para criar o botão de alteração
                    echo"<tr>
                    <td>$numero_produto</td>
                    <td>$nome_produto</td>
                    <td>$categoria</td>
                    <td>$quantidade</td>
                    <td>$fornecedor</td>
                    </tr>";*/

                    /*
                    TAMBÉM FUNCIONARIA usando direto 
                    echo"<tr>
                    <td>$array[1]</td>
                    <td>$array[2]</td>
                    <td>$array[3]</td>
                    <td>$array[4]</td>
                    <td>$array[5]</td>
                    </tr>";*/
                    ?> 
                    <!-- vamos inserir os valores da seginte forma -->
                    <tr>
                    <td><?php echo "$numero_produto";?></td>
                    <td><?php echo "$nome_produto"; ?></td>
                    <td><?php echo "$categoria"; ?></td>
                    <td><?php echo "$quantidade"; ?></td>
                    <td><?php echo "$fornecedor"; ?></td>
                    <td>
                    <?php
                    if ($nivel<3){ ?>
                    <a class="btn btn-outline-warning btn-sm" style="color:black" href="editar_produto.php?id=<?php echo $id_estoque?>" role="button"><i class="fas fa-edit"></i>&nbsp;Alterar dados</a>
                       <!--testear aqui inserir um alerta em javascript do tipo "deseja realmente cancelar?" >> ok ; Cancelar --> 
                    
                    <?php
                       if ($nivel==1){ ?>
                    <a class="btn btn-outline-danger btn-sm" style="color:black" href="deletar_produto.php?id=<?php echo $id_estoque?>" role="button"><i class="far fa-trash-alt"></i>&nbsp;Remover</a>
                    <?php };?>
                </td>
                    </tr>
              <?php };}; //fechando o loop while
              ?>
                
                
            
        </tbody>
    </table>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/459f661b70.js" crossorigin="anonymous"></script>
</body>
</html>