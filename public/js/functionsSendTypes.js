/**
 * Created by milver on 02-02-15.
 */
function before(){
    $("#mensajes").html('<div class="text-center"><i class="fa fa-cog fa-spin fa-5x"></i></div>');
    $("#mensajes").show();
}
function showBeforePopulate(){
    $("#showBeforePopulate").html('<div class="text-center"><i class="fa fa-cog fa-spin fa-3x"></i></div>');
    $("#showBeforePopulate").show();
}
function success(data){
        $("#mensajes").html(data);
}
function successRellenado(data){
    $("#showBeforePopulate").html('<div class="text-center text-success"><i class="fa fa-check fa-2x"></i></div>');
    $("#mensajeVerificarEstado").html(data);
}
function error() {
    $("#mensajes").text("FALLO LA CONEXION...!!!")
}
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
        beforeSend:before,
        success: success,
        error: error
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
        beforeSend: before(),
        success: success,
        error:error
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
        beforeSend: before(),
        success: success,
        error:error
    });
}
function sendTypeBytea(datos){
    $.ajax({
        type: "POST",
        url: "controller/sendByteaController.php",
        enctype: 'multipart/form-data',
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        mimeType: 'multipart/form-data',
        beforeSend: before(),
        success: success,
        error:error
    });
}
function sendTypeLista(datos){
    $.ajax({
        type: "POST",
        url: "controller/sendListaController.php",
        enctype: 'multipart/form-data',
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        mimeType: 'multipart/form-data',
        beforeSend: before(),
        success: success,
        error:error
    });
}
function sendTypeAlgoritmoText(datos){
    $.ajax({
        type: "POST",
        url: "controller/sendAlgoritmoTextController.php",
        enctype: 'multipart/form-data',
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        mimeType: 'multipart/form-data',
        beforeSend: before(),
        success: success,
        error:error
    });
}
function sendTypeDateTime(datos){
    $.ajax({
        type: "POST",
        url: "controller/sendDateTimeController.php",
        enctype: 'multipart/form-data',
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        mimeType: 'multipart/form-data',
        beforeSend: before(),
        success: success,
        error:error
    });
}
function sendTypeEnterosDecimales(datos){
    $.ajax({
        type: "POST",
        url: "controller/sendEnterosDecimalesController.php",
        enctype: 'multipart/form-data',
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        mimeType: 'multipart/form-data',
        beforeSend: before(),
        success: success,
        error:error
    });
}