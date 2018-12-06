<?php include 'lock.php'; 
	  include 'conn.php';
	  include 'func.php';

	  validar_form_jogo();

	  $id_jogo = $_POST['id_jogo'];
	  $nome = $_POST['nome'];
	  $genero = $_POST['genero'];
	  $data_lancamento = $_POST['data_lancamento'];

	  $sql = "INSERT INTO tb_jogo(id_jogo, nome, genero, data_lancamento)
	  			VALUES ('$id_jogo', '$nome', '$genero', '$data_lancamento')";

	  $result = mysqli_query($conn, $sql);

	  if (mysqli_affected_rows($conn) > 0) 
	  {
	  	header('location:agenda_jogo.php?msg=jogoCad');
	  }
	  else
	  {
	  	header('location:agenda_jogo.php?msg=jogoError');
	  }
	
 ?>