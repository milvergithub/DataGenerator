<?php
require_once 'model/cargarModel.php';
if (!empty($_GET[PROYECTO])) {
    if (file_exists("projects/" . $_GET[PROYECTO])) {
        $tablas = new cargarModel($_GET[PROYECTO]);
        require_once 'view/cargar.php';
    } else {
        require_once "view/error.php";
    }
} else {
    require_once "view/error.php";
}
?>
