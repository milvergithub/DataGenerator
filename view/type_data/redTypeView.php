<div class="form-group">
    <input type="hidden" value="indirecto" id="directo">
    <div class="col-xs-12">
        <select class="form-control input-sm" id="formularioTipoOrigen" name="formularioTipoOrigen" onchange="cargarConfiguracionTipo('<?php echo $_POST['tablaActual'] ?>')">
            <option value="">------- selecciones opcion -------</option>
            <option value="cidr">Generador de IPv4</option>
            <option value="inet">Generador de IPv6</option>
            <option value="macaddr">Generador macaddress</option>
        </select>
    </div>
</div>
<div class="col-xs-12">
    <button class="btn btn-success btn-sm">guardar</button>
</div>