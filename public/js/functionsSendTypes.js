/**
 * Created by milver on 02-02-15.
 */
function progress(e){
    if(e.lengthComputable){
        var max = e.total;
        var current = e.loaded;
        var Percentage = (current * 100)/max;
        console.log(Percentage);
        if(Percentage >= 100)
        {
            // process completed
        }
    }
}
function before(){
    $("#mensajes").html("PROCESANDO...");
    $("#mensajes").show();
}
function success(data){
        $("#mensajes").html(data);
}
function successRellenado(data){
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
        error: error,
        progress: function(e) {
            if(e.lengthComputable) {
                var pct = (e.loaded / e.total) * 100;

                $('#prog')
                    .progressbar('option', 'value', pct)
                    .children('.ui-progressbar-value')
                    .html(pct.toPrecision(3) + '%')
                    .css('display', 'block');
            } else {
                console.warn('Content Length not reported!');
            }
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
        beforeSend: before(),
        success: success,
        error:error,
        progress: function(e) {
            if(e.lengthComputable) {
                var pct = (e.loaded / e.total) * 100;

                $('#prog')
                    .progressbar('option', 'value', pct)
                    .children('.ui-progressbar-value')
                    .html(pct.toPrecision(3) + '%')
                    .css('display', 'block');
            } else {
                console.warn('Content Length not reported!');
            }
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
        progress: function(e) {
            if(e.lengthComputable) {
                var pct = (e.loaded / e.total) * 100;

                $('#prog')
                    .progressbar('option', 'value', pct)
                    .children('.ui-progressbar-value')
                    .html(pct.toPrecision(3) + '%')
                    .css('display', 'block');
            } else {
                console.warn('Content Length not reported!');
            }
        },
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
        error:error,
        progress: function(e) {
            if(e.lengthComputable) {
                var pct = (e.loaded / e.total) * 100;

                $('#prog')
                    .progressbar('option', 'value', pct)
                    .children('.ui-progressbar-value')
                    .html(pct.toPrecision(3) + '%')
                    .css('display', 'block');
            } else {
                console.warn('Content Length not reported!');
            }
        }
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
        error:error,
        progress: function(e) {
            if(e.lengthComputable) {
                var pct = (e.loaded / e.total) * 100;

                $('#prog')
                    .progressbar('option', 'value', pct)
                    .children('.ui-progressbar-value')
                    .html(pct.toPrecision(3) + '%')
                    .css('display', 'block');
            } else {
                console.warn('Content Length not reported!');
            }
        }
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
        error:error,
        progress: function(e) {
            if(e.lengthComputable) {
                var pct = (e.loaded / e.total) * 100;

                $('#prog')
                    .progressbar('option', 'value', pct)
                    .children('.ui-progressbar-value')
                    .html(pct.toPrecision(3) + '%')
                    .css('display', 'block');
            } else {
                console.warn('Content Length not reported!');
            }
        }
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
        error:error,
        progress: function(e) {
            if(e.lengthComputable) {
                var pct = (e.loaded / e.total) * 100;

                $('#prog')
                    .progressbar('option', 'value', pct)
                    .children('.ui-progressbar-value')
                    .html(pct.toPrecision(3) + '%')
                    .css('display', 'block');
            } else {
                console.warn('Content Length not reported!');
            }
        }
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
        error:error,
        progress: function(e) {
            if(e.lengthComputable) {
                var pct = (e.loaded / e.total) * 100;

                $('#prog')
                    .progressbar('option', 'value', pct)
                    .children('.ui-progressbar-value')
                    .html(pct.toPrecision(3) + '%')
                    .css('display', 'block');
            } else {
                console.warn('Content Length not reported!');
            }
        }
    });
}