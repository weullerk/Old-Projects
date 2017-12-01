<?php require_once('configs/config.php'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="content-language" content="pt-br" />

<title><?php print SERVER_NAME; ?> - Cadastro</title>

<link href="css/style.css" type="text/css" rel="stylesheet" />

<script type="text/javascript" src="js/jquery-1.5.js"></script>
<script type="text/javascript" src="js/jquery.validity.js"></script>
<script type="text/javascript" src="js/validacoesExtras.js"></script>
<script type="text/javascript" src="js/validacaoCadastro.js"></script>
<script type="text/javascript" src="js/cadastro.js"></script>

</head>

<body>
<h2>Cadastro</h2>
<div id="msg"></div>
<form name="cadastro" id="cadastro" method="post" action="functions/cadastro.php">
	<fieldset>
		<label for="login">Login:</label>
		<input type="text" name="login" id="login" class="formInput" value="" />
		
		<label for="senha">Senha:</label>
		<input type="password" name="senha" id="senha" class="formInput" value="" />
		
		<label for="resenha">Re-Senha:</label>
		<input type="password" name="resenha" id="resenha" class="formInput" value="" />
		
		<input type="hidden" name="funcao" value="cadastro" />
		
		<input type="submit" name="cadastroSubmit" id="cadastroSubmit" class="formInput submit" value="Cadastrar" />
	</fieldset>
</form>
</body>

</html>