<?php
session_start();
include "../model/tablasJSONModel.php";
$tablas=new tablasJSONModel($_POST["proyecto"]);
?>
<select name="tabla" id="tabla" class="form-control" onchange="cargarColumnasTabla()">
    <?php
        echo "<option>selecciones tabla</option>";
        $resultadoTablas=$tablas->getTablas();
        for($i=0;$i<sizeof($resultadoTablas);$i++) {
            echo '<option value="' . $resultadoTablas[$i]['tablename'] . '">' . $resultadoTablas[$i]['tablename'] . '</option>';
        }
    ?>
</select>
<select name="columna" id="columna" class="form-control" onchange="">
    <option value="">selecione culumna</option>
</select>