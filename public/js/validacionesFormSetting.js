function initFunctionPlugins(){
    $(".filestyle").filestyle({buttonName: "btn-primary",size: "sm"});
    $('.form_datetime').datetimepicker({
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        showMeridian: 1
    });
    jQuery.validator.setDefaults({
        highlight: function (element, errorClass, validClass) {
            if (element.type === "radio") {
                this.findByName(element.name).addClass(errorClass).removeClass(validClass);
            } else {
                $(element).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
                $(element).closest('.form-group').find('i.fa').remove();
                $(element).closest('.col-xs-12').append('<i class="fa fa-remove fa-lg form-control-feedback"></i>');
            }
        },
        unhighlight: function (element, errorClass, validClass) {
            if (element.type === "radio") {
                this.findByName(element.name).removeClass(errorClass).addClass(validClass);
            } else {
                $(element).closest('.form-group').removeClass('has-error has-feedback').addClass('has-success has-feedback');
                $(element).closest('.form-group').find('i.fa').remove();
                $(element).closest('.col-xs-12').append('<i class="fa fa-check fa-lg form-control-feedback"></i>');
            }
        },
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function(error, element) {
            if(element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        }
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
                required:true
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
            algoritmos:{
                required:true
            },
            idioma:{
                required:true
            }
        }
    });
    soloNumeros(event)
}