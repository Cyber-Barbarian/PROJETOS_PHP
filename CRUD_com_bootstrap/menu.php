<?php 
session_start();
require 'logout.php';
testTimeOut();
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

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="css/estilo.css" rel="stylesheet">
    <title>Menu</title>
</head>
<body>

<div class="container" style="margin-top:40px;max-width:1000px; margin-left: auto; margin-right:auto">
    <h3>Bem vindo <?php echo $user;?> </h3><br>
    <?php 
    //vamos bloquear adicionar produto para os conferentes
    if (($nivel==1)||($nivel==2)){
    ?>
    <div class="row" style="max-width:1000px; margin-left: auto; margin-right:auto">
    <div class="col-sm-6">
        <div class="card">
        <div class="card-body">
            <h5 class="card-title">Adicionar Produtos</h5>
            <p class="card-text">Formulário de adição de produtos.</p>
            <a href="adicionar_produto.php" class="btn btn-primary"><i class="fas fa-boxes"></i>&nbsp;Inserir Produtos</a>
        </div>
        </div>
    </div>
    <?php }; ?>
    <div class="col-sm-6" ">
        <div class="card">
        <div class="card-body">
            <h5 class="card-title">Listar Produtos</h5>
            <p class="card-text">Visualizar, alterar ou excluir produtos cadastrados.</p>
            <a href="lista_de_produtos.php" class="btn btn-warning"><i class="fas fa-clipboard-list"></i>&nbsp;Lista de Produtos</a>
        </div>
        </div>
    </div>
    </div>
    <br>
    <div class="row" style="max-width:1000px; margin-left: auto; margin-right:auto">
    <div class="col-sm-6">
        <div class="card">
        <div class="card-body">
            <h5 class="card-title">Adicionar/Editar Categoria</h5>
            <p class="card-text">Formulários de adição, alteração e exclusão de categorias.</p>
            <a href="adicionar_categoria.php" class="btn btn-primary"><i class="far fa-check-circle"></i>&nbsp;Adicionar Categoria</a><br><br>
            <a href="lista_de_categorias.php" class="btn btn-warning"><i class="far fa-check-circle"></i>&nbsp;Alterar/excluir Categoria</a>
        </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card">
        <div class="card-body">
            <h5 class="card-title">Cadastrar Fornecedores</h5>
            <p class="card-text">Formulários de cadastro, alteração e exclusão de novos fornecedores.</p>
            <a href="adicionar_fornecedor.php" class="btn btn-primary"><i class="fas fa-truck"></i>&nbsp;Cadastrar Fornecedores</a><br><br>
            <a href="lista_de_fornecedores.php" class="btn btn-warning"><i class="fas fa-truck"></i>&nbsp;Alterar/excluir Fornecedores</a>
        </div>
        </div>
    </div>
    </div>
    <?php 
    //vamos bloquear aprovar usuário para todo mundo que não é administrador
    if (($nivel==1)){
    ?>
    <div class="col-sm-6">
        <div class="card">
        <div class="card-body">
            <h5 class="card-title">Aprovar Usuários</h5>
            <p class="card-text">Aprovação de novos usários pelo administrador.</p>
            <a href="aprovar_usuarios.php" class="btn btn-primary"><i class="fas fa-truck"></i>&nbsp;Lista de Aprovação</a><br><br>
        </div>
        </div>
    </div>
    </div>
    <?php }; ?>
    
</div>    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/459f661b70.js" crossorigin="anonymous"></script>
</body>
</html>