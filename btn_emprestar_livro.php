<?php
	session_start();
	
	if($_SESSION['classificacao_usuario'] != "4" ){
		header("Location: home.php");
	}

	
	include_once("conexao.php");
	$id= $_GET["id"];
	$_SESSION['id_temporario'] = $id;
	
	$consulta = "SELECT * FROM usuarios where classificacao_usuario < 4 ";
	$con = $conn -> query ($consulta) or die ($conn);
		
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<link rel="icon" href="imagens/book.ico">
	<title>Bookollege</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="js/ie-emulation-modes-warning.js"></script>
	<link href="css/bootstrap.css" rel="stylesheet">
</head>
<body class="blurBg-false" style="background-color:#EBEBEB">


<!-- Start Formoid form-->
<link rel="stylesheet" href="formoid_files/formoid1/formoid-solid-blue.css" type="text/css" />
<script type="text/javascript" src="formoid_files/formoid1/jquery.min.js"></script>
<form class="formoid-solid-blue" action="valida_emprestar_livro.php" style="background-color:#FFFFFF;font-size:14px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#34495E;max-width:480px;min-width:150px" method="post"><div class="title"><h2>Emprestar livro</h2></div>
	<div class="element-select"><label class="title"><span class="required">Consulentes</span></label><div class="item-cont"><div class="large"><span><select name="consulente" required="required">

	<?php while($linhas = $con-> fetch_array()) { ?>
	<option value="<?php echo $linhas['cod_usuario'] ?>"><?php echo $linhas['nome_usuario'] ?></option>
	<?php } ?>
	</select><i></i><span class="icon-place"></span></span></div></div></div>
	
<div class="submit"><input type="submit" value="Confirmar"/></div></form><p class="frmd"><a href="http://formoid.com/v29.php">online form</a> Formoid.com 2.9</p><script type="text/javascript" src="formoid_files/formoid1/formoid-solid-blue.js"></script>
<!-- Stop Formoid form-->



<div id="button">
	<p class="text-center"><a class="text-center" href="emprestar_livro.php">Retornar a página anterior</a> </p>
</div>


</body>
</html>
