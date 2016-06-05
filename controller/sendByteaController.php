<?php
require_once "../model/writerReadDatesModel.php";
require_once "../model/GeneratorBinaryModel.php";
$generatorBinary=new GeneratorBinaryModel();
$model=new writerReadDatesModel($_POST['proyecto']);
$mensage = '';
$filesUpload=array();
$ruta = '../projects/'.$_REQUEST['proyecto']."/files/"; //Decalaramos una variable con la ruta en donde almacenaremos los archivos
foreach ($_FILES as $key) //Iteramos el arreglo de archivos
{
    if($key['error'] == UPLOAD_ERR_OK )//Si el archivo se paso correctamente Ccontinuamos
    {
        $NombreOriginal = $key['name'];//Obtenemos el nombre original del archivo
        $temporal = $key['tmp_name']; //Obtenemos la ruta Original del archivo
        $destino = $ruta.$NombreOriginal;	//Creamos una ruta de destino con la variable ruta y el nombre original del archivo

        move_uploaded_file($temporal, $destino); //Movemos el archivo temporal a la ruta especificada
        chmod($destino,0777);
    }

    if ($key['error']=='') //Si no existio ningun error, retornamos un mensaje por cada archivo subido
    {
        $mensage .= '-> Archivo <b>'.$NombreOriginal.'</b> Subido correctamente. <br>';
        $filesUpload[]=$NombreOriginal;
    }
    if ($key['error']!='')//Si existio algún error retornamos un el error por cada archivo.
    {
        $mensage .= '-> No se pudo subir el archivo <b>'.$NombreOriginal.'</b> debido al siguiente Error: \n'.$key['error'];
    }

}
$datos=$generatorBinary->getDataBinarys($_POST['cantidad'],$filesUpload);
$model->setProccessTabla($_POST['columna'],$datos,$_POST['tablaActual']);
$model->cambiarEstadoColumna($_POST['tablaActual'],$_POST['columna']);
$model->setCantidadDatosTabla($_POST['tablaActual'],$_POST['cantidad']);
echo "SUCCESSFULL...";
?>