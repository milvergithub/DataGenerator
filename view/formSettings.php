<?php
require_once "../model/writerReadDatesModel.php";
$model=new writerReadDatesModel($_POST['proyecto']);
$cantidad=$model->getCantidadDatosTabla($_POST['tablaactual']);
?>
<script type="text/javascript">
    window.onload=function(){
        initilialize();
    }
</script>
<div id="mensajes">

</div>
<form  onsubmit="return validacion()" action="javascript:guardarConfiguracion()" method="post" class="form" id="formConfiguracion" name="formConfiguracion" enctype="multipart/form-data">
   <div class="form-group">
       <span class="control-label badge bg-info">cantidad de datos a generar  para la tabla<span class="badge bg-inverse"><?php echo $_POST['tablaactual']; ?></span></span>
        <?php
        if($cantidad>0){
        ?>
            <input type="text" name="numerodatos" id="numerodatos"  value="<?php echo $cantidad ?>" placeholder="Cantidad de datos" class="form-control input-sm" disabled="disabled" />
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
</form>
