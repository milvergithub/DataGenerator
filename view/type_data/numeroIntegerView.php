<span class="badge bg-important"><?php echo $_POST['check_clause'] ?></span>
<select class="form-control input-sm" id="formularioTipoOrigen" onchange="cargarConfiguracionTipo('<?php echo $_POST['tablaActual'] ?>')">
    <option value="">------- selecciones origen -------</option>
    <option value="rango">rango</option>
    <option value="algoritmosEnteros">algoritmos enteros</option>
</select>
<input type="hidden" value="indirecto" id="directo">