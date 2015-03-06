<?php
echo "<option>selecione una fila</option>";
for($cont=0;$cont<sizeof($resultado);$cont++){
    echo '<option value="'.$resultado[$cont]['column_name'].'">'.$resultado[$cont]['column_name'].'</option>';
}
?>