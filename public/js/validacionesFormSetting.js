$(document).ready(function () {
    $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        showMeridian: 1
    });
    $('#formConfiguracion').validate({
        rules: {
            numerodatos: {
                required: true,
                number:true,
                numberOnly:true
            },
            minimo:{
                required:true,
                number:true
            },
            maximo:{
                required:true,
                number:true
            },
            contenidogenerar:{
                required:true,
                lettersOnlyCom:true
            },
            separador:{
                required:true
            },
            tabla:{
                required:true
            },
            columna:{
                required:true
            },
            fechaInicial:{
                required:true
            },
            fechaFinal:{
                required:true
            },
            formularioTipoOrigen:{
                required:true
            },
            algorimos:{
                required:true
            },
            idioma:{
                required:true
            }
        },
        highlight: function(element) {
            $(element).closest('.control-group').removeClass('has-success').addClass('control-group has-error');
        },
        success: function(element) {
            element
                .closest('.control-group').removeClass('control-group has-error').addClass('has-success');
        }
    });
});
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
}/**
 * Created by milver on 11-03-15.
 */
