<?php
$nombre = $_POST['nombre'];
if(file_exists("../projects/".$nombre)){
    $valid=true;
}
return $valid;
?>