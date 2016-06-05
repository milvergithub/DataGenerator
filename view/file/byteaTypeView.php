<div id="mensajeValidacionArchivos"></div>
<input type="hidden" value="indirecto" id="directo">
<div class="form-group">
    <div class="col-xs-12">
        <select class="form-control input-sm" id="formularioTipoOrigen" name="formularioTipoOrigen" onchange="cargarConfiguracionTipo('<?php echo $_POST['tablaActual'] ?>')">
            <option value="bytea">bytea</option>
        </select>
    </div>
</div>
<input name='archivos[]' class="filestyle" data-size="sm" id="archivos" onchange="validarArchivos()" type="file" multiple>
<div style="display: none" id="divsubmit">
    <div class="form-group">
        <div class="col-xs-12">
            <input type="checkbox" id="aleatorio">
            <label for="repetido">aleatorio</label>
        </div>
    </div>
    <div class="row col-xs-12">
        <button class="btn btn-success btn-sm" id="submit">guardar</button>
    </div>
</div>