<div class="">

    <div class="col-lg-14 col-lg-7 col-md-7 col-sm-7 col-xs-7 well full-with">
        <?= '<button onclick="verificarEstadoConfiguracion(\'' . $_GET[PROYECTO] . '\')" class="btn btn-theme03">Paso 1 test</button>'; ?>
        <div id="mensajeVerificarEstado"></div>
        <?= '<h3>PROJECT  <i class="fa fa-angle-right"></i> ' . $_GET[PROYECTO] . '</h3>'?>
        <?= '<input type="hidden" value="' . $_GET[PROYECTO] . '" id="project">'?>
        <?php
        $resultadoPT = $loadTablas->getTablesAndReferencesLoad();
        for ($contador = 1; $contador <= sizeof($resultadoPT); $contador++) {
        ?>
            <div id="<?=$resultadoPT[$contador - 1]['nivel']?>" class="panel panel-primary nivel<?=$resultadoPT[$contador - 1]['nivel']?>  col-lg-12">
                <button class="btn fa fa-th nivelPanel<?=$resultadoPT[$contador - 1]['nivel'] ?>"><?= $resultadoPT[$contador - 1]['nivel'] ?></button>
                <button class="btn btn-link" id="boton<?= $contador ?>" onclick="mostrarOcultar(<?= $contador ?>,'<?=$resultadoPT[$contador - 1]['tablename']?>');"><?=$resultadoPT[$contador - 1]['tablename'] ?></button>
                <div class="" id="tabla<?=$contador?>" style="display: none">
                   <table class="table table-hover">
                   <tr><th>name</th><th>key</th><th>null</th><th>type</th><th>estado</th></tr>
                  <?= printDetalleTable($resultadoPT[$contador - 1]['tablename'])?>
                   </table>
                </div>
             </div>
        <?php
        }
        ?>
    </div>
    <div
        class="panel panel-success arriba col-lg-offset-6 col-md-offset-6 col-sm-offset-5 col-xs-offset-7 col-lg-4 col-md-3 col-sm-3 col-xs-5"
        id="formularioConfiguracion">
        <div id="NombreTabla" class="h3 alert alert-success"></div>
        <div id="divtabla" class="panel panel-success">

        </div>
    </div>
</div>
<?php
function printDetalleTable($tabla)
{
    $var = null;
    $loadDetalle = new loadModel($_GET[PROYECTO]);
    $resultadoPDT = $loadDetalle->printDetalleTableLoad($tabla);
    for ($contador = 0; $contador < sizeof($resultadoPDT); $contador++) {
        $var .= "<tr>"
            . "<td><button class='btn btn-link'onclick=\"
                                              cargarPanelConfiguracion('" . $tabla . "','"
            . $resultadoPDT[$contador]['column_name'] . "','"
            . $resultadoPDT[$contador]['data_type'] . "','"
            . $resultadoPDT[$contador]['es_foranea'] . "','"
            . $resultadoPDT[$contador]['referencian'] . "','"
            . $resultadoPDT[$contador]['tabla'] . "','"
            . $resultadoPDT[$contador]['referenciados'] . "','"
            . $resultadoPDT[$contador]['is_nullable'] . "','"
            . $resultadoPDT[$contador]['constraint_type'] . "','"
            . secuencial($resultadoPDT[$contador]['column_default']) . "','"
            . $resultadoPDT[$contador]['check_clause'] . "')\">" . $resultadoPDT[$contador]['column_name'] . "</button></td>"
            . "<td>" . isPrimaryKey($resultadoPDT[$contador]['constraint_type']) . "</td>"
            . "<td>" . $resultadoPDT[$contador]['is_nullable'] . "</td>"
            . "<td>" . $resultadoPDT[$contador]['data_type'] . "</td>"
            . "<td class='indicador'>" . statusColumn($loadDetalle->getStatusColumnLoad($tabla, $resultadoPDT[$contador]['column_name'])) . "</td>"
            . "</tr>";
    }
    return $var;
}

function secuencial($cadena)
{
    if (trim($cadena) != null) {
        return "serial";
    } else {
        return '';
    }
}

function statusColumn($estado)
{
    if ($estado == "existe") {
        return "<span style='color: green' class='glyphicon glyphicon-ok-circle'></span>";
    } else {
        return "<span style='color: red' class='glyphicon glyphicon-remove-circle'></span>";
    }
}

function isPrimaryKey($cadena)
{
    if (trim($cadena) != null) {
        return "<span class='glyphicon glyphicon-flash h6' style='color: orange'></span>";
    } else {
        return "";
    }
}

?>
