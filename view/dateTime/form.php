<div class="form-group">
    <label class="col-xs-12 control-label" for="fechaInicial">fecha inicial</label>
    <div class="col-xs-12">
        <div class="input-group">
            <input type="text" name="fechaInicial" id="fechaInicial" class="input-sm form-control form_datetime"
                   placeholder="<?php echo date('Y-m-d-H-m-s') ?>"/>
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
            </span>
        </div>
    </div>
</div>
<div class="form-group">
    <label class="col-xs-12 control-label" for="fechaFinal">fecha final</label>
    <div class="col-xs-12">
        <div class="input-group">
            <input type="text" name="fechaFinal" id="fechaFinal" class="input-sm form-control form_datetime"
                   placeholder="<?php echo date('Y-m-d-H-m-s') ?>"/>
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
            </span>
        </div>
    </div>
</div>
<div>
    <input id="repeat" name="repeat" type="checkbox" title="Aleatorio">
    <label for="repeat">Repetido</label>
</div>
<div class="col-xs-12">
    <button class="btn btn-success btn-sm">guardar</button>
</div>