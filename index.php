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

        <!-- Bootstrap core CSS -->
        <link href="public/css/bootstrap.css" rel="stylesheet">
        <!--<link href="public/css/bootstrap-theme.css" rel="stylesheet" />
        <link href="public/css/bootstrap.css.map" rel="stylesheet" />
        -->
        <!-- Add custom CSS here -->
        <link href="public/css/sb-admin.css" rel="stylesheet">
        <link rel="stylesheet" href="public/font-awesome/css/font-awesome.min.css">
        <!-- Page Specific CSS -->
        <link rel="stylesheet" href="public/css/morris-0.4.3.min.css">
        <link href="public/css/base.css" rel="stylesheet" />
    </head>

    <body>

        <div id="wrapper">

            <!-- Sidebar -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">Generacion Datos de prueba</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li class="active"><a href="index.php"><i class="glyphicon glyphicon-repeat"></i> Generacion Datos</a></li>
                        <li><a href="charts.html"><i class="fa fa-bar-chart-o"></i> Charts</a></li>
                        <li><a href="tables.html"><i class="fa fa-table"></i> Tables</a></li>
                        <li><a href="forms.html"><i class="fa fa-edit"></i> Forms</a></li>
                        <li><a href="typography.html"><i class="fa fa-font"></i> Typography</a></li>
                        <li><a href="bootstrap-elements.html"><i class="fa fa-desktop"></i> Bootstrap Elements</a></li>
                        <li><a href="bootstrap-grid.html"><i class="fa fa-wrench"></i> Bootstrap Grid</a></li>
                        <li><a href="blank-page.html"><i class="fa fa-file"></i> Blank Page</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Dropdown <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Dropdown Item</a></li>
                                <li><a href="#">Another Item</a></li>
                                <li><a href="#">Third Item</a></li>
                                <li><a href="#">Last Item</a></li>
                            </ul>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right navbar-user">
                        <li class="dropdown messages-dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> Messages <span class="badge">7</span> <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-header">7 New Messages</li>
                                <li class="message-preview">
                                    <a href="#">
                                        <span class="avatar"><img src="http://placehold.it/50x50"></span>
                                        <span class="name">Milver flores:</span>
                                        <span class="message">Hey there, I wanted to ask you something...</span>
                                        <span class="time"><i class="fa fa-clock-o"></i> 4:34 PM</span>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li class="message-preview">
                                    <a href="#">
                                        <span class="avatar"><img src="http://placehold.it/50x50"></span>
                                        <span class="name">John Smith:</span>
                                        <span class="message">Hey there, I wanted to ask you something...</span>
                                        <span class="time"><i class="fa fa-clock-o"></i> 4:34 PM</span>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li class="message-preview">
                                    <a href="#">
                                        <span class="avatar"><img src="http://placehold.it/50x50"></span>
                                        <span class="name">John Smith:</span>
                                        <span class="message">Hey there, I wanted to ask you something...</span>
                                        <span class="time"><i class="fa fa-clock-o"></i> 4:34 PM</span>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="#">View Inbox <span class="badge">7</span></a></li>
                            </ul>
                        </li>
                        <li class="dropdown alerts-dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> Alerts <span class="badge">3</span> <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Default <span class="label label-default">Default</span></a></li>
                                <li><a href="#">Primary <span class="label label-primary">Primary</span></a></li>
                                <li><a href="#">Success <span class="label label-success">Success</span></a></li>
                                <li><a href="#">Info <span class="label label-info">Info</span></a></li>
                                <li><a href="#">Warning <span class="label label-warning">Warning</span></a></li>
                                <li><a href="#">Danger <span class="label label-danger">Danger</span></a></li>
                                <li class="divider"></li>
                                <li><a href="#">View All</a></li>
                            </ul>
                        </li>
                        <li class="dropdown user-dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Milver flores <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> Inbox <span class="badge">7</span></a></li>
                                <li><a href="#"><i class="fa fa-gear"></i> Settings</a></li>
                                <li class="divider"></li>
                                <li><a href="#"><i class="fa fa-power-off"></i> Log Out</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </nav>

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
