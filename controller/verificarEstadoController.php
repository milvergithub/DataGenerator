<?php
/**
 * Created by PhpStorm.
 * User: milver
 * Date: 19-02-15
 * Time: 05:42 PM
 */

require_once "../model/writerReadDatesModel.php";
$model = new writerReadDatesModel($_REQUEST['proyecto']);
$listaTablas = $model->getListaTablas();
require_once '../view/test/testView.phtml';