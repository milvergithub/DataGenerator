<?php
require_once 'model/cargarModel.php';
if(!empty($_GET['project'])){
    if(file_exists("projects/".$_GET['project'])){
        $tablas=new cargarModel($_GET['project']);
        require_once 'view/cargar.phtml';
    }
    else{
        require_once "view/error.phtml";
    }
}
else{
    require_once "view/error.phtml";
}
?>
