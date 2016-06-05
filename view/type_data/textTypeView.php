<div class="form-group">
   <div class="col-xs-12">
       <select class="form-control input-sm" id="formularioTipoOrigen" onchange="cargarConfiguracionTipo('<?php echo $_POST['tablaActual'] ?>')">
           <option value="">------- selecciones origen -------</option>
           <option value="archivo">archivo</option>
           <option value="tabla">tabla</option>
           <option value="lista">lista</option>
           <option value="algoritmo">Algoritmos</option>
       </select>
   </div>
    <input type="hidden" value="indirecto" id="directo">
</div>