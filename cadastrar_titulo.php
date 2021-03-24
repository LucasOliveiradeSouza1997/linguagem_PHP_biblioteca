<?php
	session_start();
	
	if($_SESSION['classificacao_usuario'] != "4" ){
		header("Location: home.php");
	}

	include_once("conexao.php");
	$consulta = "SELECT * FROM editoras ";
	$con = $conn -> query ($consulta) or die ($conn);	
	
	$consulta2 = "SELECT * FROM areas_de_conhecimento";
	$con2 = $conn -> query ($consulta2) or die ($conn);

	$consulta3 = "SELECT * FROM autores";
	$con3 = $conn -> query ($consulta3) or die ($conn);	
		
	
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
	<script type="text/javascript">
    function optionCheck(){
        var option = document.getElementById("opcao").value;
        if(option == "0"){
            document.getElementById("hiddenDiv").style.visibility ="visible";
			document.getElementById("hiddenDiv").style.height ="50px";
			document.getElementById("hiddenDiv").style.width ="1000px";
			document.getElementById("area").required =true;
			document.getElementById("hiddenDiv2").style.visibility ="hidden";
			document.getElementById("hiddenDiv2").style.height ="0px";
			document.getElementById("hiddenDiv2").style.width ="0px";
			document.getElementById("area2").required =false;
        }
		
    }
	function optionCheck2(){
        var option = document.getElementById("opcao2").value;
        if(option == "1"){
            document.getElementById("hiddenDiv2").style.visibility ="visible";
			document.getElementById("hiddenDiv2").style.height ="50px";
			document.getElementById("hiddenDiv2").style.width ="100px";
			document.getElementById("area").required =false;
			document.getElementById("hiddenDiv").style.visibility ="hidden";
			document.getElementById("hiddenDiv").style.height ="0px";
			document.getElementById("hiddenDiv").style.width ="0px";
			document.getElementById("area2").required =true;
        }
    }
	function optionCheck3(){
        var option = document.getElementById("opcao2").value;
        if(option == "1"){
            document.getElementById("hiddenDiv2").style.visibility ="visible";
			document.getElementById("hiddenDiv2").style.height ="50px";
			document.getElementById("hiddenDiv2").style.width ="100px";
			document.getElementById("area2").required =true;
        }
    }
	
</script>
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
				<h1>Cadastrar Título</h1></br>
				<form action="valida_cadastrar_titulo.php" method="POST">
					<div class="form-group">
					

					<label for="Input-titulo">Nome do Título:</label>
					<input type="text" name="titulo" class="form-control"  maxlength="70" class="required" required="required" >
					</br>
					
					<div class="element-select"><label class="title"><span class="required">Editora</span></label><div class="item-cont"><div class="large"><span><select name="editora" required="required">

						<option value="">Selecione</option>
						<?php while($linhas = $con-> fetch_array()) { ?>
							<option value="<?php echo $linhas['cod_editora'] ?>"><?php echo $linhas['nome_editora'] ?></option>
						<?php } ?>
					</select><i></i><span class="icon-place"></span></span></div></div></div>
	
					</br>
					
					<div class="element-radio" ><label class="title" ><p class="text-center text-danger">	
	</label>		<div class="column column2"><label><input type="radio" name="area_opcao" value="0" id="opcao"  onchange="optionCheck()"required /><span>Cadastrar nova Área de Conhecimento</span></label></div><span class="clearfix"></span>
					<div class="column column2"><label><input type="radio" name="area_opcao" value="1" id="opcao2" onchange="optionCheck2()"required /><span>Selecionar Área de conhecimento</span></label></div><span class="clearfix"></span>
					</div>
					</br>
					<div id="hiddenDiv" style="height:0px;width:0px;border:1px;visibility:hidden;">
						<label for="Input-titulo">Área de Conhecimento:</label>
						<input type="text" name="area" id="area" class="form-control"  maxlength="70" class="required" required="required" >
					</div>
					
					<div id="hiddenDiv2" style="height:0px;width:0px;border:1px;visibility:hidden;">
						<div class="element-select"><label class="title"><span class="required" ></span></label><div class="item-cont"><div class="large"><span><select name="area2" required="required" id="area2">
	
						<option value="">Selecione</option>
						<?php while($linhas2 = $con2-> fetch_array()) { ?>
							<option value="<?php echo $linhas2['cod_area_de_conhecimento'] ?>"><?php echo $linhas2['desc_area_de_conhecimento'] ?></option>
						<?php } ?>
					</select><i></i><span class="icon-place"></span></span></div></div></div>
	
					</div>
					</br></br>
					
					<div class="element-number"><label class="title"><span class="required">Quantidade de Exemplares(mínimo 0) :</span></label><div class="item-cont"><input class="medium" type="number" min="0"  name="qtd_exemplar" required="required" placeholder="" value=""/><span class="icon-place"></span></div></div> <p class="text-center text-danger">	<?php 	if(isset($_SESSION['ceperro'])){	echo $_SESSION['ceperro'];	unset($_SESSION['ceperro']);	}?>	</p>
					</br>
		
					<div class="element-select"><label class="title"><span class="required">Autor</span></label><div class="item-cont"><div class="large"><span><select name="autor" required="required">

						<option value="">Selecione</option>
						<?php while($linhas3 = $con3-> fetch_array()) { ?>
							<option value="<?php echo $linhas3['cod_autor'] ?>"><?php echo $linhas3['nome_autor'] ?></option>
						<?php } ?>
					</select><i></i><span class="icon-place"></span></span></div></div></div>
					
					
					 
		
					</br></br>
					<input type="submit" class="btn btn btn-primary" value="Prosseguir">
				
				</form>
				
				
				
						
						</div>
					</div>
							
				</div>
			

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
