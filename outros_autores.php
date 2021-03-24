<?php
	session_start();
	
	if($_SESSION['classificacao_usuario'] != "4" ){
		header("Location: home.php");
	}

	
	include_once("conexao.php");
	$cod_titulo= $_GET["id"];
	$_SESSION['id_temporario'] = $cod_titulo;
	
	$consulta = "SELECT * FROM autores";
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
<form class="formoid-solid-blue" action="valida_outros_autores.php" style="background-color:#FFFFFF;font-size:14px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#34495E;max-width:480px;min-width:150px" method="post"><div class="title"><h2>Autores</h2></div>
	<div class="element-select"><label class="title"><span class="required">Autores</span></label><div class="item-cont"><div class="large"><span><select name="autor" required="required">

	<?php while($linhas = $con-> fetch_array()) { 
			
		$cod_autor = $linhas['cod_autor'];
		$result_usuario = "SELECT * FROM titulos_autores WHERE cod_titulo = $cod_titulo AND cod_autor = $cod_autor LIMIT 1";
		$resultado_usuario = mysqli_query($conn, $result_usuario);
		$resultado = mysqli_fetch_assoc($resultado_usuario);
		if(!isset($resultado)){
			?>
			<option value="<?php echo $linhas['cod_autor'] ?>"><?php echo $linhas['nome_autor'] ?></option>
  <?php }
	}
			?>			
			
	
	</select><i></i><span class="icon-place"></span></span></div></div></div>
	
<div class="submit"><input type="submit" value="Cadastrar outro Autor"/></div></form><p class="frmd"><a href="http://formoid.com/v29.php">online form</a> Formoid.com 2.9</p><script type="text/javascript" src="formoid_files/formoid1/formoid-solid-blue.js"></script>
<!-- Stop Formoid form-->

</br>
<p class="text-center"> 
	<a href='palavras_chave.php?id=<?php echo$cod_titulo ?>'><button type='button' class='btn btn-sm btn-danger'>NÃO DESEJO CADASTRAR OUTRO AUTOR</button></a>
</p>

</body>
</html>