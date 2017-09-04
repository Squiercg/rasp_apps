<!DOCTYPE html>
<!--
     Augusto C. A. Ribas
     View tela de Login
   -->

<html>
    <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Você não tem acesso ao controle!</title>
	<link rel="stylesheet" type="text/css" href="View/estilo.css">	
    </head>
    
    <body>
	<?php include "View/banner.php";?>
	<?php echo $_SESSION['mensagem']?>

	<form action="?op=''" method="post" ?>
	    
	    <input type = "text"  name = "usuario" placeholder = "Usuário = teste" required autofocus></br>
	    <input type = "password"  name = "senha" placeholder = "Senha = 1234" required>
	    <button type = "submit" name = "login">Login</button>
	    
	</form>

    </body>
</html>
