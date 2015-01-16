<?php
/**
 * Created by PhpStorm.
 * User: milver
 * Date: 19/11/14
 * Time: 14:46
 */
if($_POST['constraint_type'] == "foraneas"){
    require_once "../view/formularioForeignKey.phtml";
}
else {
    if(($_POST['constraint_type']=="PRIMARY KEY")&&($_POST['data_type']=='integer')){
        if(is_file("../view/formularioPrimaryKey.phtml")){
            require_once "../view/formularioPrimaryKey.phtml";
        }
        else{
            require_once "../view/errorAjax.phtml";
        }
    }
    else{
        require_once "../view/formularioDefault.phtml";
    }
}
require_once "../view/formularioArea.phtml";
?>