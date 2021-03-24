<?php
	session_start();
	
	if($_SESSION['classificacao_usuario'] != "4" ){
		header("Location: home.php");
	}

	include_once("conexao.php");

	$result_usuario = "select * from informacoes ";			
	$resultado_usuario = mysqli_query($conn, $result_usuario);
	$resultado = mysqli_fetch_assoc($resultado_usuario);
	$renovacao = $resultado['dias_renovacao'];
	
	$cod_usuario=($_GET['campo1']);
	$cod_exemplar=($_GET['campo2']); 
	

	$emprestar_livro = "UPDATE usuarios_exemplares SET data_devolucao = date_add(now(), interval '$renovacao' day)   WHERE cod_usuario = $cod_usuario AND cod_exemplar = $cod_exemplar";		
	$result = mysqli_query($conn,$emprestar_livro);
		
	header("Location: livros_emprestados.php");
		

?>