<?php
/**
 * Created by PhpStorm.
 * User: milver
 * Date: 30/09/14
 * Time: 16:53
 */

class listarProyectosController {

    function __construct(){

    }
    function actionMostrarProyectos(){
        $directorio = opendir("projects");
        while ($archivo = readdir($directorio)){
            if (is_dir($archivo)){
            }
            else {
                ?>
                <div class="col-xs-3 well proyecto">
                    <?php
                    echo "<a href='index.php?accion=cargar&project=".$archivo."'><h2>".$archivo."</h2></a>";
                    ?>

                </div>
                <?php
            }
        }
    }
} 