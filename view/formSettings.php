<?php
require_once "../model/writerReadDatesModel.php";
$model=new writerReadDatesModel($_POST['proyecto']);
$cantidad=$model->getCantidadDatosTabla($_POST['tablaactual']);
?>
<div id="mensajes">

</div>
<form  onsubmit="return validacion()" action="javascript:guardarConfiguracion()" method="post" class="form" id="formConfiguracion" name="formConfiguracion" enctype="multipart/form-data">
   <div class="control-group">
       <span class="control-label badge bg-info">cantidad de datos a generar  para la tabla<span class="badge bg-inverse"><?php echo $_POST['tablaactual']; ?></span></span>
        <?php
        if($cantidad>0){
        ?>
            <input type="text" onkeyup="soloNumeros();" name="numerodatos" id="numerodatos"  value="<?php echo $cantidad ?>" placeholder="Cantidad de datos" class="form-control input-sm" disabled="disabled" />
        <?php
        }else{
        ?>
            <input type="text" name="numerodatos" id="numerodatos"  value="<?php echo $cantidad ?>" placeholder="Cantidad de datos" class="form-control input-sm"  />
        <?php
        }
        ?>
   </div>
   <div id="tablaCampo" class="panel">
        <span class="badge bg-inverse glyphicon glyphicon-hand-left"> Selecione un atributo</span>
   </div>
   <div id="formularioPersonalizado" class="panel">
   </div>
    <div id="fechas" style="display: none">
        <div class="control-group">
            <div class="input-group date form_datetime">
                <input class="form-control input-sm" type="text" value="" name="fechaInicial" id="fechaInicial">
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
        </div>
        <div class="control-group">
            <div class="input-group date form_datetime">
                <input class="form-control input-sm" type="text" value="" name="fechaFinal" id="fechaFinal">
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
        </div>
        <button class="btn btn-success btn-sm">guardar</button>
    </div>
</form>
<script type="text/javascript" src="public/js/validacionesFormSetting.js"></script>