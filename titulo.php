<?php
	session_start();
	
	include_once("conexao.php");
	$consulta = "SELECT * FROM titulos";
	$con = $conn -> query ($consulta) or die ($conn);
	
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
	
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/div.css"/>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" href="imagens/book.ico">
		<title>Bookollege</title>
		<script src="https://code.jquery.com/jquery-3.1.1.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.quicksearch/2.3.1/jquery.quicksearch.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">  
  </head>
</head>
	<body>
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
  </br></br></br></br>
	 <div class="container theme-showcase" role="main">   
	<div class="page-header">
        <h1>Títulos</h1>
		Clique no Botão para Cadastrar um novo titulo: <a href="cadastrar_titulo.php"> <button type="button" class="btn ttn-sm btn-info" >Cadastrar Título</button></a>
		</div><div class="container theme-showcase" role="main">
	<div id="general">
	
	<div class="form-group input-group">
	<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
            <input name="consulta" id="txt_consulta" placeholder="Consultar" type="text" class="form-control">
        </div>
		

			<br/>
		<div class="container theme-showcase" role="main">      
      <div class="row">
        <div class="col-md-12">
          <table id="tabela" class="table table-hover">
            <thead>
              <tr>
                <th>cod. título</th>
                <th>nome do titulo</th>
				<th>editora</th>
				<th>area de conhecimento</th>
				<th>autores</th>
				<th>palavras-chave</th>
				<th>Ações</th>
              </tr>
            </thead>
            <tbody>
				<?php 
			    while($linhas = $con-> fetch_array()){ 
					echo "<tr>";
						echo "<td>".$linhas['cod_titulo']."</td>";
						$cod_titulo = $linhas['cod_titulo'];
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
						echo "</td>"; ?>
						<td>
						<a href='btn_adicionar_exemplar.php?id=<?php echo $linhas['cod_titulo']; ?>'><button type='button' class='btn btn-sm btn-warning'>Adicionar Exemplares</button></a>
						<?php
						$teste=0;
						$consulta3 = "SELECT * FROM exemplares WHERE cod_titulo = '$cod_titulo' ";
						$con3 = $conn -> query ($consulta3) or die ($conn);
						while($linhas3 = $con3-> fetch_array()){ 
							$cod_exemplar = $linhas3['cod_exemplar'];
							
							$result_usuario = "SELECT * FROM usuarios_exemplares WHERE cod_exemplar = '$cod_exemplar' LIMIT 1";
							$resultado_usuario = mysqli_query($conn, $result_usuario);
							$resultado = mysqli_fetch_assoc($resultado_usuario);
							
							if(isset($resultado)){
								$teste = 1;
							}
						}
						
						
						if($teste == 0){
						?>	<a href='btn_excluir_titulo.php?id=<?php echo $cod_titulo; ?>'><button type='button' class='btn btn-sm btn-danger'>Excluir</button></a>
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

        <script>
            $('input#txt_consulta').quicksearch('table#tabela tbody tr');
        </script>
	
	</div>
	</div>
	</body>