<?php
/**
 * Created by PhpStorm.
 * User: milver
 * Date: 12/11/14
 * Time: 15:08
 */

class removeProjectModel {

    public function  __construct(){

    }
    function eliminarDir($path){
        $path=rtrim(strval($path),'/');
        $d=dir($path);
        if(!$d)
            return false;
        while(false!==($current=$d->read())){
            if($current==='.' || $current === '..')
                continue;
            $file= $d->path.'/'.$current;
            if(is_dir($file))
                $this->eliminarDir($file);
            if(is_file($file))
                unlink($file);
        }
        rmdir($d->path);
        $d->close();
        return true;
    }
    function fDelDir($dir){
        $Res = false;
        if ( file_exists($dir) ) {
            $dh = opendir($dir);
            while ($file=readdir($dh)) {
                if ($file!="." && $file!="..") {
                    $fullpath=$dir."/".$file;
                    if (!is_dir($fullpath)) {
                        unlink($fullpath);
                    }else {
                        fDeldir($fullpath);
                    }
                }
            }
            closedir($dh);
            if (rmdir($dir)) {
                $Res = true;
            }
        }
        return $Res;
    }
    function deleteDirectory($dir) {
        if(!$dh = @opendir($dir)) return;
        while (false !== ($current = readdir($dh))) {
            if($current != '.' && $current != '..') {
                echo 'Se ha borrado el archivo '.$dir.'/'.$current.'<br/>';
                if (!@unlink($dir.'/'.$current))
                    deleteDirectory($dir.'/'.$current);
            }
        }
        closedir($dh);
        echo 'Se ha borrado el directorio '.$dir.'<br/>';
        @rmdir($dir);
    }
} 