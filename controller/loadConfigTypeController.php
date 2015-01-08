<?php
/**
 * Created by PhpStorm.
 * User: milver
 * Date: 19/11/14
 * Time: 16:00
 */
switch ($_POST['elegido']){
    case "archivo":
        require_once "../view/formfile.phtml";
        break;
    case "tabla":
        require_once "../view/formTabla.php";
        break;
    case "lista":
         require_once "../view/lista.phtml";
         break;
    case "rango":
        require_once "../view/rango.phtml";
        break;
}
?>