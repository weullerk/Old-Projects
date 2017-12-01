<?php

/**
 * Controller do Ranking
 *
 * @author Weuller Krysthian <weuller.krysthian@hotmail.com>
 * @since 18/09/12
 */
require_once('../model/ViewCharacters.class.php');
require_once('../model/ViewClans.class.php');

class Controller_Ranking {

    private $ranking, $raca, $classe, $levelInicial, $levelFinal, $limite;

    public function __construct() {
        
    }

    public function setRanking($r) {
        $this->ranking = $r;
    }

    public function setRaca($r) {
        $this->raca = $r;
    }

    public function setClasse($c) {
        $this->classe = $c;
    }

    public function setLevelInicial($li) {
        $this->levelInicial = $li;
    }

    public function setLevelFinal($lf) {
        $this->levelFinal = $lf;
    }

    public function setLimite($l) {
        $this->limite = $l;
    }

    private function formataTempoOn($t) {
        $tempo = $t / 60 / 60 / 24;
        $tempo = explode('.', $tempo);
        $dias = $tempo[0];
        $horas_min = $tempo[1];
        $horas_min = (float) (0) . '.' . $horas_min;
        $horas_min = $horas_min * 24;
        $horas_min = explode('.', $horas_min);
        $horas = $horas_min[0];
        $min = $horas_min[1];
        $min = (float) (0) . '.' . $min;
        $min = $min * 60;
        $min = explode('.', $min);
        $min = $min[0];
        return $dias . 'd, ' . $horas . 'h e ' . $min . 'm';
    }

    public function getRankingCharacterJSON() {
        if (in_array($this->ranking, array('pvp', 'pk', 'level', 'karma', 'tempoOn', 'recomendacoes', 'cp', 'hp'))) {
            if (ctype_digit($this->limite)) {
                if (ctype_alnum($this->classe)) {
                    if (ctype_alnum($this->raca)) {
                        if (ctype_digit($this->levelInicial) && ctype_digit($this->levelFinal)) {
                            try {
                                $dbChars = new Model_ViewCharacters();
                                $rankingChar = $dbChars->select($this->ranking, $this->raca, $this->classe, $this->levelInicial, $this->levelFinal, $this->ranking, $this->limite);
                                if ($this->ranking == 'tempoOn') {
                                    for ($i = 0; $i < $this->limite; $i++) {
                                        $rankingChar[$i]['pontos'] = $this->formataTempoOn($rankingChar[$i]['pontos']);
                                    }
                                }
                            } catch (Exception $e) {
                                throw new Exception('Falha ao buscar clans');
                            }
                            return json_encode($rankingChar);
                        } else {
                            throw new Exception(utf8_decode('O level expecificado é inválido'));
                        }
                    } else {
                        throw new Exception(utf8_decode('A raça expecificada é inválida'));
                    }
                } else {
                    throw new Exception(utf8_decode('A classe expecificada é inválida'));
                }
            } else {
                throw new Exception(utf8_decode('O limite expecificado é inválido'));
            }
        } else {
            throw new Exception(utf8_decode('O ranking expecificado é inválido'));
        }
    }

    public function getRankingClanJSON() {
        if (in_array($this->ranking, array('level', 'reputacao', 'membros', 'pvp', 'pk'))) {
            if (ctype_digit($this->limite)) {
                try {
                    $dbClans = new Model_ViewClans();
                    $rankingClan = $dbClans->select($this->ranking, $this->ranking, $this->limite);
                } catch (Exception $e) {
                    throw new Exception('Falha ao buscar clans');
                }
                return json_encode($rankingClan);
            } else {
                throw new Exception(utf8_decode('O limite expecificado é invalido'));
            }
        } else {
            throw new Exception(utf8_decode('O ranking expecificado é invalido'));
        }
    }

}

?>
