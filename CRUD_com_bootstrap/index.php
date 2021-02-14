<?php 
require 'logout.php';
testTimeOut();?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 ">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="css/estilo.css" rel="stylesheet">
    <title>Tela de login</title> 
</head>
<body>
    <div class="container3" id="box1" >
    <center>
    <img src="img/user_login.jpg" width="200px">
    </center>
        <form method="post" class="form-group">
            <label for="usuario" class="form-label" >E-mail de Usuário:&nbsp</label>
               <input type="email" id="email" name="email" placeholder="Usuário" class="form-control" autocomplete="off" required><br>
            <label for="pwd" class="form-label" >Senha:&nbsp;</label>
                <input type="password" id="pwd" name="pwd" placeholder="Senha" class="form-control" autocomplete="off" required>
        <br>
        <div style="text-align:right">
            <button type="submit" class="btn btn-primary" formaction="check_usuario.php">Entrar</button>
        </div><br>
        </form>
        <div style="text-align:right;">
            <a href="cadastro_de_usuario_externo.php" class="btn btn-link btn-sm">Novo usuário</a><br>
        </div>
    </div>
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/459f661b70.js" crossorigin="anonymous"></script>
    
</body>
</html>