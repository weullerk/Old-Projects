<?php
header("Content-Type: text/html; charset=UTF-8");
require_once("../configs/config.php");
require_once("../class/manipulaDB.class.php");

$conn = new manipulaDB(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);

$funcao = isset($_POST['funcao']) ? $_POST['funcao'] : NULL;
//Verifica se a requisição foi feita por ajax para exibir o codigo de erro, se não exibe a mensagem de erro normal.
$ajax = isset($_POST['ajax']) ? TRUE : FALSE;

//Faz o cadastro de uma nova conta
if($funcao == 'trocarsenha') {

	//Resgata dados do formulario
	$login = isset($_POST['login']) ? $_POST['login'] : NULL;
	$senhaantiga = isset($_POST['senhaantiga']) ? $_POST['senhaantiga'] : NULL;
	$senhanova = isset($_POST['senhanova']) ? $_POST['senhanova'] : NULL;
	$resenha = isset($_POST['resenha']) ? $_POST['resenha'] : NULL;

	//Encripta a senha
	function encriptaSenha($senha) {
			return base64_encode(pack("H*", sha1(utf8_encode($senha))));
	}
	
	if (//verifica dados vindo do formulário
	strlen($login) >= 4 AND strlen($login) <= 16 AND preg_match("/^[a-zA-Z0-9]+$/",$login) AND
	strlen($senhaantiga) >= 4 AND strlen($senhaantiga) <= 16 AND preg_match("/^[a-zA-Z0-9]+$/",$senhaantiga) AND
	strlen($senhanova) >= 4 AND strlen($senhanova) <= 16 AND preg_match("/^[a-zA-Z0-9]+$/",$senhanova) AND
	$resenha == $senhanova
	) {//se verificação der ok, passa para próxima etapa
		
		//verifica se o login é valido
		$sql = "SELECT * FROM ". TABLE_ACC ." WHERE ". COLUMN_ACC_LOGIN ." = '". $login ."'";
		if ($conn->countData($conn->execSQL($sql)) >= 1) {
			
			//verifica se a senha é igual a da database
			$senhaantiga = encriptaSenha($senhaantiga);//encripta senha
			$dados = $conn->listQr($conn->execSQL($sql));//pega dados da database
			$colunaAccSenha = COLUMN_ACC_PASSWORD;
			if ($senhaantiga == $dados->$colunaAccSenha) {
				
				//encripta senha e faz alteração na database
				$senhanova = encriptaSenha($senhanova);
				$sql = "UPDATE ". TABLE_ACC ." SET ". COLUMN_ACC_PASSWORD ." = '". $senhanova ."' WHERE ". COLUMN_ACC_LOGIN ." = '". $login ."'";
				$conn->execSQL($sql);//executa a query
				if ($ajax) {
					print '3';
				} else {
					print 'Troca de senha efetuada com sucesso!';
				}
				$conn->connectClose();
				
			} else {//se a senha não for igual envia a mensagem
				if ($ajax) {
					print '2'; //Troca de senha falhou, a senha antiga não confere, tente novamente!
				} else {
					print 'Troca de senha falhou, a senha antiga n&atilde;o confere, tente novamente!';
				}
				$conn->connectClose();
			}
			
		} else {//se o login for inválido envia a mensagem
			if ($ajax) {
				print '1'; //Troca de senha falhou, login inv&aacute;lido, tente novamente
			} else {
				print 'Troca de senha falhou, login inv&aacute;lido, tente novamente!';
			}
			$conn->connectClose();
		}
		
	} else {//se a verificacao de dados falhar envia a mensagem
		if ($ajax) {
			print '0'; //Troca de senha falhou, dados inv&aacute;lidos, tente novamente!
		} else {
			print 'Troca de senha falhou, dados inv&aacute;lidos, tente novamente!';
		}
	}
}
?>