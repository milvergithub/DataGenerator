<?php
/**
 * Created by PhpStorm.
 * User: milver
 * Date: 20-02-15
 * Time: 05:15 PM
 */
require "../model/rellenarModel.php";
require "../model/createDirModel.php";

$model=new rellenarModel($_POST['proyecto']);

$ruta ="../projects/".$_POST['proyecto'] ."/sql.sql";
$fileSQLGenerated=$fileSQLFill = fopen($ruta, "+w");
chmod($ruta, 0777);
$listaTablas=$model->getListaTablas();
chmod($ruta, 0777);
echo "<pre>";
for($i=0;$i<sizeof($listaTablas);$i++){
    $tabla=$listaTablas[$i];
    //echo $model->setRellenarDatos($tabla);
    $fh = fopen($ruta, 'a');
    fwrite($fh, $model->setRellenarDatos($tabla));
    fclose($fh);
}
echo "</pre>";