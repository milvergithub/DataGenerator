$(document).ready(function(){
   
});
function cargarPanelConfiguracion(identificador){
   $("#tablaCampo").html("<div class='alert alert-warning'>"+identificador+"</div>" +
                         "<input type='hidden' name='nombre_columna' id='nombre_columna' value='"+identificador+"'/>");
   $("#formularioPersonalizado").load("view/formularioNumerico.phtml");
   
}
function mostrarOcultar(num,tabla){
   if($("#tabla"+num).css('display')=='none'){
		$("#tabla"+num).css({    
            display:"show"
        });
        $("#NombreTabla").html(tabla);
        $("#divtabla").load("view/formAttr.phtml",{tablaactual:tabla});
	}else{
		$("#tabla"+num).css({    
            display:"none"
        });
	}
}
function cargarConfiguracionTipo(){
   var elegido=$("#formularioTipoOrigen").val();
   switch (elegido){
      case "archivo":
         $("#opcionconfiguracion").load("view/formfile.phtml");
         break;
      case "tabla":
         $("#opcionconfiguracion").load("view/formTabla.php",{proyecto:$("#project").val()});
         break;
      case "lista":
         $("#opcionconfiguracion").load("view/lista.phtml");
         break;
   }
}

function cargarContenidoTexto(){
   var archivo =$("#archivo")[0].files[0];//$( '#anexo' )[0].files[0])
      var datoDoc=new FormData();
      datoDoc.append("archivo",archivo);
      $.ajax({
          type: "POST",
          url:"controller/procesaFile.php",
          enctype:'multipart/form-data',
          data: datoDoc,
          cache: false,
          contentType: false,
          processData: false,
          mimeType: 'multipart/form-data',
          success: function(data){
            $("#contenidogenerar").text(data);
            bootbox.alert(data, function() {

            });
          },
          error: function(){
            $("#mensajeUploadDoc").text("error")
          }
      });
}
function cargarColumnasTabla(){
   var proyecto=$("#project").val();
   var columna=$("#tabla").val();
   var dato=new FormData();
   dato.append("tabla",columna);
   dato.append("proyecto",proyecto);
   $.ajax({
          type: "POST",
          url:"controller/columnasController.php",
          enctype:'multipart/form-data',
          data: dato,
          cache: false,
          contentType: false,
          processData: false,
          mimeType: 'multipart/form-data',
          success: function(data){
            $("#columna").html(data);
          },
          error: function(){
            $("#columna").text("error")
          }
      });
}
