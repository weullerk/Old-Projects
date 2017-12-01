<?php

/**
 * Classe que realiza as operações com o banco de dados.
 *
 * @author Weuller Krysthian <weuller.krysthian@hotmail.com>
 * @since 17/09/12
 */
require_once('Main.class.php');

class ManipulaDB extends Main {

    private $driver, $host, $port, $user, $password, $database, $qr;

    public function __construct() {
        parent::__construct();
        $this->driver = 'MySQL';
        $this->host = $this->DBHost;
        $this->port = $this->DBPort;
        $this->user = $this->DBUser;
        $this->password = $this->DBPassword;
        $this->database = $this->DBDatabase;
    }
    
    /**
     * Método que realiza a conexão com o banco de dados escolhido
     * @return PDO
     * @throws Exception 
     * @author Weuller Krysthian <weuller.krysthian@hotmail.com>
     * @since 17/09/2012 
     */
    private function connect() {
        if ($this->driver == 'SQLite') {
            try {
                $dba = new PDO("sqlite:$this->database");
            } catch (PDOException $e) {
                throw new Exception("Falha ao connectar no banco de dados.: " . $e->getMessage());
            }
        } else if ($this->driver == 'FireBird') {
            try {
                $dba = new PDO("firebird:dbname=C:\\$this->database", $this->user, $this->password);
            } catch (PDOException $e) {
                throw new Exception("Falha ao connectar no banco de dados.: " . $e->getMessage());
            }
        } else if ($this->driver == 'MySQL') {
            try {
                return new PDO("mysql:unix_socket=/tmp/mysql.sock;host={$this->host};port={$this->port}; dbname={$this->database}", $this->user, $this->password);
            } catch (PDOException $e) {
                throw new Exception("Falha ao connectar no banco de dados.: " . $e->getMessage());
            }
        } else if ($this->driver == 'Postgres') {
            try {
                return new PDO("pgsql:dbname={$this->database};user={$this->user};password={$this->password};host={$this->host}");
            } catch (PDOException $e) {
                throw new Exception("Falha ao connectar no banco de dados.: " . $e->getMessage());
            }
        } else {
            throw new Exception('Banco de dados inválido, escolha um banco de dados válido!');
        }
    }
    
    /**
     * Método que realiza uma operação no banco de dados
     * @param type $sql 
     * @author Weuller Krysthian <weuller.krysthian@hotmail.com>
     * @since 17/09/2012 
     */
    public function execSQL($sql) {
        $db = $this->connect();
        $this->qr = $db->query($sql);
        if ($this->qr == false) {
            throw new Exception('Falha ao executar a query: <b>"' . $sql . '"</b>.');
        }
        $db = NULL;
    }

    /**
     * Método que retorna todas os resultados do banco de dados
     * @param PDO $type
     * @return Mixed
     * @author Weuller Krysthian <weuller.krysthian@hotmail.com>
     * @since 17/09/2012 
     */
    public function listAllQr($type = PDO::FETCH_OBJ) {
        return $this->qr->fetchAll($type);
    }
    
    /**
     * Método que retorna um resultado por vez do banco de dados
     * @param PDO $type
     * @return Mixed
     * @author Weuller Krysthian <weuller.krysthian@hotmail.com>
     * @since 17/09/2012 
     */
    public function listQr($type = PDO::FETCH_OBJ) {
        return $this->qr->fetch($type);
    }
    
    /**
     * Método que retorna a quantidade de linhas afetadas durante a ultima operação
     * @return Integer
     * @author Weuller Krysthian <weuller.krysthian@hotmail.com>
     * @since 17/09/2012  
     */
    public function countData() {
        return $this->qr->rowCount();
    }

}

?>
