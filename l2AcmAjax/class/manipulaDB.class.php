<?php
/*
* Classe de manipulação de dados mysql
* Criado por Weuller Krysthian em 03/08/2011
* ATUALIZADA EM 26/11/2011
*/
class manipulaDB{
	
	private $server, $user, $password, $database, $port;
	private $con, $dba, $sql, $qr, $data, $totalFields;
	
	public function __construct($server, $user, $password, $database, $port){
		$this->server = $server;
		$this->user = $user;
		$this->password = $password;
		$this->database = $database;
		$this->port = $port;
		self::connect();
	}
	
	//Método que faz conexão com database
	public function connect(){
		$this->con = mysql_connect("$this->server:$this->port", $this->user, $this->password) or die ("<b><center>Erro ao conectar ao banco de dados: </center></b><br />".mysql_error());
		$this->dba = mysql_select_db($this->database) or die("<b><center>Erro ao selecionar database: </center></b><br />".mysql_error());
	}
	
	//Método que executa algum comando sql
	public function execSQL($sql){
		$this->qr = mysql_query($sql) or die("<b><center>Falha ao executar SQL - $sql: </center></b><br />".mysql_error());
		return $this->qr;
	}
	
	//Método que lista o resultado e transforma em objeto
	public function listQr($qr){
		$this->data = mysql_fetch_object($qr);
		return $this->data;
	}
	
	//Método que conta o numero de resultados na tabela
	public function countData($qr){
		$this->totalFields = mysql_num_rows($qr);
		return $this->totalFields;
	}
	
	//Método que fecha conexão com sql
	public function connectClose(){
		mysql_close($this->con);
	}	
}
?>