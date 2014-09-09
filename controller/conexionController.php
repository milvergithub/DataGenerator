<?php
session_start();
$basededatos=$_POST['basededatos'];
if($basededatos=="PostgreSQL"){
   
   $_SESSION['host']=$_POST['host'];
   $_SESSION['puerto']=$_POST['puerto'];
   $_SESSION['sgbd']=$_POST['basededatos'];
   $_SESSION['base']=$_POST['nombrebasedatos'];
   $_SESSION['usuario']=$_POST['usuario'];
   $_SESSION['password']=$_POST['pass'];
   
   
    $host=$_POST['host'];
    $port=$_POST['puerto'];
    $db=$_POST['nombrebasedatos'];
    $user=$_POST['usuario'];
    $passwd=$_POST['pass'];
    $config = "host=$host port=$port dbname=$db user=$user password=$passwd";
    try {
       $cnx = pg_connect($config) or die ("Error de conexion. ". pg_last_error());
    } catch (Exception $exc) {
       
    }
    if ($cnx) {
      header ("Location: ../index.php?accion=cargar");
    }
    else{
       echo 'error';
    }
}
if($basededatos=="mysql"){

}
?>
