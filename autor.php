<?php
	session_start();
	
	if($_SESSION['classificacao_usuario'] != "4" ){
		header("Location: home.php");
	}

	include_once("conexao.php");
	$consulta = "SELECT * FROM autores "; // selecionar todos os autores
	$con = $conn -> query ($consulta) or die ($conn);	
		
	
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Página Administrativa">
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
        <h1>Autores</h1>
		Clique no Botão para Cadastrar um novo autor: <a href="cadastrar_autor.php"> <button type="button" class="btn ttn-sm btn-info" >Cadastrar Autor</button></a>
		</div>
      <div class="row">
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th>Nome</th>
                <th>telefone</th>
				<th>endereço</th>
				<th>complemento</th>
				<th>cep</th>
				<th>municipio</th>
				<th>estado</th>
				<th>Ações</th>
              </tr>
            </thead>
            <tbody>
				<?php 
			    while($linhas = $con-> fetch_array()){ 
					echo "<tr>";
						echo "<td>".$linhas['nome_autor']."</td>";
						echo "<td>".$linhas['telefone_autor']."</td>";
						echo "<td>".$linhas['endereco_autor']."</td>";
						echo "<td>".$linhas['complemento_autor']."</td>";
						echo "<td>".$linhas['cep_autor']."</td>";
						echo "<td>".$linhas['municipio_autor']."</td>";
						echo "<td>".$linhas['estado_autor']."</td>";
						?>
						<td> 
						<a href='btn_editar_autor.php?id=<?php echo $linhas['cod_autor']; ?>'><button type='button' class='btn btn-sm btn-warning'>Editar</button></a>
						
				<?php
						$cod_autor = $linhas['cod_autor'];
						$result_usuario = "SELECT * FROM titulos_autores WHERE cod_autor = '$cod_autor' LIMIT 1";
						$resultado_usuario = mysqli_query($conn, $result_usuario);
						$resultado = mysqli_fetch_assoc($resultado_usuario);
						//Encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário 
						if(!isset($resultado)){
						?>	<a href='btn_excluir_autor.php?id=<?php echo $linhas['cod_autor']; ?>'><button type='button' class='btn btn-sm btn-danger'>Excluir</button></a>
						<?php
						}
						
					echo "</tr>";
				}
			?>
            </tbody>
          </table>
        </div>
		</div>
	</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>

    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
