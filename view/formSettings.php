<div id="mensajes">

</div>
<form  onsubmit="return validacion()" action="javascript:guardarConfiguracion()" method="post" class="form" id="formConfiguracion" name="formConfiguracion">
   <div class="form-group">
       <span class="control-label badge bg-info">cantidad de datos a generar  para la tabla <span class="badge bg-inverse"><?php echo $_POST['tablaactual']; ?></span></span>
       <input type="text" name="numerodatos" id="numerodatos" placeholder="Cantidad de datos" class="form-control input-sm"  />
   </div>
   <div id="tablaCampo" class="panel">
        <span class="badge bg-inverse glyphicon glyphicon-hand-left"> Selecione un atributo</span>
   </div>
   <div id="formularioPersonalizado" class="panel">
   </div>
</form>
