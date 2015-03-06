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
        <div class="proyectos well col-xs-3 proyecto">
            <?php
            echo "<a href='index.php?".ACTION."=load&".PROYECTO."=".$archivo."' class='badge bg-inverse'>".$archivo."</a>";
            ?>
            <a href="controller/removeProjectController.php?<?php echo REMOVE_PROYECTO ?>=<?php echo $archivo?>" class="btn btn-sm btn-danger navbar-right fa fa-trash-o"></a>
        </div>
    <?php
    }
}
?>