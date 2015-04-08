<?php
/**
 * Created by PhpStorm.
 * User: milver
 * Date: 09-03-15
 * Time: 11:52 AM
 */
require_once "../model/writerReadDatesModel.php";
$model=new writerReadDatesModel($_POST['proyecto']);
if($model->getEstadoForanea($_POST['tabla'],$_POST['referenciados'])){
    //print_r($_REQUEST);
    $model->setProccessTablaWithForeing($_POST['referencian'],$_POST['referenciados'],$_POST['tablaActual'],$_POST['tabla'],$_POST['cantidad']);
    $model->cambiarEstadoColumna($_POST['tablaActual'],$_POST['columna']);
    $model->setCantidadDatosTabla($_POST['tablaActual'],$_POST['cantidad']);
    echo "SUCCESSFULL...";
}else{
    echo '<span class="badge bg-important">falta configurar '.$_POST['referenciados'].' en la tabla '.$_POST['tabla'].'</span>';
}
?>