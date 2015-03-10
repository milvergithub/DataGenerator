<!-- **********************************************************************************************************************************************************
MAIN SIDEBAR MENU
*********************************************************************************************************************************************************** -->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">

            <p class="centered"><a href="index.php"><img src="public/img/circulo.png" class="img-circle" width="60"></a>
            </p>
            <h5 class="centered">COLORES</h5>
            <?php
            require_once 'model/loadModel.php';
            if (!empty($_GET[PROYECTO])) {
                if (file_exists("projects/" . $_GET[PROYECTO])) {
                    $loadTablas = new loadModel($_GET[PROYECTO]);
                    for($i=0;$i<=$loadTablas->getCantidadDeNiveles();$i++){
                    ?>
                        <li class="nivelPanelNiv<?php echo $i ?>">
                            <a href="javascript:;">
                                <i class="fa fa-th"></i>
                                <span>Nivel <?php echo $i ?></span>
                            </a>
                        </li>
                    <?php
                    }
                    //require_once 'view/load.php';
                } else {
                    require_once "view/menu/helpsidebar.php";
                }
            } else {
                require_once "view/menu/helpsidebar.php";
            }
            ?>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->