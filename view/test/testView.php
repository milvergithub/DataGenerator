<?php
$cantidadTablas = count($listaTablas);
$control = false;
$contador = 0;
?>
<div class="panel panel-body test">
<?php
echo "<table class='table table-bordered'>";
echo "<tr class='alert alert-info'><td>en la tabla</td><td>FALTA CONFIGURAR</td></tr>";
for($i=0;$i<count($listaTablas);$i++){
    $atributos = $model->getListaAtributos($listaTablas[$i]['tablename']);
    echo "<tr>";
    echo "<td><span class='fa-table'></span> ".$listaTablas[$i]['tablename']."</td>";
    echo "<td>";
    $estado = "";
    for($j=0;$j<count($atributos);$j++){
        if ($atributos[$j]['rellenado'] == false) {
            $estado = "<span class='badge bg-theme04'>" . $atributos[$j]['column_name'] . "</span><br>";
            echo $estado;
        }
    }
    echo "</td>";
    echo "</tr>";
}
echo "</table>";
?>
</div>