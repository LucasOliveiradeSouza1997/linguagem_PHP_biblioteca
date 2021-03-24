<?php
	session_start();
	
	include_once("conexao.php");
	$consulta = "SELECT * FROM usuarios_exemplares ";
	$con = $conn -> query ($consulta) or die ($conn);
	
	$result_usuario = "select * from informacoes ";			
	$resultado_usuario = mysqli_query($conn, $result_usuario);
	$resultado = mysqli_fetch_assoc($resultado_usuario);
	$renovacao = $resultado['dias_renovacao'];
	
	
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
	
		<title>Bookollege</title>
		<link rel="icon" href="imagens/book.ico">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/div.css"/>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://code.jquery.com/jquery-3.1.1.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.quicksearch/2.3.1/jquery.quicksearch.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">  
  </head>
		<title>Sistema Biblioteca</title>
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
        <h1>Livros Emprestados</h1>
		<font size="4">
		</br><?php echo "Renovar Livro : Quantidade em dias : ".$renovacao?>
		</font>
		</div>
	<div class="container theme-showcase" role="main">
	<div id="general">
	
	<div class="form-group input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
            <input name="consulta" id="txt_consulta" placeholder="Consultar" type="text" class="form-control">
        </div>

		<div class="container theme-showcase" role="main">      
      <div class="row">
        <div class="col-md-12">
          <table id="tabela" class="table table-hover">
            <thead>
              <tr>
                <th>Nome Do Consulente</th>
                <th>telefone</th>
				<th>endereço</th>
				<th>Nome do Livro</th>
				<th>Data Empréstimo</th>
				<th>Data Devolução</th>
				<th>Ação</th>
              </tr>
            </thead>
            <tbody>
				<?php 
			    while($linhas = $con-> fetch_array()){ 
					echo "<tr>";
						$cod_usuario = $linhas['cod_usuario'];
						$result_usuario = "SELECT * FROM usuarios WHERE cod_usuario = $cod_usuario";
						$resultado_usuario = mysqli_query($conn, $result_usuario);
						$resultado = mysqli_fetch_assoc($resultado_usuario);
						echo "<td>".$resultado['nome_usuario']."</td>";
						echo "<td>".$resultado['telefone_usuario']."</td>";
						echo "<td>".$resultado['endereco_usuario']."</td>";
						$cod_exemplar = $linhas['cod_exemplar'];
						$result_usuario = "SELECT * FROM exemplares WHERE cod_exemplar = $cod_exemplar";
						$resultado_usuario = mysqli_query($conn, $result_usuario);
						$resultado = mysqli_fetch_assoc($resultado_usuario);
						$cod_titulo = $resultado['cod_titulo'];
						$result_usuario = "SELECT * FROM titulos WHERE cod_titulo = $cod_titulo";
						$resultado_usuario = mysqli_query($conn, $result_usuario);
						$resultado = mysqli_fetch_assoc($resultado_usuario);
						echo "<td>".$resultado['nome_titulo']."</td>";
						echo "<td>".date('d/m/Y', strtotime($linhas['data_emprestimo']))."</td>";
						echo "<td>".date('d/m/Y', strtotime($linhas['data_devolucao']))."</td>";
						?>
						<td> 
						<a href='btn_renovar.php?<?php echo "campo1=".$cod_usuario."&campo2=".$cod_exemplar; ?>'><button type='button' class='btn btn-sm btn-warning'>Renovar</button></a>
						<a href='btn_devolver_livro.php?<?php echo "campo1=".$cod_usuario."&campo2=".$cod_exemplar; ?>'><button type='button' class='btn btn-sm btn-danger'>Devolver</button></a>
						
					<?php
						
						
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
	</div>
</body>