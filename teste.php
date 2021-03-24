<?php
	session_start();
	
	include_once("conexao.php");
	$consulta = "SELECT * FROM exemplares "; // selecionar todos os livros
	$con = $conn -> query ($consulta) or die ($conn);
	
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
	
		<link rel="icon" href="imagens/book.ico">
		<title>Bookollege</title>
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
	<div id="general">
	
	<div id="logo">	      
		<img src="imagens\imagem_home.jpg">	
	</div>
	
	<div id="bem_vindo">
	<font size="4"> 
	<?php
	printf("Bem-Vindo(a) ");
	if(!isset($_SESSION["classificacao_usuario"])){
		printf("Visitante  ");
	}else{
		printf("%s - ", $_SESSION['nome_usuario'] );
		switch ( $_SESSION['classificacao_usuario']){
			case '1':printf("Aluno");break;
			case '2':printf("Professor");break;
			case '3':printf("Funcionário");break;
			case '4':printf("Bibliotecário");break;
			default:;
		}
	}
	?>
	</font size="4">
	</div>
	<div id="button">
		<?php
			if(!isset($_SESSION["classificacao_usuario"])){
				echo "<a href='login.php'> <button type='button' class='btn ttn-sm btn-info' >Fazer Login</button></a>";
				
			}else{
				if ($_SESSION['classificacao_usuario'] == 4){
					echo "<a href='area_bibliotecario.php'> <button type='button' class='btn ttn-sm btn-info' >Área do Bibliotecário</button></a>";
				}	
				else if ($_SESSION['classificacao_usuario'] >= 1 &&  $_SESSION['classificacao_usuario'] <= 3){
					echo "<a href='area_usuario.php'> <button type='button' class='btn ttn-sm btn-info' >Área do Usuário</button></a>";
				}	
				echo "<a href='sair.php'> <button type='button' class='btn ttn-sm btn-danger' >Sair</button></a>";
			}
		?>
	</div>
	<br/></br></br></br><font size="4">
	A Biblioteca Acadêmica Bookollege destina ao atendimento das necessidades de estudo e pesquisa dos alunos,professores
	e funcionários da Etec/Fatec, designados como consulentes. Destina-se ainda, somente para consulta,às demais unidades da
	Rede Paula Souza, os ex-alunos, outras instituições congêneres e comunidade.</br></br>
	</font size="4">
	
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
                <th>cod. exemplar</th>
                <th>nome do titulo</th>
				<th>editora</th>
				<th>area de conhecimento</th>
				<th>autores</th>
				<th>palavras-chave</th>
              </tr>
            </thead>
            <tbody>
				<?php 
			    while($linhas = $con-> fetch_array()){ 
					echo "<tr>";
						echo "<td>".$linhas['cod_exemplar']."</td>";
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
						echo "</td>";
						?>
						
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
	</body>