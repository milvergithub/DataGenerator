<?php
/**
 * Created by PhpStorm.
 * User: milver
 * Date: 19/11/14
 * Time: 14:46
 */
?>
<input type="hidden" id="tablaActual" value="<?php echo $_POST['tablaActual'] ?>"/>
<input type="hidden" id="columna" value="<?php echo $_POST['columna'] ?>"/>
<input type="hidden" id="data_type" value="<?php echo $_POST['data_type'] ?>"/>
<input type="hidden" id="es_foranea" value="<?php echo $_POST['es_foranea'] ?>"/>
<input type="hidden" id="referencian" value="<?php echo $_POST['referencian'] ?>"/>
<input type="hidden" id="tabla" value="<?php echo $_POST['tabla'] ?>"/>
<input type="hidden" id="is_null" value="<?php echo $_POST['is_null'] ?>"/>
<input type="hidden" id="constraint_type" value="<?php echo $_POST['constraint_type'] ?>"/>
<input type="hidden" id="column_default" value="<?php echo $_POST['column_default'] ?>"/>
<input type="hidden" id="check_clause" value="<?php echo $_POST['check_clause'] ?>"/>
<?php
if($_POST['constraint_type'] == "foraneas"){
    require_once "../view/type_data/formularioForeignKey.php";
}else{
    if(($_POST['constraint_type']=="PRIMARY KEY")){
        switch($_POST['data_type']){
            case 'integer':
                require_once "../view/type_data/formularioPrimaryKey.php";/*formulacio si es integer*/
            break;
            case 'smallint':
                require_once "../view/type_data/formularioPrimaryKey.php";/*formulacio si es integer*/
            break;
            case 'bigint':
                require_once "../view/type_data/formularioPrimaryKey.php";/*formulacio si es integer*/
                break;
            case 'character varying':
                require_once "../view/type_data/formularioPrimaryKey.php";/*formulario si es text*/
                break;
        }
    }else{
        if( ($_POST['data_type']=="smallint") OR
            ($_POST['data_type']=="integer") OR
            ($_POST['data_type']=="bigint") OR
            ($_POST['data_type']=="serial") OR
            ($_POST['data_type']=="bigserial") OR
            ($_POST['data_type']=="numeric") OR
            ($_POST['data_type']=="decimal")OR
            ($_POST['data_type']=="real") OR
            ($_POST['data_type']=="double precision")){
            if( ($_POST['data_type']=="smallint") OR
                ($_POST['data_type']=="integer") OR
                ($_POST['data_type']=="bigint") OR
                ($_POST['data_type']=="serial") OR
                ($_POST['data_type']=="bigserial")){
                /*SI EL TIPO DE DATO ES numero y entero*/
                require_once "../view/type_data/numeroIntegerView.php";
            }else{
                /*SI EL TIPO DE DATO ES numero y con decimal*/
                require_once "../view/type_data/numeroDecimalView.php";
            }
        }else{
            if( ($_POST['data_type']=="character varying") OR
                ($_POST['data_type']=="varchar") OR
                ($_POST['data_type']=="character") OR
                ($_POST['data_type']=="char") OR
                ($_POST['data_type']=="text")){
                /*SI EL TIPO DE DATO ES una cadena de caracteres*/
                require_once "../view/type_data/textTypeView.php";
            }else{
                if( ($_POST['data_type']=="time without time zone") OR
                    ($_POST['data_type']=="time with time zone") OR
                    ($_POST['data_type']=="timestamp without time zone") OR
                    ($_POST['data_type']=="timestamp with time zone") OR
                    ($_POST['data_type']=="interval") OR
                    ($_POST['data_type']=="date")){
                    /*SI EL TIPO DE DATOS ES una fecha u hora*/
                    require_once "../view/dateTime/dateTimeView.php";
                }else{
                    if(($_POST['data_type']=="money")){
                    /*SI EL TIPO DE DATOS ES monetario*/
                        require_once "../view/type_data/moneyTypeView.php";
                    }else{
                        if(($_POST['data_type']=="bytea")){
                        /*SI EL TIPO DE DATOS ES archivo codificado*/
                            require_once "../view/type_data/byteaTypeView.php";
                        }else{
                            if( ($_POST['data_type']=="cidr") OR
                                ($_POST['data_type']=="inet") OR
                                ($_POST['data_type']=="macaddr")){
                                /*SI EL TIPO DE DATOS ES direcciones de red*/
                                    require_once "../view/type_data/redTypeView.php";
                            }else{
                                if( ($_POST['data_type']=="boolean") ){
                                    require_once "../view/boolean/booleanTypeView.php";
                                }else{
                                    require_once "../view/type_data/type404View.php";
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
require_once "../view/formularioArea.php";
?>















