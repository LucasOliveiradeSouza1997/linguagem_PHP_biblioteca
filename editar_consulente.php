<?php
	session_start();	
	
	
	include_once("conexao.php");
	
	if((isset($_POST['nome'])) ){
		$id= $_SESSION['id_temporario'];
		unset(
			$_SESSION['id_temporario']
		);
		$email = mysqli_real_escape_string($conn, $_POST['email']); //Escapar de caracteres especiais, como aspas, prevenindo SQL injection
		$nome = mysqli_real_escape_string($conn, $_POST['nome']);
		$telefone = $_POST['telefone'];
		$endereco = mysqli_real_escape_string($conn, $_POST['endereco']);
		$complemento = mysqli_real_escape_string($conn, $_POST['complemento']);
		$municipio = mysqli_real_escape_string($conn, $_POST['municipio']);
		$cep = $_POST['cep'];
		$estado = $_POST['estado'];
		$classificacao = $_POST['classificacao'];
		$erro = 0;
		
					
		if($cep != is_numeric($cep)){
			//$_SESSION['ceperro'] = "Apenas numeros";
			$erro++;
		}
		if($telefone != is_numeric($telefone)){
			//$_SESSION['telefoneerro'] = "Apenas numeros";
			$erro++;
		}	
		if(isset($resultado)){
			
			//$_SESSION['emailerro'] = "Email ja cadastrado";
			$erro++;
		}
		
		if($erro != 0){
			header("Location: consulente.php");
		}
		else{
			htmlentities($nome);
			
			$query = "UPDATE usuarios SET nome_usuario='$nome',email_usuario='$email',telefone_usuario='$telefone',endereco_usuario='$endereco',complemento_usuario='$complemento',cep_usuario='$cep',municipio_usuario='$municipio',estado_usuario='$estado',classificacao_usuario='$classificacao' WHERE cod_usuario=$id";
			$result = mysqli_query($conn,$query);	
			header("Location: consulente.php");
		}			
	}
	else {
		header("Location: home.php");		
	}		
?>