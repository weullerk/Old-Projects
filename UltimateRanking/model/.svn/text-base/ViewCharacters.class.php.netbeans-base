<?php

/**
 * Model de vcharacter
 *
 * @author Weuller Krysthian <weuller.krysthian@hotmail.com>
 * @since 17/09/12
 */
require_once('../classes/ManipulaDB.class.php');

class Model_ViewCharacters {

    public function __construct() {
        
    }

    function select($ranking, $idRaca, $idClasse, $lvlInicial, $lvlFinal, $orderBy = null, $limite = 30) {
        $idRaca = ($idRaca == 'all' ? '' : $idRaca);
        $classe = ($idClasse == 'all' ? "idClasse LIKE '%%'" : "idClasse = $idClasse");
        $sql = "SELECT nome, raca, classe, clan, {$ranking} AS pontos
                FROM vcharacters
                WHERE idRaca LIKE '%{$idRaca}%'
                AND {$classe}
                AND level >= {$lvlInicial}
                AND level <= {$lvlFinal}
                ORDER BY {$orderBy} DESC
                LIMIT {$limite}";
        try {
            $db = new ManipulaDB();
            $db->execSQL($sql);
        } catch (Exception $e) {
            throw new Exception('Falha ao buscar o ranking de characters. <br /> Classe: ' . __CLASS__ . '. Metodo: ' . __METHOD__ . '<br />Error: ' . $e->getMessage());
        }
        return $db->listAllQr(PDO::FETCH_ASSOC);
    }

    function getClasses($raca) {
        if ($raca == false) {
            $sql = "SELECT idClasse AS idClasse, classe FROM vcharacters GROUP BY idClasse";
        } else {
            $sql = "SELECT idClasse AS idClasse, classe FROM vcharacters WHERE idRaca = {$raca} GROUP BY idClasse";
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
