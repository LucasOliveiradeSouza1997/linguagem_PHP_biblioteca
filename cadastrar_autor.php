<?php
	session_start();
	
	if($_SESSION['classificacao_usuario'] != "4" ){
		header("Location: home.php");
	}
	include_once("conexao.php");
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
<form class="formoid-solid-blue" action="valida_cadastrar_autor.php" style="background-color:#FFFFFF;font-size:14px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#34495E;max-width:480px;min-width:150px" method="post"><div class="title"><h2>Cadastrar Autor</h2></div>
	<div class="element-input"><label class="title"><span class="required">Nome Completo</span></label><div class="item-cont"><input class="large" type="text" name="nome" required="required" placeholder=""/><span class="icon-place"></span></div></div>
	
	<div class="element-phone"><label class="title">Telefone(apenas números ):</label><div class="item-cont"><input class="large" type="tel"  maxlength="9" minlength="8"name="telefone" id="celular" placeholder="" value="" required/><span class="icon-place"></span></div></div><p class="text-center text-danger">	<?php 	if(isset($_SESSION['telefoneerro'])){	echo $_SESSION['telefoneerro'];	unset($_SESSION['telefoneerro']);	}?>	</p>
	
	
	<div class="element-input"><label class="title"><span class="required">Endereço</span></label><div class="item-cont"><input class="large" type="text" name="endereco" required="required" placeholder=""/><span class="icon-place"></span></div></div>
	<div class="element-input"><label class="title"></label>Complemento<div class="item-cont"><input class="large" type="text" name="complemento" placeholder=""/><span class="icon-place"></span></div></div>
	<div class="element-input"><label class="title"><span class="required">Município</span></label><div class="item-cont"><input class="large" type="text" name="municipio" required="required" placeholder=""/><span class="icon-place"></span></div></div>
	<div class="element-number"><label class="title"><span class="required">CEP (apenas números ):</span></label><div class="item-cont"><input class="medium" type="text" minlength="8" maxlength="8" name="cep" required="required" placeholder="" value=""/><span class="icon-place"></span></div></div> <p class="text-center text-danger">	<?php 	if(isset($_SESSION['ceperro'])){	echo $_SESSION['ceperro'];	unset($_SESSION['ceperro']);	}?>	</p>
	<div class="element-select"><label class="title"><span class="required">Estado</span></label><div class="item-cont"><div class="small"><span><select name="estado" required="required">

	<option value=""></option>
	<option value="AC">Acre</option>
	<option value="AL">Alagoas</option>
	<option value="AP">Amapá</option>
	<option value="AM">Amazonas</option>
	<option value="BA">Bahia</option>
	<option value="CE">Ceará</option>
	<option value="DF">Distrito Federal</option>
	<option value="ES">Espírito Santo</option>
	<option value="GO">Goiás</option>
	<option value="MA">Maranhão</option>
	<option value="MT">Mato Grosso</option>
	<option value="MS">Mato Grosso do Sul</option>
	<option value="MG">Minas Gerais</option>
	<option value="PA">Pará</option>
	<option value="PB">Paraíba</option>
	<option value="PR">Paraná</option>
	<option value="PE">Pernambuco</option>
	<option value="PI">Piauí</option>
	<option value="RJ">Rio de Janeiro</option>
	<option value="RN">Rio Grande do Norte</option>
	<option value="RS">Rio Grande do Sul</option>
	<option value="RO">Rondônia</option>
	<option value="RR">Roraima</option>
	<option value="SC">Santa Catarina</option>
	<option value="SP">São Paulo</option>
	<option value="SE">Sergipe</option>
	<option value="TO">Tocantins</option>
		
		</select><i></i><span class="icon-place"></span></span></div></div></div>
	<div id="button">

</div>
	
	</div>
<div class="submit"><input type="submit" value="Enviar"/></div>

</form><p class="frmd"><a href="http://formoid.com/v29.php">online form</a> Formoid.com 2.9</p><script type="text/javascript" src="formoid_files/formoid1/formoid-solid-blue.js"></script>
<!-- Stop Formoid form-->

<div id="button">
	<p class="text-center"><a class="text-center" href="autor.php">Retornar a página anterior</a> </p>
</div>


</body>
</html>