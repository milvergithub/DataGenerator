<?php
session_start();
session_name("niveles");
require_once "config/config.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Milver">
        <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
        <title>DateGenIdioms</title>
        <!-- Bootstrap core CSS -->
        <link href="public/css/bootstrap.min.css" rel="stylesheet">

        <link href="public/css/bootstrap-datetimepicker.css" rel="stylesheet"/>

        <!--external css-->
        <link href="public/font-awesome/css/font-awesome.css" rel="stylesheet"/>
        <link href="public/lib/gritter/css/jquery.gritter.css" rel="stylesheet" type="text/css"/>
        <!-- Custom styles for this template -->
        <link href="public/css/style.css" rel="stylesheet">
        <link href="public/css/style-responsive.css" rel="stylesheet">
        <!--HOJAS DE ESTILO PERSONALIZADo-->
        <link href="public/css/validationEngine.jquery.css" type="text/css" rel="stylesheet"/>
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="public/lib/html5shiv.js"></script>
        <script src="public/lib/respond.min.js"></script>
        <![endif]-->
        <link href="public/css/base.css" rel="stylesheet">
    </head>
    <body>
        <section id="container">
            <?php
            include "view/menu/navbar.php";
            include "view/menu/sidebar.php"
            ?>
            <section id="main-content">
                <section class="wrapper">
                    <div class="row mt">
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
                    </div>
                    <!--/ row -->
                </section>
                <! --/wrapper -->
            </section>
            <!-- /MAIN CONTENT -->
            <!--main content end-->
            <!--footer start-->
            <footer class="site-footer">
                <div class="text-center">
                    <?php echo date('Y-m-d'); ?> - Milver Flores Acevedo
                    <a href="#container" class="go-top">
                        <i class="fa fa-angle-up"></i>
                    </a>
                </div>
            </footer>
            <!--footer end-->
        </section>
        <!-- js placed at the end of the document so the pages load faster -->
        <script src="public/lib/jquery.js"></script>
        <script src="public/lib/jquery-2.1.0.js"></script>
        <script src="public/lib/bootstrap.min.js"></script>
        <script src="public/lib/bootstrap-datetimepicker.js"></script>
        <script src="public/lib/locales/bootstrap-datetimepicker.es.js"></script>
        <script src="public/lib/jquery.dcjqaccordion.2.7.js" class="include" type="text/javascript"></script>
        <script src="public/lib/jquery.scrollTo.min.js"></script>
        <script src="public/lib/jquery.nicescroll.js" type="text/javascript"></script>
        <!--common script for all pages-->
        <script src="public/lib/common-scripts.js"></script>
        <!--script for this page-->
        <script src="public/lib/gritter/js/jquery.gritter.js" type="text/javascript"></script>
        <script src="public/lib/gritter-conf.js" type="text/javascript"></script>
        <!--PROPIOS-->
        <script src="public/lib/jquery.validationEngine-es.js" type="text/javascript"></script>
        <script src="public/lib/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
        <script src="public/lib/jquery.validate.js"></script>
        <script src="public/lib/bootbox.js"></script>
        <script src="public/js/app.js"></script>
        <script src="public/js/rellenar.js"></script>
        <script src="public/js/functionsSendTypes.js"></script>

        <script src="public/js/validacionProyecto.js"></script>
        <script src="public/js/validaciones.js" ></script>
        
    </body>
</html>