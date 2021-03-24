<?php
	session_start();
	
	if($_SESSION['classificacao_usuario'] != "4" ){
		header("Location: home.php");
	}
	include_once("conexao.php");
	
	
	
?>
	
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Lucas Oliveira">
    <link rel="icon" href="imagens/book.ico">
	<title>Bookollege</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="css/theme.css" rel="stylesheet">
    <script src="js/ie-emulation-modes-warning.js"></script>
  </head>

  <body role="document">
	<?php//---------------------------menu _admin -----------------------------------------------------------------?>
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
	<div class="navbar-header">
	  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	  </button>
	  <a class="navbar-brand" href="area_bibliotecario.php">Bookollege</a>
	</div>
	<div id="navbar" class="navbar-collapse collapse">
	  <ul class="nav navbar-nav">            

		<li><a href='titulo.php'> Títulos</a></li>
		<li><a href='autor.php'> Autores</a></li>
		<li><a href='editora.php'> Editoras</a></li>
		<li><a href='consulente.php'> Consulentes</a></li>
		<li><a href='livros_emprestados.php'> Livros Emprestados</a></li>
		<li><a href='emprestar_livro.php'> Emprestar Livro</a></li>
		
		<li><a href="home.php">Voltar para a página principal</a></li>
		
		<li><a href="sair.php">Sair</a></li>
	  </ul>
	</div>
  </div>
</nav>
	<?php//-----------------------fim--menu _admin ----------------------------------------------------------------?>	
  
  <div class="container theme-showcase" role="main">      
      <div class="page-header">
        <h1>Bem-vindo à área administrativa
		</h1>
      </div>
	  <font size="4">
		Funções: 
		</br></br>
		<a href="titulo.php">- Títulos</a></br>
		<a href="autor.php">- Autores</a></br>
		<a href="editora.php">- Editoras</a></br>
		<a href="consulente.php">- Consulentes</a></br>
		<a href="livros_emprestados.php">- Listar livros emprestados</a></br>
		<a href="emprestar_livro.php">- Emprestar Livro</a></br>
		</br></br>
		Configuração:</br></br> 
		
		<?php
	
		if($_SERVER['REQUEST_METHOD']=='POST'){
			if(isset($_POST['renovacao'])){
				$renovacao= $_POST['renovacao'];
				if($renovacao <= 0){
					$_SESSION['renovacaoerro'] = "Valor invalido";
				}else{	
					$result_usuario = "UPDATE informacoes SET dias_renovacao= $renovacao ";
					$resultado_usuario = mysqli_query($conn, $result_usuario);
					$_SESSION['renovacaosucesso'] = "Alteração feita com sucesso";
				}
			?>	
				<p class="text-center text-danger">
	<?php 		if(isset($_SESSION['renovacaoerro'])){
					echo $_SESSION['renovacaoerro'];
					unset($_SESSION['renovacaoerro']);
				}
	?>
				</p>
				<p class="text-center text-success">
	<?php 
				if(isset($_SESSION['renovacaosucesso'])){
					echo $_SESSION['renovacaosucesso'];
					unset($_SESSION['renovacaosucesso']);
				}
			}
		}			
	?>
				</p>
		
				<form action="" method="POST">
					<div class="form-group">
					

					<label for="Input-titulo">Digite em dias o valor da renovação:</label>
					<input type="number" name="renovacao" class="small" required="required" >
					</br>					
					</div>	
					<input type="submit" class="btn btn btn-primary" value="Confirmar">
				</form>
		
		</font>
    </div> 

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
