<div class="form-group">
    <label for="dtp_input1" class="control-label">DateTime Picking</label>
    <div class="input-group date form_datetime" id="form_datetime" data-date="1979-09-16T05:25:07Z"
         data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
        <input class="form-control" size="16" type="text" value="" readonly>
        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
        <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
    </div>
    <input type="hidden" id="dtp_input1" value=""/><br/>

    <div class="form-group">
        <label class="control-label" for="fechaInicial">fecha inicial</label>
        <input type="text" name="fechaInicial" id="fechaInicial" class="input-sm form-control"
               placeholder="fecha inicial"/>
    </div>
    <div class="form-group">
        <label class="control-label" for="fechaFinal">fecha final</label>
        <input type="text" name="fechaFinal" id="fechaFinal" class="input-sm form-control col-sm-4"
               placeholder="fecha final"/>
    </div>
</div>

<div>
    <input id="repeat" name="repeat" type="checkbox" title="Aleatorio">
    <label for="repeat">Repetido</label>
</div>
<button class="btn btn-success btn-sm">guardar</button>