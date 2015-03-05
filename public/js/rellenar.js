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
    datosDetalle.append('is_null',document.getElementById('is_null').value);
    datosDetalle.append('constraint_type',document.getElementById('constraint_type').value);
    datosDetalle.append('column_default',document.getElementById('column_default').value);
    datosDetalle.append('check_clause',document.getElementById('check_clause').value);
    /*DATOS DE CONFIGURACION CANTIDAD, PROYECTO*/
    datosDetalle.append('cantidad',document.getElementById('numerodatos').value);
    datosDetalle.append('proyecto',document.getElementById('project').value);

    var seleccionado=document.getElementById('formularioTipoOrigen').value;

    function metodoRango() {
        datosDetalle.append('minimo', document.getElementById('minimo').value);
        datosDetalle.append('maximo', document.getElementById('maximo').value);
        datosDetalle.append('aleatorio', document.getElementById('repeat').checked);
        sendTypeRango(datosDetalle);
    }

    switch (seleccionado){
        case 'archivo':
            alert("archivo");
            datosDetalle.append()
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
            metodoRango();
            break;
    }

}