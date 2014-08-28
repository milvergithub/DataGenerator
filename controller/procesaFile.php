<?php
$file = fopen($_FILES['archivo']['tmp_name'], "r") or exit("Unable to open file!");
if ($_FILES['archivo']['type']=="text/plain") {
    while(!feof($file))
    {
       echo fgets($file);
    }
}
else{
    echo $_FILES['archivo']['type'];
}
fclose($file);
?>