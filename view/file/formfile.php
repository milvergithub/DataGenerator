<div class="control-group">
    <input type="file" name="archivo" id="archivo" multiple onchange="cargarContenidoTexto()"/>
</div>
<div class="control-group">
    <label for="separador">separador</label>
    <select class="form-control input-sm" name="separador" id="separador">
        <option value=".">punto (.)</option>
        <option value=",">coma (,)</option>
        <option value=";">punto y coma(;)</option>
        <option value=":">dos puntos (:)</option>
    </select>
</div>
<input type="hidden" value="indirecto" id="directo">
<div style="display: none" id="divsubmit">
    <div>
        <input type="checkbox" id="aleatorio">
        <label for="repetido">aleatorio</label>
    </div>
    <button class="btn btn-success btn-sm" id="submit">guardar</button>
</div>