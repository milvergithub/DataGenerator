/**
 * Created by milver on 19-02-15.
 */

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
            $("#mensajeVerificarEstado").html(data);
        },
        error: function () {
            $("#mensajeVerificarEstado").text("FALLO LA CONEXION...!!!")
        }
    });
}