<?php

/**
 * Model de vclans
 *
 * @author Weuller Krysthian <weuller.krysthian@hotmail.com>
 * @since 18/09/12
 */
require_once('../classes/ManipulaDB.class.php');

class Model_ViewClans {

    public function select($ranking, $orderBy = null, $limite = 30) {
        $sql = "SELECT nome, lider, alianca, castelo, {$ranking} AS pontos FROM vclans ORDER BY {$orderBy} DESC LIMIT {$limite}";
        try {
            $db = new ManipulaDB();
            $db->execSQL($sql);
        } catch (Exception $e) {
            throw new Exception('Falha ao buscar o ranking de clan. <br /> Classe: ' . __CLASS__ . '. Metodo: ' . __METHOD__ . '<br />Error: ' . $e->getMessage());
        }
        return $db->listAllQr(PDO::FETCH_ASSOC);
    }

}

?>
