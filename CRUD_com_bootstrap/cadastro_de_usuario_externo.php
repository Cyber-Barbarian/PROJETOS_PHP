<?php 
session_start();
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
    <div class="container3" id="box1" style="margin-top:30px;">
    <div style="text-align:right;">
        <a href="index.php" class="btn btn-primary btn-sm" id="botao_voltar">Voltar</a><br>
    </div>
    <center>
    <img src="img/cadastro.png" width="50px">
    </center>
        <form action="_inserir_usuario_externo.php" method="post" class="form-group" accept-charset="latin-1">
            <label for="nomeusuario" class="form-label" >Usuário:&nbsp</label>
               <input type="text" id="usuario" name="nomeusuario" placeholder="Digite  seu nome de usuário" class="form-control" autocomplete="off" required><br>
            <label for="email_user" class="form-label" >E-mail:&nbsp</label>
               <input type="email" id="email_user" name="email_user" placeholder="Digite  seu e-mail" class="form-control" autocomplete="off" required><br>
            <label for="pwdusuario" class="form-label" >Senha:&nbsp;</label>
                <input type="password" id="txtSenha" name="pwdusuario" placeholder="Senha" class="form-control" autocomplete="off" required>
            <label for="pwdusuario2" class="form-label" >Repita a Senha:&nbsp;</label>
                <input type="password" id="pwdusuario2" name="pwdusuario2" placeholder="Senha" class="form-control" autocomplete="off" required oninput="validaSenha(this)">    
        <br>
        
        <div style="text-align:right">
            <button type="submit" class="btn btn-primary btn-sm">Cadastrar</button>
        </div>
    </div>
    </form>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/459f661b70.js" crossorigin="anonymous"></script>
    <script  src="js/scripts.js"></script>
</body>
</html> 