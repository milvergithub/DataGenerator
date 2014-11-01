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
                    echo "<a href='index.php?".ACTION."=load&".PROYECTO."=".$archivo."' class='panel'>".$archivo."</a>";
                    ?>

                </div>
                <?php
            }
        }
    }
} 