/**
 * Created by milver on 03-03-15.
 */
function guardarConfiguracion() {
    var datosDetalle = new FormData();
    /*DATOS DEL DETALLE DE LA COLUMNA*/
    datosDetalle.append('tablaActual',document.getElementById('tablaActual').value);
    datosDetalle.append('columna',document.getElementById('columna').value);
    datosDetalle.append('data_type',document.getElementById('data_type').value);
    datosDetalle.append('es_foranea',document.getElementById('es_foranea').value);
    datosDetalle.append('referencian',document.getElementById('referencian').value);
    datosDetalle.append('tabla',document.getElementById('tabla').value);
    datosDetalle.append('referenciados',document.getElementById('referenciados').value);
    datosDetalle.append('is_null',document.getElementById('is_null').value);
    datosDetalle.append('constraint_type',document.getElementById('constraint_type').value);
    datosDetalle.append('column_default',document.getElementById('column_default').value);
    datosDetalle.append('check_clause',document.getElementById('check_clause').value);
    /*DATOS DE CONFIGURACION CANTIDAD, PROYECTO*/
    datosDetalle.append('cantidad',document.getElementById('numerodatos').value);
    datosDetalle.append('proyecto',document.getElementById('project').value);

    function metodoRango() {
        datosDetalle.append('minimo', document.getElementById('minimo').value);
        datosDetalle.append('maximo', document.getElementById('maximo').value);
        sendTypeRango(datosDetalle);
    }

    function metodoBooleano(){
        datosDetalle.append('modo',document.getElementById('modo').value);
        sendTypeBooleano(datosDetalle);
    }

    function metodoForanea(){
        sendTypeForanea(datosDetalle);
    }

    function metodoBytea(){
        var archivos = document.getElementById('archivos').files;
        for (i=0;i<archivos.length;i++){
            datosDetalle.append('archivo'+i,archivos[i]);
        }
        sendTypeBytea(datosDetalle);
    }
    function metodoLista(){
        datosDetalle.append('contenido',document.getElementById('contenidogenerar').value);
        sendTypeLista(datosDetalle);
    }
    function metodoAlgoritmoText(){
        datosDetalle.append('algorimoSeleccionado',document.getElementById('algoritmos').value);
        datosDetalle.append('idiomaSeleccionado',document.getElementById('idioma').value);
        sendTypeAlgoritmoText(datosDetalle);
    }
    function metodoDateTime(){
        datosDetalle.append('fechaInicial',document.getElementById('fechaInicial').value);
        datosDetalle.append('fechaFinal',document.getElementById('fechaFinal').value);
        datosDetalle.append('formularioTipoOrigen',document.getElementById('formularioTipoOrigen').value);
        sendTypeDateTime(datosDetalle);
    }
    function metodoEnterorDecimales(){
        datosDetalle.append('minimo', document.getElementById('minimo').value);
        datosDetalle.append('maximo', document.getElementById('maximo').value);
        sendTypeEnterosDecimales(datosDetalle);
    }
    var estado=document.getElementById('directo').value;
    if((estado)=="indirecto"){
        var seleccionado=document.getElementById('formularioTipoOrigen').value;
        switch (seleccionado){
            case 'archivo':
                alert("archivo");
                break;
            case 'bytea':
                metodoBytea();
                alert("bytea");
                break;
            case 'tabla':
                alert("tabla");
                break;
            case 'lista':
                metodoLista()
                break;
            case 'algoritmo':
                metodoAlgoritmoText();
                break;
            case 'rango':
                metodoRango();
                break;
            /*SI EL TIPO ES BOOLEANO*/
            case 'booleano':
                metodoBooleano();
                break;
            case 'Date':
                metodoDateTime();
                break;
            case 'Time':
                metodoDateTime();
                break;
            case 'DateTime':
                metodoDateTime();
                break;
            case 'algoritmosEnteros':
                metodoEnterorDecimales();
                break;
        }
    }else{
        metodoForanea();
    }

}
function llenarDatos(proyecto){
    var datos = new FormData();
    datos.append('proyecto',proyecto);
    $.ajax({
        type: "POST",
        url: "controller/rellenarController.php",
        enctype: 'multipart/form-data',
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        mimeType: 'multipart/form-data',
        beforeSend: before(),
        success: successRellenado,
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