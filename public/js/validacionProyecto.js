/**
 * Created by milver on 19-02-15.
 */
function validarArchivos(){
    var archivos = document.getElementById('archivos').files;
    //var archivos = $("#archivos").files;//$( '#anexo' )[0].files[0])
    var datoDoc = new FormData();
    for (i=0;i<archivos.length;i++){
        datoDoc.append('archivo'+i,archivos[i]);
    }
    
    $.ajax({
        type: "POST",
        url: "controller/validarArchivosByteaController.php",
        enctype: 'multipart/form-data',
        data: datoDoc,
        cache: false,
        contentType: false,
        processData: false,
        mimeType: 'multipart/form-data',
        beforeSend: function (dato) {
            $("#mensajeValidacionArchivos").html("<img src='public/img/loadingblue.gif' class='img-responsive'/>");
            $("#mensajeValidacionArchivos").show();
        },
        success: function (data) {
            if(data==='visible'){
                $("#divsubmit").css("display", "block");
                $("#mensajeValidacionArchivos").html('');
                $("#mensajeValidacionArchivos").show();
            }else{
                $("#mensajeValidacionArchivos").text(data);
                bootbox.alert(data, function () {
                });
                $("#archivos").val(null);
                $("#divsubmit").css("display", "none");
            }
        },
        error: function () {
            $("#mensajeValidacionArchivos").text("error")
        }
    });
}
function verificarEstadoConfiguracion(proyecto){
    var datos = new FormData();
    datos.append('proyecto',proyecto);
    $.ajax({
        type: "POST",
        url: "controller/verificarEstadoController.php",
        enctype: 'multipart/form-data',
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        mimeType: 'multipart/form-data',
        beforeSend: function (data) {
            $("#mensajeVerificarEstado").html("PROCESANDO...");
            $("#mensajeVerificarEstado").show();
        },
        success: function (data) {
            bootbox.alert(data, function() {

            });
            $("#mensajeVerificarEstado").html("ESTADO");
        },
        error: function () {
            $("#mensajeVerificarEstado").text("FALLO LA CONEXION...!!!")
        }
    });
}