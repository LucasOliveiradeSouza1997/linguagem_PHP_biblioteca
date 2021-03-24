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
			header("Location: autor.php");
		}
		else{
			htmlentities($nome);
			
			$query = "UPDATE autores SET nome_autor='$nome',telefone_autor='$telefone',endereco_autor='$endereco',complemento_autor='$complemento',cep_autor='$cep',municipio_autor='$municipio',estado_autor='$estado' WHERE cod_autor=$id";
			$result = mysqli_query($conn,$query);	
			header("Location: autor.php");
		}			
	}
	else {
		header("Location: home.php");		
	}		
?>