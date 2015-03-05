<?php
/**
 * Created by PhpStorm.
 * User: milver
 * Date: 04-03-15
 * Time: 04:42 PM
 */
print_r($_REQUEST['[archivos']);
foreach ($_FILES['archivos']['name'] as $filename) {
    try {
        echo '<li>' . $filename . '</li>';
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }

}