<?php   include 'lock.php';

include 'conn.php';

if(!empty($_GET['id_jogo']))
{
	$id_jogo = $_GET['id_jogo'];
	if ($_SESSION['nome'] == 'admin') {
	$sql = "DELETE FROM tb_jogo WHERE id_jogo = $id_jogo";
	}
	else {
	$sql = "DELETE FROM tb_jogo WHERE id_jogo = $id_jogo AND id_funcionario = " . $_SESSION['id_funcionario'];	
	}

	$resultado = mysqli_query($conn, $sql);

	if(mysqli_affected_rows($conn) > 0)
	{
		header('location:agenda_jogo.php?msg=delSuccess');
	}
	else
	{
		header('location:agenda_jogo.php?msg=delError');
	}

}
else //if(empty($_GET['id_evento']))
{
	header('location:agenda_jogo.php?msg=emptyValue');
}



?>