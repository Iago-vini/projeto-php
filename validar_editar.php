<?php
include 'lock.php';

	if(!empty($_GET['id_jogo']))
	{
		$id_jogo = $_GET['id_jogo'];
	}
	else
	{
		header('location:agenda_jogo.php?msg=editIdError');
	}

	if(empty($_POST['nome']) || empty($_POST['genero']) || empty($_POST['data']))
	{
		header('location:editar.php?id=' . $id_evento);
	}
	else
	{
		$nome 		= $_POST['nome'];
		$genero 	= $_POST['genero'];
		$data 		= $_POST['data'];

		include 'conn.php';
		if ($_SESSION['nome'] == 'admin') {
		$sql = "UPDATE tb_jogo SET nome = '$nome', genero = '$genero', data_lancamento = '$data' WHERE id_jogo = $id_jogo";
		}
		else {
			$sql = "UPDATE tb_jogo SET nome = '$nome', genero = '$genero', data_lancamento = '$data' WHERE id_jogo = $id_jogo AND id_funcionario = " . $_SESSION['id_funcionario'];	
		}

		$resultado = mysqli_query($conn, $sql);

		if (mysqli_affected_rows($conn) > 0) {
			header("location:agenda_jogo.php?msg=editSuccess");	}
		else {
			echo mysqli_error($conn);
			exit; //tirar essa linha e a acima!! URGENTE
			header("location:agenda_jogo.php?msg=sqlerror");
		}
	}




?>