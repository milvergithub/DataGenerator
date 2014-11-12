<?php
session_start();
require_once "config/config.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Generacion Datos BD</title>
        <link href="public/css/bootstrap.css" rel="stylesheet">
        <link href="public/css/sb-admin.css" rel="stylesheet">
        <link rel="stylesheet" href="public/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="public/css/morris-0.4.3.min.css">
        <link href="public/css/base.css" rel="stylesheet" />
    </head>
    <body>
        <div id="wrapper">
            <!-- begin Sidebar -->
            <?php
                require_once "view/navbar.phtml";
            ?>
            <!-- End Sidebar -->
            <div id="page-wrapper" class="full-with">
                <!--	CONTENIDO	-->
                <div class="panel-heading"></div>
                <?php
                if (isset($_GET)) {
                    if (!empty($_GET[ACTION])) {
                        $accion = $_GET[ACTION];
                    } else {
                        $accion = "home";
                    }
                } else {
                    $accion = "home";
                }
                if (is_file("controller/" . $accion . "Controller.php")) {
                    require_once "controller/" . $accion . "Controller.php";
                } else {
                    require_once "controller/errorController.php";
                }
                ?>
            </div><!-- /#page-wrapper -->
        </div><!-- /#wrapper -->
        <!-- JavaScript -->
        <script src="public/js/jquery-2.1.0.js"></script>
        <script src="public/js/bootstrap.min.js"></script>
        <script src="public/js/jquery.validate.js"></script>
        <script src="public/js/bootbox.js" ></script>
        <script src="public/js/app.js"></script>
        <script src="public/js/validaciones.js"></script>
        <!-- Page Specific Plugins -->
        <script src="public/js/raphael.js"></script>
        <script src="public/js/tablesorter/jquery.tablesorter.js"></script>
        <script src="public/js/tablesorter/tables.js"></script>
    </body>
</html>
