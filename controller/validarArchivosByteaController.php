<?php
/**
 * Created by PhpStorm.
 * User: milver
 * Date: 04-03-15
 * Time: 04:42 PM
 */
foreach ($_FILES as $key) //Iteramos el arreglo de archivos
{
    echo $key['name'];;
}