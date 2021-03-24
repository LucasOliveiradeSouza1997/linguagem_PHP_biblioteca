<?php
	session_start();
	
	if($_SESSION['classificacao_usuario']  > "3" || $_SESSION['classificacao_usuario']  < "1"  ){
		header("Location: home.php");
	}
	include_once("conexao.php");
	$cod_usuario = $_SESSION['cod_usuario'];
	$consulta = "SELECT * FROM usuarios_exemplares WHERE cod_usuario = $cod_usuario "; 
	$con = $conn -> query ($consulta) or die ($conn);
	
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
	  <a class="navbar-brand" href="area_usuario.php">Bookollege</a>
	</div>
	<div id="navbar" class="navbar-collapse collapse">
	  <ul class="nav navbar-nav">            

		
		<li><a href="home.php">Voltar para a página principal</a></li>
		
		<li><a href="sair.php">Sair</a></li>
	  </ul>
	</div>
  </div>
</nav>
	<?php//-----------------------fim--menu _admin ----------------------------------------------------------------?>	
 </br>
	 <div class="container theme-showcase" role="main">   
	<div class="page-header">
	   <h1>Bem-vindo à área do usuário</h1></br>
	   <h2>Títulos Emprestados: </h2>
	</div><br/>
		<div class="container theme-showcase" role="main">      
      <div class="row">
        <div class="col-md-12">
          <table id="tabela" class="table table-hover">
            <thead>
              <tr>
                <th>nome do titulo</th>
				<th>editora</th>
				<th>area de conhecimento</th>
				<th>autores</th>
				<th>palavras-chave</th>
				<th>data_devolução</th>
              </tr>
            </thead>
            <tbody>
				<?php 
			    while($linhas = $con-> fetch_array()){ 
					echo "<tr>";
						$cod_exemplar = $linhas['cod_exemplar'];
						$result_usuario = "SELECT * FROM exemplares WHERE cod_exemplar = '$cod_exemplar' LIMIT 1";
						$resultado_usuario = mysqli_query($conn, $result_usuario);
						$resultado = mysqli_fetch_assoc($resultado_usuario);
						$cod_titulo = $resultado['cod_titulo'];
						$result_usuario = "SELECT * FROM titulos WHERE cod_titulo = '$cod_titulo' LIMIT 1";
						$resultado_usuario = mysqli_query($conn, $result_usuario);
						$resultado = mysqli_fetch_assoc($resultado_usuario);
						echo "<td>".$resultado['nome_titulo']."</td>";
						$cod_editora = $resultado['cod_editora'];
						$cod_area = $resultado['cod_area_de_conhecimento'];
						$result_usuario = "SELECT * FROM editoras WHERE cod_editora = '$cod_editora' LIMIT 1";
						$resultado_usuario = mysqli_query($conn, $result_usuario);
						$resultado = mysqli_fetch_assoc($resultado_usuario);
						echo "<td>".$resultado['nome_editora']."</td>";
						$result_usuario = "SELECT * FROM areas_de_conhecimento WHERE cod_area_de_conhecimento = '$cod_area' LIMIT 1";
						$resultado_usuario = mysqli_query($conn, $result_usuario);
						$resultado = mysqli_fetch_assoc($resultado_usuario);
						echo "<td>".$resultado['desc_area_de_conhecimento']."</td>";
						
						$consulta2 = "SELECT * FROM titulos_autores WHERE cod_titulo = '$cod_titulo' "; // selecionar todos os autores do livro
						$con2 = $conn -> query ($consulta2) or die ($conn);
						echo "<td>";
						while($linhas2 = $con2-> fetch_array()){ 
							$cod_autor = $linhas2['cod_autor'];
							$result_usuario = "SELECT * FROM autores WHERE cod_autor = '$cod_autor' LIMIT 1";
							$resultado_usuario = mysqli_query($conn, $result_usuario);
							$resultado = mysqli_fetch_assoc($resultado_usuario);
							echo $resultado['nome_autor']."</br>";
						
						}
						echo "</td>";
						
						$consulta3 = "SELECT * FROM titulos_palavras_chaves WHERE cod_titulo = '$cod_titulo' "; // selecionar todos as palavras_chave do livro
						$con3 = $conn -> query ($consulta3) or die ($conn);
						echo "<td>";
						while($linhas3 = $con3-> fetch_array()){ 
							$cod_palavra_chave = $linhas3['cod_palavra_chave'];
							$result_usuario = "SELECT * FROM palavras_chave WHERE cod_palavra_chave = '$cod_palavra_chave' LIMIT 1";
							$resultado_usuario = mysqli_query($conn, $result_usuario);
							$resultado = mysqli_fetch_assoc($resultado_usuario);
							echo $resultado['desc_palavra_chave']."</br>";
						
						}
						echo "</td>";
						echo "<td>".date('d/m/Y', strtotime($linhas['data_devolucao']))."</td>";
						
					echo "</tr>";
				}
			?>
            </tbody>
          </table>
        </div>
		</div>
	</div>

</div>
	</body>