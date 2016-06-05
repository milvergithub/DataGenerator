<div class="panel panel-body nuevo">
    <a class="glyphicon glyphicon-plus-sign btn btn-success btn-lg" href="index.php?<?php echo ACTION ?>=nuevo">
        New
    </a>
    <button id="btnLine" onclick="changeVisualitationLine()" class="btn navbar-right fa fa-tasks"></button>
    <button id="btnQuared" onclick="changeVisualitationQuared()" class="btn navbar-right fa fa-th"></button>
</div>
<?php
$directorio=$proyectos->actionMostrarProyectos();
while ($archivo = readdir($directorio)){
    if (is_dir($archivo)){
    }
    else {
        ?>
        <div class="col-lg-2">
            <div class="well darkblue-panel">
                <div class="row">
                    <i class="fa fa-4x fa-database text-success"></i>
                <span class="pull-right">
                    <a href="controller/removeProjectController.php?<?php echo REMOVE_PROYECTO ?>=<?php echo $archivo?>" class="btn btn-danger btn-sm">
                        <i class="glyphicon glyphicon-trash"></i>
                    </a>
                </span>
                </div>
                <div class="row">
                    <span class="badge bg-inverse">
                    <?php
                        echo "<a href='index.php?".ACTION."=load&".PROYECTO."=".$archivo."' class=''>".$archivo."</a>";
                    ?>
                    </span>
                </div>
            </div>
        </div>
    <?php
    }
}
?>