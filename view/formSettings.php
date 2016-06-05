<?php
require_once "../model/writerReadDatesModel.php";
$model=new writerReadDatesModel($_POST['proyecto']);
$cantidad=$model->getCantidadDatosTabla($_POST['tablaactual']);
?>
<div id="mensajes">

</div>

<form  action="javascript:guardarConfiguracion()" method="post" class="form-horizontal" id="formConfiguracion" name="formConfiguracion" enctype="multipart/form-data">
   <div class="form-group">
       <div class="col-xs-12">
           <span class="badge bg-info">cantidad de datos a generar  para la tabla <br><br>
               <span class="badge bg-inverse"><?php echo $_POST['tablaactual']; ?>
               </span>
           </span>
       </div>
        <div class="col-xs-12">
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
   </div>
   <div id="tablaCampo" class="panel">
        <span class="badge bg-inverse glyphicon glyphicon-hand-left"> Selecione un atributo</span>
   </div>
   <div id="formularioPersonalizado">
   </div>
</form>