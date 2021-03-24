<?php
	session_start();
	
	if($_SESSION['classificacao_usuario'] != "4" ){
		header("Location: home.php");
	}

include_once("conexao.php");

	$id = $_GET["id"];
	$result_usuario = "DELETE FROM editoras WHERE cod_editora = $id LIMIT 1";
	$resultado_usuario = mysqli_query($conn, $result_usuario);
	$resultado = mysqli_fetch_assoc($resultado_usuario);
	
	header("Location: editora.php");
		

?>