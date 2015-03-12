$(document).ready(function () {
    $( "#btnQuared").hide();
    /*AGREGANDO VALIDADOR DE SOLO PERMITIR NUMEROS MAYORES A CERO y ENTEROS*/
    jQuery.validator.addMethod("numberOnly",function(value,element){
        return this.optional(element) || /^-?[1-9][0-9]*$/i.test(value);
    },'<span style="color: #cd0a0a">ingrese numero mayor a 0</span>')

    /*AGREGANDO VALIDADOR DE SOLO CARACTERES a execcion de " , " */
    jQuery.validator.addMethod("lettersOnlyCom",function(value,element){
        return this.optional(element) || /^[,a-z-0-9]+$/i.test(value);
    },'<span style="color: #cd0a0a">ingrese caracteres validos</span>')

});
function cargarPanelConfiguracion(tablaActual, columna, data_type, esforanea, referencian, tabla,referenciados, isnull, constraint_type,column_default,check_clause) {
    var identificador = tablaActual.toUpperCase() + '.' + columna;
    $("#tablaCampo").html("<span class='badge bg-primary'>"+identificador+"</span>" +
    "<input type='hidden' name='nombre_columna' id='nombre_columna' value='" + identificador + "'/>");
    var datoConfig = new FormData();
    datoConfig.append("tablaActual", tablaActual);
    datoConfig.append("columna", columna);
    datoConfig.append("data_type", data_type);
    datoConfig.append("es_foranea", esforanea);
    datoConfig.append("referencian", referencian);
    datoConfig.append("tabla", tabla);
    datoConfig.append("referenciados", referenciados);
    datoConfig.append("is_null", isnull);
    datoConfig.append("constraint_type", constraint_type);
    datoConfig.append("column_default",column_default);
    datoConfig.append("check_clause",check_clause);
    cargarPanelAdecuado(datoConfig);
}
function cargarPanelAdecuado(datos) {

    $.ajax({
        type: "POST",
        url: "controller/loadPanelAdecuadoController.php",
        enctype: 'multipart/form-data',
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        mimeType: 'multipart/form-data',
        beforeSend: function (dato) {
            $("#formularioPersonalizado").html("<img src='public/img/ajax-loader.gif' class='img-responsive'/>");
            $("#formularioPersonalizado").show();
        },
        success: function (data) {
            $("#formularioPersonalizado").html(data);
            $("#formularioPersonalizado").show();
        },
        error: function () {
            $("#formularioPersonalizado").text("error")
        }
    });
}
function mostrarOcultar(num, tabla) {
    if ($("#tabla" + num).css('display') == 'none') {
        $("#tabla" + num).css({
            display: "show"
        });
        $("#NombreTabla").html(tabla);
        var datos = new FormData();
        datos.append('tablaactual',tabla);
        datos.append('proyecto',document.getElementById("project").value);
        $.ajax({
                type: "POST",
                url: "controller/mostrarOcultarController.php",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function (dato) {
                    $("#divtabla").html("cargando");
                    $("#divtabla").show();
                },
                success: function (data) {
                    $("#divtabla").html(data);
                    $("#divtabla").show();

                },
                error: function () {
                    $("#divtabla").text("error")
                }
            });
    } else {
        $("#tabla" + num).css({
            display: "none"
        });
    }
}
function cargarConfiguracionTipoDateTime(tabla){

}
function cargarConfiguracionTipo(tabla) {
    var elegido = $("#formularioTipoOrigen").val();
    if(elegido=='Date' || elegido=="Time" || elegido=="DateTime"){
        $("#fechas").css({
            display: "show"
        });
    }else{
        var datoConfigTipo = new FormData();
        datoConfigTipo.append("elegido", elegido);
        datoConfigTipo.append("proyecto", $("#project").val())
        $.ajax({
            type: "POST",
            url: "controller/loadConfigTypeController.php",
            enctype: 'multipart/form-data',
            data: datoConfigTipo,
            cache: false,
            contentType: false,
            processData: false,
            mimeType: 'multipart/form-data',
            beforeSend: function (dato) {
                $("#opcionconfiguracion").html("<img src='public/img/loadingblue.gif' class='img-responsive'/>");
                $("#opcionconfiguracion").show();
            },
            success: function (data) {
                $("#opcionconfiguracion").html(data);
                $("#opcionconfiguracion").show();

            },
            error: function () {
                $("#opcionconfiguracion").text("error")
            }
        });
    }
}

function cargarContenidoTexto() {
    var archivo = $("#archivo")[0].files[0];//$( '#anexo' )[0].files[0])
    var datoDoc = new FormData();
    datoDoc.append("archivo", archivo);
    $.ajax({
        type: "POST",
        url: "controller/processFileController.php",
        enctype: 'multipart/form-data',
        data: datoDoc,
        cache: false,
        contentType: false,
        processData: false,
        mimeType: 'multipart/form-data',
        beforeSend: function (dato) {
            $("#contenidogenerar").html("<img src='public/img/loadingblue.gif' class='img-responsive'/>");
            $("#contenidogenerar").show();
        },
        success: function (data) {
            if(data==='visible'){
                $("#divsubmit").css("display", "block");
            }else{
                $("#contenidogenerar").text(data);
                bootbox.alert(data, function () {
                });
                $("#archivo").val(null);
                $("#divsubmit").css("display", "none");
            }
        },
        error: function () {
            $("#contenidogenerar").text("error")
        }
    });
}
function cargarColumnasTabla() {
    var proyecto = $("#project").val();
    var columna = $("#tabla").val();
    var dato = new FormData();
    dato.append("tabla", columna);
    dato.append("proyecto", proyecto);
    $.ajax({
        type: "POST",
        url: "controller/columnasController.php",
        enctype: 'multipart/form-data',
        data: dato,
        cache: false,
        contentType: false,
        processData: false,
        mimeType: 'multipart/form-data',
        beforeSend: function (data) {
            $("#columna").html("<option value=''>CARGANDO...</option>");
            $("#columna").show();
        },
        success: function (data) {
            $("#columna").html(data);
        },
        error: function () {
            $("#columna").text("error")
        }
    });
}
function changeVisualitationLine(){
    $('.proyectos').removeClass('well col-xs-3 proyecto');
    $('.proyectos').addClass('panel panel-body line');
    $( "#btnLine").hide();
    $( "#btnQuared").show();
}
function changeVisualitationQuared(){
    $('.proyectos').removeClass('panel panel-body line');
    $('.proyectos').addClass('well col-xs-3 proyecto');
    $( "#btnQuared").hide();
    $( "#btnLine").show();
}
