
<?php

require_once('../controller/Classes.class.php');
$classes = new Controller_Classes();

try {
    echo $classes->getClassesJSON(strip_tags($_REQUEST['idRaca']));
} catch (Exception $e) {
    echo $e->getMessage();
}
?>
