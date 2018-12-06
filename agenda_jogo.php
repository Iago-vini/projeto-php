<?php include 'lock.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<title>Lista de jogos</title>
</head>
<body class="container">

	<?php 
		include 'menu.php';
		//include 'func.php';
		include 'conn.php';

		//verificar_msg();
	 ?>

	 <h3 class="text-primary">Minha Agenda - 
		<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#formModalCenter">
		Novo jogo
	</button>
	</h3>

	<div class="modal fade" id="formModalCenter" tabindex="-1" role="dialog" aria-labelledby="formModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="formModalCenterTitle">Novo jogo</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <?php include 'form_cad_jogo.php'; ?>
	      </div>
	    </div>
	  </div>
	</div>

	<?php 
		if ($_SESSION['nome'] == 'admin') {
			$sql = "SELECT id_jogo, tb_jogo.nome, genero, data_lancamento FROM tb_jogo INNER JOIN tb_funcionario ON tb_jogo.id_funcionario = tb_funcionario.id_funcionario" ;
		}
		else {
			$sql = "SELECT id_jogo, tb_jogo.nome, genero, data_lancamento FROM tb_jogo INNER JOIN tb_funcionario ON tb_jogo.id_funcionario = tb_funcionario.id_funcionario WHERE tb_jogo.id_funcionario = " . $_SESSION['id_funcionario'] ;
		}

		$result = mysqli_query($conn, $sql);

		if (mysqli_affected_rows($conn) > 0) 
		{
			$jogo = array();

			echo '<table class="table table-hover table-bordered">';
			echo '<tr>';
			echo '<th>jogo #</th>';
			echo '<th>nome</th>';
			echo '<th>genero</th>';
			echo '<th>Data_de_lancamento</th>';
			echo '<th colspan="2" class="text-center">Ações</th>';
			echo '</tr>';

			while ($jogo = mysqli_fetch_assoc($result)) 
			{
				echo '<tr>';

				foreach ($jogo as $act_column => $act_value) 
				{
					echo '<td>' . $act_value . '</td>';

					if ($act_column == 'id_jogo')
					{
						$id_jogo = $act_value;
					}
				}

				echo '<td class="text-center"><a href="editar.php?id_jogo='.$id_jogo.'" class="btn btn-warning">Editar</a></td>';

				echo '<td class="text-center"><a href="deletar.php?id_jogo='.$id_jogo.'" class="btn btn-danger">Deletar</a></td>';

				echo '</tr>';
			}
			echo '</table>';
		}
		elseif (mysqli_affected_rows($conn) == -0) 
		{
			echo '<h3 class="alert alert-info">Não há jogos cadastrados</h3>';
		}
		elseif (mysqli_affected_rows($conn) == -1) 
		{
			echo '<h3 class="alert alert-info">erro sql<hr>' . mysqli_error($conn) . '</h3>';
		}
	 ?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>