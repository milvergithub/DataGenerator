/**
 * Created by milver on 02-02-15.
 */
function sendTypeRango(datos){
    $.ajax({
        type: "POST",
        url: "controller/sendRangoController.php",
        enctype: 'multipart/form-data',
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        mimeType: 'multipart/form-data',
        beforeSend: function (data) {
            $("#mensajes").html("PROCESANDO...");
            $("#mensajes").show();
        },
        success: function (data) {
            $("#mensajes").html(data);
        },
        error: function () {
            $("#mensajes").text("FALLO LA CONEXION...!!!")
        }
    });
}
function sendTypeBooleano(datos){
    $.ajax({
        type: "POST",
        url: "controller/sendBooleanoController.php",
        enctype: 'multipart/form-data',
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        mimeType: 'multipart/form-data',
        beforeSend: function (data) {
            $("#mensajes").html("PROCESANDO...");
            $("#mensajes").show();
        },
        success: function (data) {
            $("#mensajes").html(data);
        },
        error: function () {
            $("#mensajes").text("FALLO LA CONEXION...!!!")
        }
    });
}
function sendTypeForanea(datos){
    $.ajax({
        type: "POST",
        url: "controller/sendForaneaController.php",
        enctype: 'multipart/form-data',
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        mimeType: 'multipart/form-data',
        beforeSend: function (data) {
            $("#mensajes").html("PROCESANDO...");
            $("#mensajes").show();
        },
        success: function (data) {
            $("#mensajes").html(data);
        },
        error: function () {
            $("#mensajes").text("FALLO LA CONEXION...!!!")
        }
    });
}