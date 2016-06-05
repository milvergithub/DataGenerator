<div class="form-group">
    <input type="hidden" value="indirecto" id="directo">
    <div class="col-xs-12">
        <select class="form-control input-sm" id="formularioTipoOrigen" onchange="cargarConfiguracionTipo('<?php echo $_POST['tablaActual'] ?>')">
            <option value="">selecciones modo</option>
            <option value="booleano">booleano</option>
        </select>
    </div>
</div>