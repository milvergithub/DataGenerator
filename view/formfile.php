<div class="control-group">
    <input type="file" name="archivo" id="archivo" multiple onchange="cargarContenidoTexto()"/>
</div>
<div class="control-group">
    <input class="form-control input-sm" width="50px" type="text" name="separador" id="separador"/>
</div>
<input type="hidden" value="indirecto" id="directo">
<div style="display: none" id="divsubmit">
    <div>
        <input type="checkbox" id="aleatorio">
        <label for="repetido">aleatorio</label>
    </div>
    <button class="btn btn-success btn-sm" id="submit">guardar</button>
</div>