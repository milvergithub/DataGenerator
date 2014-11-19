<?php
/**
 * Created by PhpStorm.
 * User: milver
 * Date: 19/11/14
 * Time: 14:46
 */
echo $_POST['tabla'];
if($_POST['es_foranea']=='true'){
    require_once "../view/formularioForeignKey.phtml";
}
else {
    if(($_POST['constraint_type']=="PRIMARY KEY")&&($_POST['data_type']=='integer')){
        require_once "../view/formularioPrimaryKey.phtml";
    }
    else{
        require_once "../view/formularioDefault.phtml";
    }
}
require_once "../view/formularioArea.phtml";
?>