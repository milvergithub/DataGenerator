<?php
    echo '<span class="badge bg-inverse">columnas : <span class="badge bg-theme03">'.$_POST['referencian'].'</span></span>'."<br>";
    echo '<span class="badge bg-inverse">REFERENCIA a : <span class="badge bg-theme03">'.$_POST['tabla'].'</span></span>'."<br>";
    echo '<span class="badge bg-inverse">a las columnas : <span class="badge bg-theme03">'.$_POST['referenciados'].'</span></span>'."<br>";
?>
<input type="hidden" value="directo" id="directo">
<div class="form-group">
    <div class="col-xs-12">
        <button class="btn btn-success btn-sm">guardar</button>
    </div>
</div>