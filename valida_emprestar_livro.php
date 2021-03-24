<?php
	session_start();	

	include_once("conexao.php");	
	
	if((isset($_POST['consulente'])) ){
		$cod_usuario = $_POST['consulente'];
		
		$cod_exemplar = $_SESSION['id_temporario'];
		unset(
			$_SESSION['id_temporario']
		);
		$query = "UPDATE exemplares SET emprestado_exemplar = 1 WHERE cod_exemplar = $cod_exemplar";
		$result = mysqli_query($conn,$query);
		
		$emprestar_livro = "INSERT INTO usuarios_exemplares (`cod_usuario`,`cod_exemplar`,`data_emprestimo`,`data_devolucao`) VALUES( '$cod_usuario','$cod_exemplar',CURRENT_TIME(),date_add(now(), interval 1 week) )";
		$result = mysqli_query($conn,$emprestar_livro);
		
		
		header("Location: livros_emprestados.php");
	}else {
		header("Location: home.php");		
	}		
?>