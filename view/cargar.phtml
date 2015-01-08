<div class="">
    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 well full-with">
        <?php
        echo "<h2>Proyecto : " . $_GET[PROYECTO] . "</h2>";
        echo '<input type="hidden" value="' . $_GET[PROYECTO] . '" id="project">';
        echo "<br>";
        $resultadoPT = $tablas->getTablesAndReferences();
        for ($contador = 1; $contador <= sizeof($resultadoPT); $contador++) {
            $fp = fopen("projects/".$_GET[PROYECTO]."/dates/".$resultadoPT[$contador - 1]['tablename'].".json", "w+");
            $fpdt = fopen("projects/".$_GET[PROYECTO]."/tables/".$resultadoPT[$contador - 1]['tablename'].".json", "w+");
            if ($fp == false) {
                die("No se ha podido crear el archivo.");
            }
            else{
                chmod("projects/".$_GET[PROYECTO]."/dates/".$resultadoPT[$contador - 1]['tablename'].".json", 0777);
                chmod("projects/".$_GET[PROYECTO]."/tables/".$resultadoPT[$contador - 1]['tablename'].".json", 0777);
                $contenido=array();
                $jsonencoded = json_encode($contenido,JSON_UNESCAPED_UNICODE);

                $detalleTabla=$tablas->detalleTabla($resultadoPT[$contador - 1]['tablename']);
                $jsonencodedDT = json_encode($detalleTabla,JSON_UNESCAPED_UNICODE);
                $fhDT = fopen("projects/".$_GET[PROYECTO]."/tables/".$resultadoPT[$contador - 1]['tablename'].".json", 'w');
                fwrite($fhDT, $jsonencodedDT);
                fclose($fhDT);

                $fh = fopen("projects/".$_GET[PROYECTO]."/dates/".$resultadoPT[$contador - 1]['tablename'].".json", 'w');
                fwrite($fh, $jsonencoded);
                fclose($fh);
            }
            echo '<div class="panel panel-primary nivel' . $resultadoPT[$contador - 1]['nivel'] . ' col-lg-12">
                    <button class="btn nivelPanel' . $resultadoPT[$contador - 1]['nivel'] . '">' . $resultadoPT[$contador - 1]['nivel'] . '</button>
                    <button class="btn btn-link" id="boton' . $contador . '" onclick="mostrarOcultar(' . $contador . ',\'' . $resultadoPT[$contador - 1]['tablename'] . '\');">' . $resultadoPT[$contador - 1]['tablename'] . '</button>
                    <div class="well" id="tabla' . $contador . '" style="display: none">
                       <table class="table table-hover">
                       <tr><th>name</th><th>key</th><th>null</th><th>type</th><th>estado</th></tr>
                      ' . $tablas->printDetalleTable($resultadoPT[$contador - 1]['tablename']) . '
                       </table>
                    </div>
                 </div>';
        }
        ?>
    </div>
    <div
        class="panel panel-success arriba col-lg-offset-6 col-md-offset-6 col-sm-offset-6 col-xs-offset-6 col-lg-5 col-md-5 col-sm-5 col-xs-5"
        id="formularioConfiguracion">
        <div id="NombreTabla" class="h3 alert alert-success"></div>
        <div id="divtabla" class="well">

        </div>
        <?php
        ?>
    </div>
</div>
