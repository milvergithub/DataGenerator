$(document).ready(function () {
    $( "#btnQuared").hide();
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
        $("#divtabla").load("view/formSettings.php", {tablaactual: tabla,proyecto:document.getElementById("project").value});
    } else {
        $("#tabla" + num).css({
            display: "none"
        });
    }
}
function cargarConfiguracionTipo(tabla) {
    var elegido = $("#formularioTipoOrigen").val();
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
function addError(elemento){
    $(elemento).parent().addClass('has-error');
}
function addSuccess(elemento){
    $(elemento).parent().removeClass('has-error');
    $(elemento).parent().addClass('has-success');
}
function validacion(){
    var estado=document.getElementById('directo').value;
    if((estado)=="indirecto"){
        var valor = document.getElementById("numerodatos").value;
        if( valor == null || valor.length == 0 || /^\s+$/.test(valor) || isNaN(valor)) {
            addError($("#numerodatos"));
            return false;
        }else{
            addSuccess($("#numerodatos"));
        }
        var seleccionado=document.getElementById('formularioTipoOrigen').value;
        switch (seleccionado){
            case 'archivo':
                break;
            case 'tabla':
                var tablaSelecionada = document.getElementById("tabla").selectedIndex;
                if( tablaSelecionada == null || tablaSelecionada == 0 ) {
                    addError($("#tabla"));
                    return false;
                }else{
                    addSuccess($("#tabla"));
                }
                var columnaSelecionada = document.getElementById("columna").selectedIndex;
                if( columnaSelecionada == null || columnaSelecionada == 0 ) {
                    addError($("#columna"));
                    return false;
                }else{
                    addSuccess($("#columna"));
                }
                break;
            case 'lista'://MEJORAR
                var contenidoLista=document.formConfiguracion.contenidogenerar.value;
                alert(contenidoLista);
                if( contenidoLista == null || contenidoLista.length == 0 || /^\s+$/.test(valor)) {
                    addError($("#contenidogenerar"));
                    return false;
                }else{
                    addSuccess($("#contenidogenerar"));
                }
                break;
            case 'algoritmos':
                break;
            case 'rango':
                var valor = document.getElementById("minimo").value;
                if( valor == null || valor.length == 0 || /^\s+$/.test(valor) || isNaN(valor)) {
                    addError($("#minimo"));
                    return false;
                }else{
                    addSuccess($("#minimo"));
                }
                var valor = document.getElementById("maximo").value;
                if( valor == null || valor.length == 0 || /^\s+$/.test(valor) || isNaN(valor)) {
                    addError($("#maximo"));
                    return false;
                }else{
                    addSuccess($("#maximo"));
                }
                break;
        }

    }else{
        var valor = document.getElementById("numerodatos").value;
        if( valor == null || valor.length == 0 || /^\s+$/.test(valor) || isNaN(valor)) {
            addError($("#numerodatos"));
            return false;
        }else{
            addSuccess($("#numerodatos"));
        }
    }
}
function guardarConfiguracion() {
    var datosDetalle = new FormData();
    /*DATOS DEL DETALLE DE LA COLUMNA*/
    datosDetalle.append('tablaActual',document.getElementById('tablaActual').value);
    datosDetalle.append('columna',document.getElementById('columna').value);
    datosDetalle.append('data_type',document.getElementById('data_type').value);
    datosDetalle.append('es_foranea',document.getElementById('es_foranea').value);
    datosDetalle.append('referencian',document.getElementById('referencian').value);
    datosDetalle.append('tabla',document.getElementById('tabla').value);
    datosDetalle.append('is_null',document.getElementById('is_null').value);
    datosDetalle.append('constraint_type',document.getElementById('constraint_type').value);
    datosDetalle.append('column_default',document.getElementById('column_default').value);
    datosDetalle.append('check_clause',document.getElementById('check_clause').value);
    /*DATOS DE CONFIGURACION CANTIDAD, PROYECTO*/
    datosDetalle.append('cantidad',document.getElementById('numerodatos').value);
    datosDetalle.append('proyecto',document.getElementById('project').value);

    var seleccionado=document.getElementById('formularioTipoOrigen').value;
    switch (seleccionado){
        case 'archivo':
            alert("archivo");
            break;
        case 'tabla':
            alert("tabla");
            break;
        case 'lista':
            alert("lista");
            break;
        case 'algoritmo':
            alert("algoritmo");
            break;
        case 'rango':
            datosDetalle.append('minimo',document.getElementById('minimo').value);
            datosDetalle.append('maximo',document.getElementById('maximo').value);
            datosDetalle.append('aleatorio',document.getElementById('repeat').checked);
            sendTypeRango(datosDetalle);
            break;
    }

}
