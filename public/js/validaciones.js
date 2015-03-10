/*INICIO VALADACION CREAR NUEVO PROYECTO*/
$(function(){
    $("#formulariotestconn").validationEngine({promptPosition : "topRight", scroll: true});
    $("#formulariotestconn").validate({
        rules:{
            nombreProyecto:{
                required: true
            },
            basededatos:{
                required:true
            },
            nombrebasedatos:{
                required:true
            },
            host:{
                required:true
            },
            usuario:{
                required:true
            },
            pass:{
                required:true
            },
            puerto:{
                required:true,
                number:true
            }
        },
        message:{

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
function testConection(){
    alert("hoal");
}
/*FINAL VALADACION CREAR NUEVO PROYECTO*/

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
        if(valor==0 || valor == null || valor.length == 0 || /^\s+$/.test(valor) || isNaN(valor)) {
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
        if(valor==0 || valor == null || valor.length == 0 || /^\s+$/.test(valor) || isNaN(valor)) {
            addError($("#numerodatos"));
            return false;
        }else{
            addSuccess($("#numerodatos"));
        }
    }
}

