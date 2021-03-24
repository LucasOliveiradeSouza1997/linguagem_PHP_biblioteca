<?php
	session_start();	

	include_once("conexao.php");	
	
	if((isset($_POST['qtd_exemplar'])) ){
		$qtd_exemplar = $_POST['qtd_exemplar'];
		
		$cod_titulo = $_SESSION['id_temporario'];
		unset(
			$_SESSION['id_temporario']
		);
		for($i=0;$i<$qtd_exemplar;$i++){
			
			$cadastrar_autor = "INSERT INTO exemplares (`cod_titulo`,`emprestado_exemplar`) VALUES( '$cod_titulo',0)";
			$result = mysqli_query($conn,$cadastrar_autor);
		
		}
		
		
		header("Location: titulo.php");
	}else {
		header("Location: home.php");		
	}		
?>