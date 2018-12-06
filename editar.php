<!DOCTYPE html>
<html class="pt-br">
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<meta charset="utf-8">
	<title></title>
</head>
<body class="container">

<?php include 'lock.php';
		 include 'menu.php';


include 'conn.php';

if(!empty($_GET['id_jogo']))
{
	$id_jogo = $_GET['id_jogo'];

	if ($_SESSION['nome'] == 'admin') {
		$sql = "SELECT nome, genero, data_lancamento FROM tb_jogo WHERE id_jogo = $id_jogo";
	}
	else {
		$sql = "SELECT nome, genero, data_lancamento FROM tb_jogo WHERE id_jogo = $id_jogo AND id_funcionario = " . $_SESSION['id_funcionario'];
	}
	$resultado = mysqli_query($conn, $sql);

	if (mysqli_affected_rows($conn) > 0) {
		$dados = mysqli_fetch_assoc($resultado);
		$nome = $dados['nome'];
		$genero = $dados['genero'];
		$data = $dados['data_lancamento'];
	}
	else if (mysqli_affected_rows($conn) == 0) {
		header("location:agenda_jogo.php?msg=idInvalido");
	}
	else if (mysqli_affected_rows($conn) == -1) {
		echo mysqli_error($conn);
		exit;
		header("location:agenda_jogo.php?msg=sqlerror");
	}
}


?>
<p>
	<h1> EDITAR: </h1>

<form name="form_editar" action="<?php echo 'validar_editar.php?id_jogo=' . $id_jogo ?>" method="post">
	<p>
		<label>Nome do jogo:</label><br>
		
		<input type="text" name="nome" value="<?php echo $nome; ?>"> 
	</p>

	<p>
		<label>Genero:</label><br>
		<input type="text" name="genero" value="<?php echo $genero; ?>"> 
	</p>
	
	<p>
		<label>Data de lançamento:</label><br>
		
		<input type="text" name="data" value="<?php echo $data; ?>"> 
	</p>
	
	<p>

		<button type="button" class="btn btn-secondary" data-dismiss="modal">
			Fechar
		</button>

		<button class="btn btn-primary" type="submit">
			Salvar
		</button>
	</p>

</form>
</p>
</body>
</html>