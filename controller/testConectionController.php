<?php
/**
 * Created by PhpStorm.
 * User: milver
 * Date: 09-03-15
 * Time: 01:12 PM
 */
require_once '../config/ConexionPG.php';
$connectionDB=new ConexionPG($_POST['host'],$_POST['port'],$_POST['bd'],$_POST['user'],$_POST['pass']);
pg_ping($connectionDB);