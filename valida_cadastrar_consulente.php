<?php
	session_start();	

	include_once("conexao.php");	
	
	if((isset($_POST['email'])) ){
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
		
		//Buscar na tabela usuario o usuário que corresponde com os dados digitado no formulário
		$result_usuario = "SELECT * FROM usuarios WHERE email_usuario = '$email' LIMIT 1";
		$resultado_usuario = mysqli_query($conn, $result_usuario);
		$resultado = mysqli_fetch_assoc($resultado_usuario);
		//Encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
		
					
		if($cep != is_numeric($cep)){
			$_SESSION['ceperro'] = "Apenas numeros";
			$erro++;
		}
		if($telefone != is_numeric($telefone)){
			$_SESSION['telefoneerro'] = "Apenas numeros";
			$erro++;
		}	
		if(isset($resultado)){
			
			$_SESSION['emailerro'] = "Email ja cadastrado";
			$erro++;
		}
		
		if($erro != 0){
			header("Location: cadastrar_consulente.php");
		}
		else{
			htmlentities($nome);
			$senha = md5($_SESSION['senha_usuario']);
			unset(
				$_SESSION['senha_usuario']
			);
			$cadastrar_usuario = "INSERT INTO usuarios (`nome_usuario`,`email_usuario`,`senha_usuario`,`classificacao_usuario`,`telefone_usuario`,`endereco_usuario`,`complemento_usuario`,`cep_usuario`,`municipio_usuario`,`estado_usuario`) VALUES( '$nome', '$email','$senha','$classificacao','$telefone','$endereco','$complemento','$cep','$municipio','$estado')";
		
			$result = mysqli_query($conn,$cadastrar_usuario);
				
			header("Location: consulente.php");
		}			
	}
	else {
		header("Location: home.php");		
	}		
?>