<?php
$file = fopen($_FILES['archivo']['tmp_name'], "r") or exit("Unable to open file!");
if ($_FILES['archivo']['type'] == "text/plain") {
    $contenido = file_get_contents($_FILES['archivo']['tmp_name']);
    $valido=fnValidateAlphanumeric($contenido,',');
    if($valido){
        echo 'visible';
    }else{
        echo 'existe caracteres no validos en el contenido del archivo';
    }
} else {
    echo "<div class='alert alert-danger'>el archivo tiene una extension " . $_FILES['archivo']['type'] . " no esta permitido</div>";
}
fclose($file);
?>
<?php
function fnValidateAlphanumeric($string,$separador){
    return preg_match('/[^a-zA-Z0-9\s ]/', '', $string);
}
?>