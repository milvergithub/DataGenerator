<?php
/**
 * Description of ConexionPG
 * @author milver
 */
class ConexionPG {
   private $host;
   private $puerto;
   private $basedatos;
   private $usuario;
   private $passw;
   function __construct($host,$port,$bd,$user,$pass){
      $this->host=$host;
      $this->puerto=$port;
      $this->basedatos=$bd;
      $this->usuario=$user;
      $this->passw=$pass;
   }
   function Conectar(){
       $BaseDato=pg_connect("host=$this->host port=$this->puerto dbname=$this->basedatos user=$this->usuario password=$this->passw")
                or die ('Error de conexión. Póngase en contacto con el administrador');
        return $BaseDato;
   }
   function Consultas($sql){
        $conx=$this->Conectar();
        if(!$conx) return 0; //Si no se pudo conectar
        else{
            $Resultado=pg_query($conx,$sql);
            return $Resultado;// retorna si fue afectada una fila
        }
    }
}
