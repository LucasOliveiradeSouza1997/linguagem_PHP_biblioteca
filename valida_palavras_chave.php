<?php
	session_start();	

	include_once("conexao.php");	
	
	if((isset($_POST['palavra'])) ){
		
		$palavra = $_POST['palavra'];
		
		$cod_titulo = $_SESSION['id_temporario'];
		unset(
			$_SESSION['id_temporario']
		);
		$cadastrar_autor = "INSERT INTO palavras_chave (`desc_palavra_chave`) VALUES ('$palavra')";
		$result = mysqli_query($conn,$cadastrar_autor);
		
		$result_usuario = "SELECT * FROM palavras_chave WHERE desc_palavra_chave = '$palavra' LIMIT 1";
		$resultado_usuario = mysqli_query($conn, $result_usuario);
		$resultado = mysqli_fetch_assoc($resultado_usuario);
		$cod_palavra = $resultado['cod_palavra_chave'];
		
		
		
		$emprestar_livro = "INSERT INTO titulos_palavras_chaves (`cod_titulo`,`cod_palavra_chave`) VALUES( '$cod_titulo','$cod_palavra')";
		$result = mysqli_query($conn,$emprestar_livro);
		
		
		header("Location: palavras_chave.php?id=$cod_titulo");
	}else {
		header("Location: home.php");		
	}		
?>