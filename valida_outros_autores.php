<?php
	session_start();	

	include_once("conexao.php");	
	
	if((isset($_POST['autor'])) ){
		$cod_autor = $_POST['autor'];
		
		$cod_titulo = $_SESSION['id_temporario'];
		unset(
			$_SESSION['id_temporario']
		);
		$emprestar_livro = "INSERT INTO titulos_autores (`cod_titulo`,`cod_autor`) VALUES( '$cod_titulo','$cod_autor')";
		$result = mysqli_query($conn,$emprestar_livro);
		
		
		header("Location: outros_autores.php?id=$cod_titulo");
	}else {
		header("Location: home.php");		
	}		
?>