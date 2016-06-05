<?php
/**
 * Created by PhpStorm.
 * User: milver
 * Date: 09-03-15
 * Time: 01:12 PM
 */
require_once '../config/ConexionPG.php';
$connectionDB = new ConexionPG($_POST['host'], $_POST['puerto'], $_POST['nombrebasedatos'], $_POST['usuario'], $_POST['pass']);
if (pg_ping($connectionDB->testConnection())) {
    ?>
    <div class="alert alert-success">
        <span class="glyphicon glyphicon-ok-circle"></span>
        Connection Successfull...
    </div>
    <?php
}
?>


