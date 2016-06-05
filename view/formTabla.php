<?php
session_start();
include "../model/tablasJSONModel.php";
$tablas=new tablasJSONModel($_POST["proyecto"]);
?>
<div class="form-group">
    <div class="col-xs-12">
        <select name="tabla" id="tabla" class="form-control input-sm" onchange="cargarColumnasTabla()">
            <?php
            echo "<option value=''>------- selecciones tabla -------</option>";
            $resultadoTablas=$tablas->getTablas();
            for($i=0;$i<sizeof($resultadoTablas);$i++) {
                echo '<option value="' . $resultadoTablas[$i]['tablename'] . '">' . $resultadoTablas[$i]['tablename'] . '</option>';
            }
            ?>
        </select>
    </div>
</div>
<div class="form-group">
    <div class="col-xs-12">
        <select name="columna" id="columna" class="form-control input-sm" onchange="">
            <option value="">------- selecciones columna -------</option>
        </select>
    </div>
</div>
<input type="hidden" value="indirecto" id="directo">
<div>
    <input type="checkbox" id="repetido">
    <label for="repetido">repetido</label>
</div>
<?php require "buttonSave.php" ?>