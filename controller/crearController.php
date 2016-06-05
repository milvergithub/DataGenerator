<?php
error_reporting(0);
require_once "../config/config.php";
require_once "../config/ConexionPG.php";
require_once "../model/crearModel.php";
require_once "../model/createDirModel.php";
require_once "../model/crearStructureModel.php";
$basededatos = $_POST['basededatos'];
if ($basededatos == "PostgreSQL") {
    $crearDirectorio = new createDirModel();
    if (file_exists("../projects/" . $_POST[NOMBRE_PROYECTO])) {
        header("Location: ../index.php?" . ACTION . "=nuevo&msm=1");
    } else {
        try {
            $conexion=new ConexionPG($_POST['host'],$_POST['puerto'],$_POST['nombrebasedatos'],$_POST['usuario'],$_POST['pass']);
            $cnx = $conexion->connectDB();
        } catch (Exception $exc) {

        }
        if ($cnx) {
            $crearDirectorio->createDir("../projects/" . $_POST[NOMBRE_PROYECTO] . "", 0777);
            $crearDirectorio->createDir("../projects/" . $_POST[NOMBRE_PROYECTO] . "/conexion", 0777);
            $crearDirectorio->createDir("../projects/" . $_POST[NOMBRE_PROYECTO] . "/tables", 0777);
            $crearDirectorio->createDir("../projects/" . $_POST[NOMBRE_PROYECTO] . "/dates", 0777);
            $crearDirectorio->createDir("../projects/" . $_POST[NOMBRE_PROYECTO] . "/mapeo", 0777);
            $crearDirectorio->createDir("../projects/" . $_POST[NOMBRE_PROYECTO] . "/control", 0777);
            $crearDirectorio->createDir("../projects/" . $_POST[NOMBRE_PROYECTO] . "/files",0777);
            $crearSM = new crearStructureModel();//$nameProject,$host,$port,$dbms,$dbname,$user,$pass
            $crearSM->createConnectionOffline($_POST[NOMBRE_PROYECTO], $_POST['host'], $_POST['puerto'], $_POST['basededatos'], $_POST['nombrebasedatos'], $_POST['usuario'], $_POST['pass']);

            $tablas = new crearModel($_POST[NOMBRE_PROYECTO]);

            $resultadoPT = $tablas->getTablesAndReferences();
            /*.........MAPEANDO..........*/
            $crearDirectorio->crearFileJSON("../projects/" . $_POST[NOMBRE_PROYECTO] . "/mapeo/mapeo.json", "w+");
            $mapeoRPT = json_encode($resultadoPT, JSON_UNESCAPED_UNICODE);
            $fhMRPT = fopen("../projects/" . $_POST[NOMBRE_PROYECTO] . "/mapeo/mapeo.json", 'w');
            fwrite($fhMRPT, $mapeoRPT);
            fclose($fhMRPT);
            /*.........MAPEANDO..........*/
            for ($contador = 1; $contador <= sizeof($resultadoPT); $contador++) {

                /*creo archivo JSON con el nombre de la tabla que contendra los datos a rellenar*/
                $fp = fopen("../projects/" . $_POST[NOMBRE_PROYECTO] . "/dates/" . $resultadoPT[$contador - 1]['tablename'] . ".json", "w+");

                /*creo archivo JSON con el nombre de la tabla que contendra el detalle de la tabla*/
                $fpdt = fopen("../projects/" . $_POST[NOMBRE_PROYECTO] . "/tables/" . $resultadoPT[$contador - 1]['tablename'] . ".json", "w+");

                /*creo archivo JSON con el nombre de la tabla que contendra el detalle de la tabla*/
                $fpdts = fopen("../projects/" . $_POST[NOMBRE_PROYECTO] . "/control/" . $resultadoPT[$contador - 1]['tablename'] . ".json", "w+");
                if ($fp == false) {
                    die("No se ha podido crear el archivo.");
                } else {
                    /*permiso al archivo que tendra los datos a rellenar*/
                    chmod("../projects/" . $_POST[NOMBRE_PROYECTO] . "/dates/" . $resultadoPT[$contador - 1]['tablename'] . ".json", 0777);
                    /*permiso al archivo que tendra el detalle de la tabla*/
                    chmod("../projects/" . $_POST[NOMBRE_PROYECTO] . "/tables/" . $resultadoPT[$contador - 1]['tablename'] . ".json", 0777);
                    /*permiso al archivo que tendra el detalle de la tabla status*/
                    chmod("../projects/" . $_POST[NOMBRE_PROYECTO] . "/control/" . $resultadoPT[$contador - 1]['tablename'] . ".json", 0777);

                    /*asigno un arreglo vacio al archivo que tendra los datos a rellenar*/
                    $contenido = array();
                    $jsonencoded = json_encode($contenido, JSON_UNESCAPED_UNICODE);
                    $fh = fopen("../projects/" . $_POST[NOMBRE_PROYECTO] . "/dates/" . $resultadoPT[$contador - 1]['tablename'] . ".json", 'w');
                    fwrite($fh, $jsonencoded);
                    fclose($fh);

                    /*asigo los valores del detalle de ta tabla*/
                    $detalleTabla = $tablas->detalleTabla($resultadoPT[$contador - 1]['tablename']);
                    $jsonencodedDT = json_encode($detalleTabla, JSON_UNESCAPED_UNICODE);
                    $fhDT = fopen("../projects/" . $_POST[NOMBRE_PROYECTO] . "/tables/" . $resultadoPT[$contador - 1]['tablename'] . ".json", 'w');
                    fwrite($fhDT, $jsonencodedDT);
                    fclose($fhDT);

                    /*asigo los valores del detalle status de la tabla*/
                    $detalleTablaStatus = $tablas->getDetalleTablaStatus($resultadoPT[$contador - 1]['tablename']);
                    $jsonencodedDTS = json_encode($detalleTablaStatus, JSON_UNESCAPED_UNICODE);
                    $fhDTS = fopen("../projects/" . $_POST[NOMBRE_PROYECTO] . "/control/" . $resultadoPT[$contador - 1]['tablename'] . ".json", 'w');
                    fwrite($fhDTS, $jsonencodedDTS);
                    fclose($fhDTS);

                }
            }
            header("Location: ../index.php?" . ACTION . "=load&" . PROYECTO . "=" . $_POST[NOMBRE_PROYECTO] . "");
        } else {
            header("Location: ../index.php?" . ACTION . "=error");
        }
    }
}else{
    header("Location: ../index.php?" . ACTION . "=nuevo&msm=1");
}
?>
