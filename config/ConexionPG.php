<?php
/**
 * Description of ConexionPG
 * @author milver
 */
class ConexionPG {
   private $host;
   private $port;
   private $dataBase;
   private $user;
   private $passw;
   function __construct($host,$port,$bd,$user,$pass){
      $this->host=$host;
      $this->port=$port;
      $this->dataBase=$bd;
      $this->user=$user;
      $this->passw=$pass;
   }
   function connectDB(){
        $BaseDato=pg_connect("host=".$this->getHost()." port=".$this->getPort()." dbname=".$this->getDataBase()." user=".$this->getUser()." password=".$this->getPassw()."")
                or die ('Error de conexión. Póngase en contacto con el administrador');
        return $BaseDato;
   }
   function testConnection(){
       $BaseDato=pg_connect("host=".$this->getHost()." port=".$this->getPort()." dbname=".$this->getDataBase()." user=".$this->getUser()." password=".$this->getPassw()."")
       or die ('<div class="alert alert-danger">
                    <span class="glyphicon glyphicon-remove-circle"></span>
                    Connection Fail...
                </div>');
       return $BaseDato;
   }
   function executeSQL($sql){
        $conx=$this->connectDB();
        if(!$conx) return 0; //Si no se pudo conectar
        else{
            $Resultado=pg_query($conx,$sql);
            return $Resultado;// retorna si fue afectada una fila
        }
    }
    /**
     * @return mixed
     */
    public function getHost(){
        return $this->host;
    }
    /**
     * @param mixed $host
     */
    public function setHost($host){
        $this->host = $host;
    }
    /**
     * @return mixed
     */
    public function getPort(){
        return $this->port;
    }
    /**
     * @param mixed $port
     */
    public function setPort($port){
        $this->port = $port;
    }
    /**
     * @return mixed
     */
    public function getDataBase(){
        return $this->dataBase;
    }
    /**
     * @param mixed $dataBase
     */
    public function setDataBase($dataBase){
        $this->dataBase = $dataBase;
    }
    /**
     * @return mixed
     */
    public function getUser(){
        return $this->user;
    }
    /**
     * @param mixed $user
     */
    public function setUser($user){
        $this->user = $user;
    }
    /**
     * @return mixed
     */
    public function getPassw(){
        return $this->passw;
    }
    /**
     * @param mixed $passw
     */
    public function setPassw($passw){
        $this->passw = $passw;
    }
}
