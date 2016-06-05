<div class="form-group">
    <div class="col-xs-12">
        <select class="form-control input-sm" id="formularioTipoOrigen" onchange="cargarConfiguracionTipo('<?php echo $_POST['tablaActual'] ?>')">
            <option value="">------- selecciones origen -------</option>
            <option value="Date">Algoritmos Date</option>
            <option value="Time">Algoritmos DateTime</option>
            <option value="DateTime">Algoritmos Time</option>
        </select>
    </div>
    <input type="hidden" value="indirecto" id="directo">
</div>