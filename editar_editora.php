<?php
	session_start();	
	
	
	include_once("conexao.php");
	
	if((isset($_POST['nome'])) ){
		$id= $_SESSION['id_temporario'];
		unset(
			$_SESSION['id_temporario']
		);
		$nome = mysqli_real_escape_string($conn, $_POST['nome']);
		$telefone = $_POST['telefone'];
		$endereco = mysqli_real_escape_string($conn, $_POST['endereco']);
		$complemento = mysqli_real_escape_string($conn, $_POST['complemento']);
		$municipio = mysqli_real_escape_string($conn, $_POST['municipio']);
		$cep = $_POST['cep'];
		$estado = $_POST['estado'];
		$erro = 0;
		
					
		if($cep != is_numeric($cep)){
		//	$_SESSION['ceperro'] = "Apenas numeros";
			$erro++;
		}
		if($telefone != is_numeric($telefone)){
		//	$_SESSION['telefoneerro'] = "Apenas numeros";
			$erro++;
		}	

		
		if($erro != 0){
			header("Location: editora.php");
		}
		else{
			htmlentities($nome);
			
			$query = "UPDATE editoras SET nome_editora='$nome',telefone_editora='$telefone',endereco_editora='$endereco',complemento_editora='$complemento',cep_editora='$cep',municipio_editora='$municipio',estado_editora='$estado' WHERE cod_editora=$id";
			$result = mysqli_query($conn,$query);	
			header("Location: editora.php");
		}			
	}
	else {
		header("Location: home.php");		
	}		
?>