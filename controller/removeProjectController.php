<?php
/**
 * Created by PhpStorm.
 * User: milver
 * Date: 12/11/14
 * Time: 15:07
 */
require_once "../model/removeProjectModel.php";
require_once "../config/config.php";
$removeDir=new removeProjectModel();
try {
    $removeDir->eliminarDir("../projects/".$_GET[REMOVE_PROYECTO]);
} catch (Exception $exc) {
    echo $exc->getTraceAsString();
}
header("Location: ../index.php");
?>