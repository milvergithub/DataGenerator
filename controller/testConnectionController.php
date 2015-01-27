<?php
/**
 * Created by PhpStorm.
 * User: milver
 * Date: 26-01-15
 * Time: 04:43 PM
 */
require_once "../config/ConexionPG.php";

$connectionDB=new ConexionPG($_POST['host'],$_POST['port'],$_POST['bd'],$_POST['user'],$_POST['pass']);
