<?php
	session_start();
	if(!isset($_SESSION["cod_usuario"]) || !isset($_SESSION["classificacao_usuario"]) || 
	   !isset($_SESSION["nome_usuario"]) || !isset($_SESSION["email_usuario"])) {
		
		header("Location: home.php");
		
	}else{
	
	unset(
		$_SESSION['cod_usuario'],
		$_SESSION['nome_usuario'],
		$_SESSION['email_usuario'],
		$_SESSION['classificacao_usuario']
	);
	
	//redirecionar o usuario para a página principal
	header("Location: home.php");
	}
?>