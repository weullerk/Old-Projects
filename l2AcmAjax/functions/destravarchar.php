<?php
header("Content-Type: text/html; charset=UTF-8");
require_once("../configs/config.php");
require_once("../class/manipulaDB.class.php");

$conn = new manipulaDB(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);

$funcao = isset($_POST['funcao']) ? $_POST['funcao'] : NULL;
//Verifica se a requisição foi feita por ajax para exibir o codigo de erro, se não exibe a mensagem de erro normal.
$ajax = isset($_POST['ajax']) ? TRUE : FALSE;

//Faz o cadastro de uma nova conta
if($funcao == 'destravarchar') {

	//Resgata dados do formulario
	$login = isset($_POST['login']) ? $_POST['login'] : NULL;
	$senha = isset($_POST['senha']) ? $_POST['senha'] : NULL;
	$resenha = isset($_POST['resenha']) ? $_POST['resenha'] : NULL;
	$char = isset($_POST['char']) ? $_POST['char'] : NULL;

	//Encripta a senha
	function encriptaSenha($senha) {
			return base64_encode(pack("H*", sha1(utf8_encode($senha))));
	}
	
	if ( //verifica dados do formulario
	strlen($login) >= 4 AND strlen($login) <= 16 AND preg_match("/^[a-zA-Z0-9]+$/",$login) AND
	strlen($senha) >= 4 AND strlen($senha) <= 16 AND preg_match("/^[a-zA-Z0-9]+$/",$senha) AND
	strlen($char) >= 2 AND strlen($char) <= 16 AND preg_match("/^[a-zA-Z0-9]+$/",$char) AND
	$resenha == $senha
	) {//se verificação for ok continua
		$sql = "SELECT * FROM " . TABLE_ACC . " WHERE ". COLUMN_ACC_LOGIN ." = '". $login ."'";
		if ($conn->countData($conn->execSQL($sql)) >= 1) {//verifica se login existe
		
			$dados = $conn->listQr($conn->execSQL($sql));
			$senha = encriptaSenha($senha);
			$password = COLUMN_ACC_PASSWORD;
			
			if ($senha == $dados->$password) {//verifica se senha do form é igual a da database
				$sql = "SELECT * FROM ". TABLE_CHAR ." WHERE ". COLUMN_CHAR_ACC_NAME ." = '{$login}' AND ". COLUMN_CHAR_NAME ." = '{$char}'";
				if ($conn->countData($conn->execSQL($sql)) >= 1) {//verifica se char existe
				
					$sql = "UPDATE ". TABLE_CHAR ." SET x = '82551', y = '147943', z = '-3404' WHERE ". COLUMN_CHAR_NAME ." = '{$char}'";
					$conn->execSQL($sql);
					if ($ajax) {
						print '4'; //Char destravado com sucesso!
					} else {
						print 'Char destravado com sucesso!';
					}
					$conn->connectClose();
					
				} else {//se char não existir gera msg de erro
					if ($ajax) {
						print '3'; //Falha ao destravar char, o char não existe!
					} else {
						print 'Falha ao destravar char, o char não existe!';
					}
					$conn->connectClose();
				}//fim da verificação do char
			
			} else {//se a senha não for igual gera msg de erro
				if ($ajax) {
					print '2'; //Falha ao destravar char, senha inválida!
				} else {
					print 'Falha ao destravar char, senha inválida!';
				}
				$conn->connectClose();
			}//fim da verificação de senha		
		
		} else {//se login não existir gera msg de erro
			if ($ajax) {
				print '1'; //Falha ao destravar char, login inválido!
			} else {
				print 'Falha ao destravar char, login inválido!';
			}
			$conn->connectClose();
		}//fim da verificação de login
	
	} else {//se dados não forem validos, gera msg de erro
		if ($ajax) {
			print '0'; //Falha ao destravar char, dados inválidos!
		} else {
			print 'Falha ao destravar char, dados inválidos!';
		}
	}//fim da verificação dos dados do formulario
}
?>