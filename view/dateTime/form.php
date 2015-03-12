<div class="control-group">
    <label class="control-label" for="fechaInicial">fecha inicial</label>
    <input type="text" name="fechaInicial" id="fechaInicial" class="input-sm form-control"
           placeholder="<?php echo date('Y-m-d-H-m-s') ?>"/>
</div>
<div class="control-group">
    <label class="control-label" for="fechaFinal">fecha final</label>
    <input type="text" name="fechaFinal" id="fechaFinal" class="input-sm form-control"
           placeholder="<?php echo date('Y-m-d-H-m-s') ?>"/>
</div>
<div>
    <input id="repeat" name="repeat" type="checkbox" title="Aleatorio">
    <label for="repeat">Repetido</label>
</div>
<button class="btn btn-success btn-sm">guardar</button>