
<input type="file" class="btn btn-default" name="archivo" id="archivo" multiple onchange="cargarContenidoTexto()"/>
<input class="form-control input-sm" type="text" name="separador" id="separador"/>
<input type="hidden" value="indirecto" id="directo">
<div style="display: none" id="divsubmit">
    <div>
        <input type="checkbox" id="aleatorio">
        <label for="repetido">aleatorio</label>
    </div>
    <button class="btn btn-success btn-sm" id="submit">guardar</button>
</div>