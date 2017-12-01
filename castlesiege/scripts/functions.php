<?php

/**
 * Castle Siege Script By Weuller Krysthian - weuller_krysthian@hotmail.com
 * Criado em 26/02/2013
 * 
 * Instruções de uso:
 * Depois de colocar os arquivos dentro do seu site, configure as informações nas linhas de 13 á 19, com as suas configurações. 
 */

if (!defined('CASTLE_SIEGE')) exit('<meta charset="utf-8">VOCÊ NÃO TEM PERMISSÃO PARA ACESSAR ESTE ARQUIVO!');

define('BASE_URL', 'http://localhost/castlesiege/');
define('SERVER', 'localhost');
define('PORT', '3306');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DATABASE', 'interlude');
define('PAGE_WIDTH', '700px');

function connect() {
    $conn = mysql_connect(SERVER . ':' . PORT, USERNAME, PASSWORD) or die('Falha ao conectar no banco de dados!');
    mysql_select_db(DATABASE, $conn) or die('Falha ao selecionar banco de dados!');
}

function close() {
    mysql_close();
}

function listQuery($sql) {
    connect();
    $query = mysql_query($sql) or die('Falha ao executar consulta no banco de dados!');
    close();
    $result = array();
    $i = 0;
    while ($row = mysql_fetch_assoc($query)) {
        $result[$i] = $row;
        $i++;
    }
    return $result;
}

function countQuery($sql) {
    connect();
    $query = mysql_query($sql) or die('Falha ao executar consulta no banco de dados!');
    close();
    return mysql_num_rows($query);
}

function listCastle() {
    $sql = 'SELECT id, name, taxPercent, siegeDate, IF(ISNULL(clan_name), "Sem Dono", clan_name) AS owner
            FROM castle c
            LEFT JOIN clan_data cd ON (cd.hasCastle = c.id)
            ORDER BY c.id';
    return listQuery($sql);
}

function retornaDataSiege($datasiege) {
    $dia = date("d/m/Y", $datasiege / 1000);
    $hora = date("G:i", $datasiege / 1000);
    return $dia . ' ás ' . $hora;
}

function listAtacantes($idCastle) {
    $sql = 'SELECT  cd.clan_name AS atacante
            FROM siege_clans sc
            JOIN clan_data cd ON (cd.clan_id = sc.clan_id)
            WHERE sc.castle_id = ' . $idCastle . ' AND type = 1';

    if (countQuery($sql) > 0) {
        $result = listQuery($sql);
        $countResult = count($result);
        $atacantes = '';
        for ($i = 0; $i < $countResult; $i++) {
            if ($i == ($countResult - 1)) {
                $atacantes .= $result[$i]['atacante'];
            } else {
                $atacantes .= $result[$i]['atacante'] . ', ';
            }
        }
        return $atacantes;
    } else {
        return 'Sem Atacantes';
    }
}

function listDefensores($idCastle) {
    $sql = 'SELECT  cd.clan_name AS atacante
            FROM siege_clans sc
            JOIN clan_data cd ON (cd.clan_id = sc.clan_id)
            WHERE sc.castle_id = ' . $idCastle . ' AND type = 0';

    if (countQuery($sql) > 0) {
        $result = listQuery($sql);
        $countResult = count($result);
        $defensores = '';
        for ($i = 0; $i < $countResult; $i++) {
            if ($i == ($countResult - 1)) {
                $defensores .= $result[$i]['atacante'];
            } else {
                $defensores .= $result[$i]['atacante'] . ', ';
            }
        }
        return $defensores;
    } else {
        return 'Sem Defensores';
    }
}
?>