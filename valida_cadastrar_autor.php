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
			header("Location: cadastrar_autor.php");
		}
		else{
			htmlentities($nome);
			$cadastrar_autor = "INSERT INTO autores (`nome_autor`,`telefone_autor`,`endereco_autor`,`complemento_autor`,`cep_autor`,`municipio_autor`,`estado_autor`) VALUES( '$nome','$telefone','$endereco','$complemento','$cep','$municipio','$estado')";
		
			$result = mysqli_query($conn,$cadastrar_autor);
				
			header("Location: autor.php");
		}			
	}
	else {
		header("Location: home.php");		
	}		
?>