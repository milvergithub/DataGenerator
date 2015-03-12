<select class="form-control" id="formularioTipoOrigen" onchange="cargarConfiguracionTipo('<?php echo $_POST['tablaActual'] ?>')">
    <option value="">------- selecciones origen -------</option>
    <option value="Date">Algoritmos Date</option>
    <option value="Time">Algoritmos DateTime</option>
    <option value="DateTime">Algoritmos Time</option>
</select>
<input type="hidden" value="indirecto" id="directo">