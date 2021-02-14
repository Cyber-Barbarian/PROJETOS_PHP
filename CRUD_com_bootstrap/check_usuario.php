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

require 'conexao.php';
require 'scripts/password.php';
$email = $_POST['email'];
$senha =$_POST['pwd'];
$senha_cripto=sha1($senha);


$user_valido="SELECT id_usuario, nome_usuario,email, senha, nivel_de_acesso from usuarios where email = '$email' and Status = 'Ativo'";
$busca=mysqli_query($conn,$user_valido);
//check da quantidade de linhas, saber se o email existe, etc.... depois direciona ou pra novo usuário ou para senha
$check_usuario=mysqli_num_rows($busca);
if ($check_usuario == 0) {
    echo '
    <div class="container_sucesso">
    <a class="alert alert-warning" role="alert" href="index.php">
        Usuário inexistente. Clique para retornar e se cadastrar.
    </a>

</div>';
    
}else {
    $array_user= mysqli_fetch_array($busca); 
    //Não precisamos fazer um loop wile pois garantiremos que nenhum funcinário possa ser cadastrado mais de uma vez!
    //Logo nosso array será sempre único
    $senha_user=$array_user['senha'];
    $email_user=$array_user['email'];
    $nome_user=$array_user['nome_usuario'];
    
    

    if ($senha_user != $senha_cripto) {
        echo '
    <div class="container_sucesso">
    <a class="alert alert-warning" role="alert" href="index.php">
        Senha inválida. Clique para retornar.
    </a>

</div>';
         
    }else{
        session_start();
        $_SESSION['timeout']=time();
        $_SESSION['nome_user']=$nome_user;
        $_SESSION['email_user']=$email_user;
        header("Location: menu.php");
        
    };
};
?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>

</body>
</html>