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
    <title>Listagem de Usuários esperando aprovação</title>
</head>
<body>
    
    <div id="container" style="max-width: 1000px;margin-left: auto; margin-right: auto;"> 
    <h1>Lista de usuários</h1><br>
    <div style="text-align:right;">
        <a href="menu.php" class="btn btn-primary" id="botao_voltar">Voltar</a><br>
    </div>
        <table class="table table-hover">
            <thead>
            <tr>
            
            <th scope="col">Usuário</th>
            <th scope="col">E-mail</th>
            <th scope="col">Nível</th>
            <th scope="col">Ação</th>
            
            </tr>
        </thead>
        <tbody>
            <?php
                require "conexao.php";
                $sql = "select * from usuarios where nivel_de_acesso='Inativo'";
                $busca=mysqli_query($conn, $sql);
                
                while ($array = mysqli_fetch_array($busca)) {
                    $id_usuario=$array['id_usuario'];
                    $nome_usuario=$array['nome_usuario'];
                    $email=$array['email'];
                    ?>

                    <tr>
                    <td><?php echo "$nome_usuario";?></td>
                    <td><?php echo "$email";?></td>
                    
                
                    <td>
                    <form method="post">
                    <select name="nivelusuario" class="form-control" id='nivelusuario'> 
                    <!-- onchange="seleciona_nivel(this.id)" só se quizesse passar no cabeçalho do get -->
                    <!-- onchange="seleciona_nivel(this.id)" só se quizesse passar no cabeçalho do get -->
                        <option value="0">Selecione um nível</option>
                        <option value="1">Administrador</option>
                        <option value="2">Funcionário</option>
                        <option value="3">Conferente</option>
                    </select>
                    <input type="hidden" id="id_usuario" name="id_usuario" value="<?php echo $id_usuario?>">
                    <input type="hidden" id="nome_usuario" name="nome_usuario" value="<?php echo $nome_usuario?>">
                    </td>
                    <td>
                
                    <button class="btn btn-outline-success btn-sm"  formaction="_aprovar_usuario.php" style="color:black" role="button" type="submit"><i class="fas fa-edit"></i>&nbsp;Aprovar</button >
                       <!--testear aqui inserir um alerta em javascript do tipo "deseja realmente cancelar?" >> ok ; Cancelar --> 
                    <button class="btn btn-outline-danger btn-sm"  formaction="_rejeitar_usuario.php" style="color:black" type="submit" role="button"><i class="far fa-trash-alt"></i>&nbsp;Rejeitar</button>
                    </td>
                    </form>
                    
                    </tr>
                <?php } ?>
            
                
            
        </tbody>
    </table>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/459f661b70.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js" crossorigin="anonymous"></script>
</body>
</html>