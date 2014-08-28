$(function(){
    $("#formulariotestconn").validate({
        rules:{
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

