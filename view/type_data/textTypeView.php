<select class="form-control input-sm" id="formularioTipoOrigen" onchange="cargarConfiguracionTipo('<?php echo $_POST['tablaActual'] ?>')">
    <option value="">------- selecciones origen -------</option>
    <option value="archivo">archivo</option>
    <option value="tabla">tabla</option>
    <option value="lista">lista</option>
    <option value="algoritmo">Algoritmos</option>
</select>
<input type="hidden" value="indirecto" id="directo">