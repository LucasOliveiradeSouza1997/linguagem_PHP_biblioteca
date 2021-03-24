<?php
	session_start();	

	include_once("conexao.php");	
	
	if((isset($_POST['titulo'])) ){
		$nome = mysqli_real_escape_string($conn, $_POST['titulo']);
		$qtd_exemplar = $_POST['qtd_exemplar'];
		$editora = $_POST['editora'];
		$cod_autor = $_POST['autor'];
		$area_opcao = $_POST['area_opcao'];
		$cod_area;
		if($area_opcao == 0){
			$area = $_POST['area'];
			$cadastrar_autor = "INSERT INTO areas_de_conhecimento (`desc_area_de_conhecimento`)VALUES('$area')";
			$result = mysqli_query($conn,$cadastrar_autor);
			$result_usuario = "SELECT * FROM areas_de_conhecimento WHERE desc_area_de_conhecimento = '$area' LIMIT 1";
			$resultado_usuario = mysqli_query($conn, $result_usuario);
			$resultado = mysqli_fetch_assoc($resultado_usuario);
			$cod_area = $resultado['cod_area_de_conhecimento'];	
		}else{
			$cod_area = $_POST['area2'];
		}
		htmlentities($nome);
		$cadastrar_autor = "INSERT INTO titulos (`nome_titulo`,`cod_editora`,`cod_area_de_conhecimento`) VALUES( '$nome','$editora','$cod_area')";
		$result = mysqli_query($conn,$cadastrar_autor);
		
		$result_usuario = "SELECT * FROM titulos WHERE nome_titulo = '$nome' AND cod_editora = '$editora' AND cod_area_de_conhecimento = '$cod_area' LIMIT 1";
		$resultado_usuario = mysqli_query($conn, $result_usuario);
		$resultado = mysqli_fetch_assoc($resultado_usuario);
		$cod_titulo = $resultado['cod_titulo'];
		
		for($i=0;$i<$qtd_exemplar;$i++){
			
			$cadastrar_autor = "INSERT INTO exemplares (`cod_titulo`,`emprestado_exemplar`) VALUES( '$cod_titulo',0)";
			$result = mysqli_query($conn,$cadastrar_autor);
		
		}
		$cadastrar_autor = "INSERT INTO titulos_autores (`cod_titulo`,`cod_autor`) VALUES( '$cod_titulo','$cod_autor')";
		$result = mysqli_query($conn,$cadastrar_autor);
		
		header("Location: outros_autores.php?id=$cod_titulo");		
	}else {
		header("Location: home.php");		
	}		
?>