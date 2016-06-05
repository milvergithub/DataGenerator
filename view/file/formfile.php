<div class="form-group">
    <div class="col-xs-12">
        <input type="file" name="archivo" class="filestyle" data-size="sm" id="archivo" multiple onchange="cargarContenidoTexto()"/>
    </div>
</div>
<div class="form-group">
    <label class="col-xs-12 control-label" for="separador">separador</label>
    <div class="col-xs-12">
        <select class="form-control input-sm" name="separador" id="separador">
            <option value=".">punto (.)</option>
            <option value=",">coma (,)</option>
            <option value=";">punto y coma(;)</option>
            <option value=":">dos puntos (:)</option>
        </select>
    </div>
</div>
<input type="hidden" value="indirecto" id="directo">
<div style="display: none" id="divsubmit">
    <div>
        <input type="checkbox" id="aleatorio">
        <label for="repetido">aleatorio</label>
    </div>
    <div class="col-xs-12">
        <button class="btn btn-success btn-sm" id="submit">guardar</button>
    </div>
</div>