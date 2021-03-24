<?php
	session_start();	

	include_once("conexao.php");	
	
	if((isset($_POST['nome'])) ){
		$nome = mysqli_real_escape_string($conn, $_POST['nome']);
		$telefone = $_POST['telefone'];
		$endereco = mysqli_real_escape_string($conn, $_POST['endereco']);
		$complemento = mysqli_real_escape_string($conn, $_POST['complemento']);
		$municipio = mysqli_real_escape_string($conn, $_POST['municipio']);
		$cep = $_POST['cep'];
		$estado = $_POST['estado'];
		$erro = 0;
		
					
		if($cep != is_numeric($cep)){
			$_SESSION['ceperro'] = "Apenas numeros";
			$erro++;
		}
		if($telefone != is_numeric($telefone)){
			$_SESSION['telefoneerro'] = "Apenas numeros";
			$erro++;
		}	

		
		if($erro != 0){
			header("Location: cadastrar_editora.php");
		}
		else{
			htmlentities($nome);
			$cadastrar_editora = "INSERT INTO editoras (`nome_editora`,`telefone_editora`,`endereco_editora`,`complemento_editora`,`cep_editora`,`municipio_editora`,`estado_editora`) VALUES( '$nome','$telefone','$endereco','$complemento','$cep','$municipio','$estado')";
		
			$result = mysqli_query($conn,$cadastrar_editora);
				
			header("Location: editora.php");
		}			
	}
	else {
		header("Location: home.php");		
	}		
?>