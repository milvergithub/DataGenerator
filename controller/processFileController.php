<?php
$file = fopen($_FILES['archivo']['tmp_name'], "r") or exit("Unable to open file!");
if ($_FILES['archivo']['type']=="text/plain") {
    $contenido=file_get_contents($_FILES['archivo']['tmp_name']);
    echo "visible";//para que sea visible el boton submit

}
else{
    echo "<div class='alert alert-danger'>el archivo tiene una extension ".$_FILES['archivo']['type']." no esta permitido</div>";
}
fclose($file);
?>