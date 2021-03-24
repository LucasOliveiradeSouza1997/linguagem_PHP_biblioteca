<?php
	session_start();
	
	if($_SESSION['classificacao_usuario'] != "4" ){
		header("Location: home.php");
	}

	include_once("conexao.php");

	
	$cod_usuario=($_GET['campo1']);
	$cod_exemplar=($_GET['campo2']); 
	
	$emprestar_livro = "UPDATE exemplares SET emprestado_exemplar = 0   WHERE cod_usuario = $cod_usuario AND cod_exemplar = $cod_exemplar";		
	$result = mysqli_query($conn,$emprestar_livro);
	
	$result_usuario = "DELETE FROM usuarios_exemplares WHERE cod_usuario = $cod_usuario AND cod_exemplar = $cod_exemplar LIMIT 1";
	$resultado_usuario = mysqli_query($conn, $result_usuario);
	$resultado = mysqli_fetch_assoc($resultado_usuario);
	
		
	header("Location: livros_emprestados.php");
		

?>