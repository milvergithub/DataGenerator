<?php
/**
 * Created by PhpStorm.
 * User: milver
 * Date: 19/11/14
 * Time: 16:00
 */
switch ($_POST['elegido']){
    case "archivo":
        require_once "../view/file/formfile.php";
        break;
    case "tabla":
        require_once "../view/formTabla.php";
        break;
    case "lista":
         require_once "../view/lista.php";
         break;
    case "rango":
        require_once "../view/numeric/rango.php";
        break;
    case "algoritmosEnteros":
        require_once "../view/numeric/rango.php";
        break;
    case "algoritmo":
        require_once "../view/algoritmo/formAlgoritmos.php";
        break;
    //si son tipo fecha
    case "Date":
        require_once "../view/dateTime/form.php";
        break;
    case "Time":
        require_once "../view/dateTime/form.php";
        break;
    case "DateTime":
        require_once "../view/dateTime/form.php";
        break;
    case "booleano":
        require_once "../view/boolean/form.php";
        break;
}
?>