<?php
require_once "config/ConexionPG.php";
/**
 * Description of Tablas
 * @author milver
 */
class cargarModel{
    private $conexion;
    public function __construct() {
        $this->conexion=new ConexionPG(
                                        $_SESSION['host'], 
                                        $_SESSION['puerto'], 
                                        $_SESSION['base'], 
                                        $_SESSION['usuario'], 
                                        $_SESSION['password']
                                      );
    }
    public function printtableSimple() {
        $resultadoPTS=  $this->printTables();
        return $resultadoPTS;
    }
    function printTables() {
      $sqlPT="SELECT tablename FROM pg_tables WHERE schemaname = 'public'";
      $resPT= $this->conexion->Consultas($sqlPT);
      return $resPT;
    }
    public function printDetalleTable($tabla) {
      $resultadoPDT=  $this->detalleTabla($tabla);
      global $var;
      while ($regPDT = pg_fetch_assoc($resultadoPDT)) {
         $var=$var."<tr>"
                     . "<td><button class='btn btn-link' onclick=\"cargarPanelConfiguracion('".$tabla.".".$regPDT['column_name']."');\">".$regPDT['column_name']."</button></td>"
                     . "<td>".$this->isPrimaryKey($regPDT['llave'])."</td>"
                     . "<td>".$regPDT['is_nullable']."</td>"
                     . "<td>".$regPDT['data_type']."</td>"
                     . "<td><span style='color: red' class='glyphicon glyphicon-remove-circle'></span></td>"
                  . "</tr>";
      }
      return $var;
    }
    function detalleTabla($tabla) {
      $sqlDT="SELECT column_name,column_default,is_nullable,column_default AS llave,data_type FROM information_schema.columns WHERE table_name = '".$tabla."';";
      $resFT= $this->conexion->Consultas($sqlDT);
      return $resFT;
    }
    private function isPrimaryKey($cadena){
       if(trim($cadena)!= null){
         return "<span class='glyphicon glyphicon-flash'></span>";
       }
       else{
         return "";
       }
    }
}
