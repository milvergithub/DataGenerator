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
    <meta name="author" content="Milver">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>DateGenIdioms</title>
    <!-- Bootstrap core CSS -->
    <link href="public/css/bootstrap.min.css" rel="stylesheet">
    <!--external css-->
    <link href="public/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="public/js/gritter/css/jquery.gritter.css" rel="stylesheet" type="text/css" />
    <!-- Custom styles for this template -->
    <link href="public/css/style.css" rel="stylesheet">
    <link href="public/css/style-responsive.css" rel="stylesheet">
    <!--HOJAS DE ESTILO PERSONALIZADo-->
    <link href="public/css/validationEngine.jquery.css" type="text/css" rel="stylesheet" />
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="public/js/html5shiv.js"></script>
      <script src="public/js/respond.min.js"></script>
    <![endif]-->
      <link href="public/css/base.css" rel="stylesheet">
  </head>
  <body>
  <section id="container" >
      <?php
        include "view/navbar.phtml";
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
      		</div><!--/ row -->
          </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2014 - Alvarez.is
              <a href="general.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="public/js/jquery.js"></script>
    <script src="public/js/jquery-2.1.0.js"></script>
    <script src="public/js/bootstrap.min.js"></script>
    <script src="public/js/jquery.dcjqaccordion.2.7.js" class="include" type="text/javascript" ></script>
    <script src="public/js/jquery.scrollTo.min.js"></script>
    <script src="public/js/jquery.nicescroll.js" type="text/javascript"></script>
    <!--common script for all pages-->
    <script src="public/js/common-scripts.js"></script>
    <!--script for this page-->
    <script src="public/js/gritter/js/jquery.gritter.js" type="text/javascript"></script>
    <script src="public/js/gritter-conf.js" type="text/javascript" ></script>
    <!--PROPIOS-->
    <script src="public/js/jquery.validationEngine-es.js" type="text/javascript"></script>
    <script src="public/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
    <script src="public/js/jquery.validate.js"></script>
    <script src="public/js/bootbox.js" ></script>
    <script src="public/js/app.js"></script>
    <script src="public/js/validaciones.js"></script>
  </body>
</html>