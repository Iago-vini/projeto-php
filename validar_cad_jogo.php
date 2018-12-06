<?php 

	include 'func.php';
	
	validar_form_cad_jogo();

	$nome 		= $_POST['nome'];
	$genero 	= $_POST['genero'];
	$data 		= $_POST['data'];

	session_start();
	$id_funcionario = $_SESSION['id_funcionario'];

	include 'conn.php';

	$sql = "INSERT INTO tb_jogo (nome, genero, data_lancamento, id_funcionario) VALUES ('$nome', '$genero', '$data', $id_funcionario)";
	$result = mysqli_query($conn, $sql);

	if (mysqli_affected_rows($conn) > 0) 
	{
		header('location:agenda_jogo.php?msg=cadSuccess');
	}
	else
	{
		header('location:agenda_jogo.php?msg=cadError');
	}
 ?>

?>