<?php

/**
 * Controller da Classes
 *
 * @author Weuller Krysthian <weuller.krysthian@hotmail.com>
 * @since 22/09/12
 */
require_once('../model/ViewClasses.class.php');

class Controller_Classes {

    public function getClassesJSON($raca) {
        if (ctype_alnum($raca)) {
            try {
                $dbClasses = new Model_ViewClasses();
                $classes = json_encode($dbClasses->getClasses($raca));
            } catch (Exception $e) {
                throw new Exception('Falha ao buscar classes');
            }
            return $classes;
        } else {
            throw new Exception(utf8_decode('A raça expecificada é inválida'));
        }
    }

}

?>
