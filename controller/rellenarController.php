<?php
/**
 * Created by PhpStorm.
 * User: milver
 * Date: 20-02-15
 * Time: 05:15 PM
 */
require "../model/rellenarModel.php";
$model=new rellenarModel($_POST['proyecto']);
$listaTablas=$model->getListaTablas();
echo "<pre>";
for($i=0;$i<count($listaTablas);$i++){
    $tabla=$listaTablas[$i];
    $model->setRellenarDatos($tabla);
}
echo "</pre>";