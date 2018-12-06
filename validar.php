<?php 
	
	if(empty($_POST['nome']) || empty($_POST['senha']))
	{
		header('location:login.php?msg=emptyFields');
	}
	else
	{
		$nome = $_POST['nome'];
		$senha   = $_POST['senha'];

		include 'conn.php';

		$sql = "SELECT id_funcionario, nome, senha, data_nascimento FROM tb_funcionario
		WHERE (nome LIKE '$nome') AND senha LIKE '$senha' ";

		$resultado = mysqli_query($conn, $sql);
		
		if(mysqli_affected_rows($conn) > 0)
		{
			
			$login = mysqli_fetch_assoc($resultado);

			session_start();
			$_SESSION['id_funcionario'] = $login['id_funcionario'];
			$_SESSION['nome'] 	        = $login['nome'];
			$_SESSION['senha'] 		    = $login['senha'];

			header('location:agenda_jogo.php');
		}
		else
		{
			header('location:login.php?msg=loginError');
		}
	}
?>