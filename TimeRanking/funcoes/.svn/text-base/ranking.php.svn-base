
<?php

if (isset($_REQUEST['requisicao']) && $_REQUEST['requisicao'] == 'ajax') {
    require_once('../controller/Ranking.class.php');
    $classes = new Controller_Ranking();
    if (isset($_REQUEST['tipo']) && $_REQUEST['tipo'] == 'char') {
        try {
            $classes->setTipoRanking(isset($_REQUEST['tipor']) ? strip_tags($_REQUEST['tipor']) : false);
            $classes->setRanking(isset($_REQUEST['ranking']) ? strip_tags($_REQUEST['ranking']) : false);
            $classes->setRaca(isset($_REQUEST['raca']) ? strip_tags($_REQUEST['raca']) : null);
            $classes->setClasse(isset($_REQUEST['classe']) ? strip_tags($_REQUEST['classe']) : null);
            $classes->setLevelInicial(isset($_REQUEST['lvlIni']) ? ($_REQUEST['lvlIni'] == '' ? '1' : strip_tags($_REQUEST['lvlIni'])) : '1');
            $classes->setLevelFinal(isset($_REQUEST['lvlFin']) ? ($_REQUEST['lvlFin'] == '' ? '80' : strip_tags($_REQUEST['lvlFin'])) : '80');
            $classes->setLimite(isset($_REQUEST['limite']) ? strip_tags($_REQUEST['limite']) : false);
            echo $classes->getRankingCharacterJSON();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    } else if (isset($_REQUEST['tipo']) && $_REQUEST['tipo'] == 'clan') {
        try {
            $classes->setRanking(isset($_REQUEST['ranking']) ? strip_tags($_REQUEST['ranking']) : false);
            $classes->setLimite(isset($_REQUEST['limite']) ? strip_tags($_REQUEST['limite']) : false);
            echo $classes->getRankingClanJSON();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
?>
