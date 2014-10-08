<?php
session_start();
include "../model/columnasModel.php";
?>
<select name="tabla" id="tabla" class="form-control" onchange="cargarColumnasTabla()">
    <?php
        echo "<option>selecciones tabla</option>";
        $tablas=new columnasModel("diagrama");
        $resultadoPTS=$tablas->printTables();
        while ($regPTS = pg_fetch_assoc($resultadoPTS)) {
            echo '<option value="'.$regPTS['tablename'].'">'.$regPTS['tablename'].'</option>';
        }
    ?>
</select>
<select name="columna" id="columna" class="form-control" onchange="">
    <option value="">selecione culumna</option>
</select>