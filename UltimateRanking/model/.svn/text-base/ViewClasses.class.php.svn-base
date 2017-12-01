<?php

/**
 * Model de vcharacter
 *
 * @author Weuller Krysthian <weuller.krysthian@hotmail.com>
 * @since 17/09/12
 */
require_once('../classes/ManipulaDB.class.php');

class Model_ViewClasses {

    public function __construct() {
        
    }
    
    function getClasses($raca) {
        if ($raca == 'all') {
            $sql = "SELECT idClasse, classe FROM vclasses";
        } else {
            $sql = "SELECT idClasse, classe FROM vclasses WHERE idRaca = {$raca}";
        }
        try {
            $db = new ManipulaDB();
            $db->execSQL($sql);
        } catch (Exception $e) {
            throw new Exception('Falha ao buscar as classes dos characters. <br /> Classe: ' . __CLASS__ . '. Metodo: ' . __METHOD__ . '<br />Error: ' . $e->getMessage());
        }
        return $db->listAllQr(PDO::FETCH_ASSOC);
    }

}

?>
