<input type="hidden" value="indirecto" id="directo">
<select class="form-control input-sm" id="formularioTipoOrigen" name="formularioTipoOrigen" onchange="cargarConfiguracionTipo('<?php echo $_POST['tablaActual'] ?>')">
    <option value="">------- selecciones opcion -------</option>
    <option value="cidr">Generador de IPv4</option>
    <option value="inet">Generador de IPv6</option>
    <option value="macaddr">Generador macaddress</option>
</select>
<button class="btn btn-success btn-sm">guardar</button>