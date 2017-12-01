<?php
header("Content-Type: text/html; charset=UTF-8");
require_once("../configs/config.php");
require_once("../class/manipulaDB.class.php");

$conn = new manipulaDB(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);

$funcao = isset($_POST['funcao']) ? $_POST['funcao'] : NULL;
//Verifica se a requisição foi feita por ajax para exibir o codigo de erro, se não exibe a mensagem de erro normal.
$ajax = isset($_POST['ajax']) ? TRUE : FALSE;

//Faz o cadastro de uma nova conta
if($funcao == 'cadastro') {

	//Resgata dados do formulario
	$login = isset($_POST['login']) ? $_POST['login'] : NULL;
	$senha = isset($_POST['senha']) ? $_POST['senha'] : NULL;
	$resenha = isset($_POST['resenha']) ? $_POST['resenha'] : NULL;

	//Encripta a senha
	function encriptaSenha($senha) {
			return base64_encode(pack("H*", sha1(utf8_encode($senha))));
	}
	
	if (//verifica dados vindo do formulário
	strlen($login) >= 4 AND strlen($login) <= 16 AND preg_match("/^[a-zA-Z0-9]+$/", $login) AND
	strlen($senha) >= 4 AND strlen($senha) <= 16 AND preg_match("/^[a-zA-Z0-9]+$/", $senha) AND
	$resenha == $senha		
	) {//se verificação der ok, passa para próxima etapa

		//verifica se a conta já existe
		$sql = "SELECT ". COLUMN_ACC_LOGIN ." FROM ". TABLE_ACC ." WHERE ". COLUMN_ACC_LOGIN ." = '". $login ."'";
		if ($conn->countData($conn->execSQL($sql)) < 1) {//se não existir continua
			
			//encripta senha e faz o cadastro da conta na database
			$senha = encriptaSenha($senha);
			$sql = "INSERT INTO ". TABLE_ACC ." 
			(". COLUMN_ACC_LOGIN .", ". COLUMN_ACC_PASSWORD .", lastactive, ". COLUMN_ACC_ACCESS_LEVEL .", lastIP, lastServer) 
			VALUES ('{$login}','{$senha}','0','0','\0','1')";
			$conn->execSQL($sql);//executa á query
			if ($ajax) {
				print '2'; //Cadastro efetuado com sucesso!
			} else {
				print 'Cadastro efetuado com sucesso!';
			}
			$conn->connectClose();
			
		} else {//se existir mostra mensagem
			if ($ajax) {
				print '1'; //Cadastro falhou, a conta já existe, tente novamente!
			} else {
				print 'Cadastro falhou, a conta já existe, tente novamente!';
			}
			$conn->connectClose();
		}
		
	} else {//se a verificação falhar, exibe erro.
		if ($ajax) {
			print '0'; //Cadastro falhou, dados inválidos, tente novamente!
		} else {
			print 'Cadastro falhou, dados inválidos, tente novamente!';
		}
	}
}
?>