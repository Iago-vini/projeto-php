<?php 

	include 'func.php';
	
	validar_form_funci_cad();

	$nome 		= $_POST['nome'];
	$senha 	= $_POST['senha'];
	$data 		= $_POST['nasc'];
	

	include 'conn.php';

	$sql = "INSERT INTO tb_funcionario (nome, senha, data_nascimento) VALUES ('$nome', '$senha', '$data')";
	$result = mysqli_query($conn, $sql);

	if (mysqli_affected_rows($conn) > 0) 
	{
		header('location:login.php?msg=cadSuccess');
	}
	else
	{
		header('location:cadastro.php?msg=cadError');
	}
 ?>