<?php session_start();
unset($_SESSION['id_funcionario']);
unset($_SESSION['nome']);
unset($_SESSION['senha']);
session_destroy();
header('location:login.php'); 
?>