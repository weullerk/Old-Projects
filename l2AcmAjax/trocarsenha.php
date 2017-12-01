<?php require_once('configs/config.php'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="content-language" content="pt-br" />

<title><?php print SERVER_NAME; ?> - Trocar Senha</title>

<link href="css/style.css" type="text/css" rel="stylesheet" />

<script type="text/javascript" src="js/jquery-1.5.js"></script>
<script type="text/javascript" src="js/jquery.validity.js"></script>
<script type="text/javascript" src="js/validacoesExtras.js"></script>
<script type="text/javascript" src="js/validacaoTrocarSenha.js"></script>
<script type="text/javascript" src="js/trocarSenha.js"></script>

</head>

<body>
<h2>Trocar Senha</h2>
<div id="msg"></div>
<form name="trocarSenha" id="trocarSenha" method="post" action="functions/trocarsenha.php">
	<fieldset>
    	<label for="login">Login:</label>
        <input type="text" name="login" id="login" class="formInput" value="" />
        
        <label for="senhaantiga">Senha Antiga:</label>
        <input type="password" name="senhaantiga" id="senhaantiga" class="formInput" value="" />
        
        <label for="senhanova">Senha Nova:</label>
        <input type="password" name="senhanova" id="senhanova" class="formInput" value="" />
        
        <label for="resenha">Re-Senha Nova:</label>
        <input type="password" name="resenha" id="resenha" class="formInput" value="" />
		
		<input type="hidden" name="funcao" value="trocarsenha" />
        
        <input type="submit" name="trocarSenhaSubmit" id="trocarSenhaSubmit" class="formInput submit" value="Trocar Senha" />
    </fieldset>
</form>
</body>

</html>