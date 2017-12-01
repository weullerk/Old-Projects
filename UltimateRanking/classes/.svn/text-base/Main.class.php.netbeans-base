<?php
/**
 * Classe que inicializa as configurações
 *
 * @author Weuller Krysthian <weuller.krysthian@hotmail.com>
 * @since 17/09/2012
 */
abstract class Main {
    
    /**
     * Caminho do arquivo de configuração. 
     */
    const MAIN_CONFIG_FILE = 'configs/main.ini';
        
    /**
     * Atributos do banco de dados
     */
    protected $DBHost, $DBPort, $DBUser, $DBPassword, $DBDatabase;
    
    /**
     * Inicializa as configurações 
     */
    public function __construct() {
        
        if (file_exists(MAIN::MAIN_CONFIG_FILE)) {
            $configs = parse_ini_file(MAIN::MAIN_CONFIG_FILE, true);
        } else {
            $configs = parse_ini_file('../' . MAIN::MAIN_CONFIG_FILE, true);
        }
        
        $this->DBHost = $configs['database']['servidor'];
        $this->DBPort = $configs['database']['porta'];
        $this->DBUser = $configs['database']['usuario'];
        $this->DBPassword = $configs['database']['senha'];
        $this->DBDatabase = $configs['database']['database'];
    }
}

?>
