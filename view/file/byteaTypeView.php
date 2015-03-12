<div id="mensajeValidacionArchivos"></div>
<input type="hidden" value="indirecto" id="directo">
<div class="control-group">
    <select class="form-control" id="formularioTipoOrigen" name="formularioTipoOrigen" onchange="cargarConfiguracionTipo('<?php echo $_POST['tablaActual'] ?>')">
        <option value="bytea">bytea</option>
    </select>
</div>
<input name='archivos[]' id="archivos" onchange="validarArchivos()" type="file" multiple>
<div style="display: none" id="divsubmit">
    <div>
        <input type="checkbox" id="aleatorio">
        <label for="repetido">aleatorio</label>
    </div>
    <button class="btn btn-success btn-sm" id="submit">guardar</button>
</div>