<?php //2
	define('SERVERNAME', 'localhost');
	define('USERNAME', 'root');
	define('PASSWORD', '');
	define('DBNAME', 'bd_jogos');

	$conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DBNAME);

	if (!$conn) 
	{
		die("ERRO DE CONEXÃO: " . mysqli_connect_error());
	}
	
	
 ?>