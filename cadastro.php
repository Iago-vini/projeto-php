<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<title>Cadastro de funcionario :v</title>
</head>
<body class="container">
	<?php 
		include 'menu.php';
		include 'func.php';

		verificar_msg();
	 ?>

	 <h3 class="text-primary">Cadastre-se!</h3>

	 <form name="cadastrar" action="func_cadastrado.php" method="post">

	 	<p>
	 		<label>Nome do funcionario:</label><br>
	 		<input type="text" name="nome">
	 	</p>

	 	<p>
	 		<label>Senha:</label><br>
	 		<input type="password" name="senha">
	 	</p>

	 	<p>
	 		<label>Data de nascimento:</label><br>
	 		<input type="date" name="nasc">
	 	</p>
	 	
	 	<p>
	 		<button type="submit" class="btn btn-primary">Cadastrar</button>
	 	</p>
	 </form>
</body>
</html>