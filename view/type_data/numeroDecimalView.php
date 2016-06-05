<div class="form-group">
    <div class="col-xs-12">
        <select class="form-control input-sm" id="formularioTipoOrigen" onchange="cargarConfiguracionTipo('<?php echo $_POST['tablaActual'] ?>')">
            <option value="">------- selecciones origen -------</option>
            <option value="rango">rango</option>
            <option value="algoritmos">algoritmos decimales</option>
        </select>
    </div>
    <input type="hidden" value="indirecto" id="directo">
</div>