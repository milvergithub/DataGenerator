<div class="form-group">
    <div class="col-xs-12">
        <select class="form-control" id="formularioTipoOrigen" onchange="cargarConfiguracionTipo('<?php echo $_POST['tabla'] ?>')">
            <option value="">selecciones origen</option>
            <option value="archivo">archivo</option>
            <option value="tabla">tabla</option>
            <option value="lista">lista</option>
            <option value="rango">rango</option>
        </select>
    </div>
</div>