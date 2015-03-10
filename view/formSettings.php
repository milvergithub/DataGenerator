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
</form>
<script type="text/javascript">
    $(document).ready(function () {

        $('#formConfiguracion').validate({
            rules: {
                numerodatos: {
                    required: true,
                    number:true,
                    numberOnly:true
                },
                minimo:{
                    required:true,
                    number:true
                },
                maximo:{
                    required:true,
                    number:true
                },
                contenidogenerar:{
                    required:true
                },
                separador:{
                    required:true
                },
                tabla:{
                    required:true
                },
                columna:{
                    required:true
                },
                fechaInicial:{
                    required:true
                },
                fechaFinal:{
                    required:true
                }
            },
            highlight: function(element) {
                $(element).closest('.control-group').removeClass('has-success').addClass('control-group has-error');
            },
            success: function(element) {
                element
                    .closest('.control-group').removeClass('control-group has-error').addClass('has-success');
            }
        });
    });
    function soloNumeros(event){
        if(event.shiftKey){
            event.preventDefault();
        }
        if(event.keyCode == 46 || event.keyCode == 8){
        }
        else{
            if(event.keyCode < 95){
                if(event.keyCode < 48 || event.keyCode > 57){
                    event.preventDefault();
                }
            }
            else{
                if(event.keyCode < 96 || event.keyCode > 105){
                    event.preventDefault();
                }
            }
        }
    }
</script>