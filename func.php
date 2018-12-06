<?php 
	function validar_form_funci_cad()
	{
		if( empty($_POST['nome']) || 
		empty($_POST['senha'])    || 
		empty($_POST['nasc']) ) 
	{
		header('location:cadastro.php?msg=emptyFields');
		exit;
	}

	}

	function validar_form_cad_jogo()
	{
		if( empty($_POST['nome']) || 
		empty($_POST['genero']) ||
		empty($_POST['data']))
		{
			header('location:agenda_jogo.php?msg=emptyFields');
			exit;
		}
	}

	function verificar_msg()
{
	if(!empty($_GET['msg']))
	{
		$msg = $_GET['msg'];

		if($msg == 'emptyFields')
		{
			echo '<h3 class="alert alert-warning">ATENÇÃO: Preencha todos os campos do formulário.</h3>';
		}
		else if($msg == 'cadSuccess')
		{
			echo '<h3 class="alert alert-success">Cadastro efetuado com sucesso!<br><p>Utilize o formulário abaixo para entrar no sistema:</p></h3>';
		}
		else if($msg == 'cadError')
		{
			echo '<h3 class="alert alert-danger">ATENÇÃO: usuário já cadastrado!<br><p>Tente novamente informando outros dados</p></h3>';
		}
		else if($msg == 'loginError')
		{
			echo '<h3 class="alert alert-warning">ATENÇÃO: usuário inválido!<br><p>Tente novamente</p></h3>';
		}
		else if($msg == 'eventoCad')
		{
			echo '<h3 class="alert alert-success">Jogo cadastrado com sucesso!</h3>';
		}
		else if($msg == 'eventoError')
		{
			echo '<h3 class="alert alert-danger">ATENÇÃO: não foi possível cadastrar o jogo.<br><p>Tente novamente</p></h3>';
		}
		elseif ($msg == 'semlogin') 
		{
			echo '<h3 class="alert alert-danger">ATENÇÃO: não tem acesso a pagina sem login.<br><p>preencha o formulário</p></h3>';
		}
	}
}
 ?>