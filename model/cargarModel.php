<?php

require_once "config/ConexionPG.php";
require_once "config/modulos.php";

/**
 * Description of Tablas
 * @author milver
 */
class cargarModel {

    private $conexion;

    public function __construct($directorio) {
        $datos = getDatosConexion("projects/" . $directorio . "/conexion/conexion.xml");
        $this->conexion = new ConexionPG(
                $datos[1], $datos[2], $datos[4], $datos[5], $datos[6]
        );
    }

    public function printtableSimple() {
        $resultadoPTS = $this->printTables();
        return $resultadoPTS;
    }

    function printTables() {
        $resultado = array();
        $sqlPT = "SELECT tablename FROM pg_tables WHERE schemaname = 'public'";
        $resPT = $this->conexion->Consultas($sqlPT);
        while ($reg = pg_fetch_assoc($resPT)) {
            $resultado[] = $reg;
        }
        //print_r($resultado);
        return $resultado;
    }

    public function printDetalleTable($tabla) {
        $resultadoPDT = $this->detalleTabla($tabla);
        //print_r($resultadoPDT);
        global $var;
        $var = null;
        for ($contador = 0; $contador < sizeof($resultadoPDT); $contador++) {
            $var = $var . "<tr>"
                    . "<td><button class='btn btn-link' onclick=\"cargarPanelConfiguracion('" . $tabla . "." . $resultadoPDT[$contador]['column_name'] . "');\">" . $resultadoPDT[$contador]['column_name'] . "</button></td>"
                    . "<td>" . $this->isPrimaryKey($resultadoPDT[$contador]['constraint_type']) . "</td>"
                    . "<td>" . $resultadoPDT[$contador]['is_nullable'] . "</td>"
                    . "<td>" . $resultadoPDT[$contador]['data_type'] . "</td>"
                    . "<td class='indicador'><span style='color: red' class='glyphicon glyphicon-remove-circle'></span></td>"
                    . "</tr>";
        }
        return $var;
    }

    function detalleTabla($tabla) {
        $resultadoDT = array();
        $sqlDT = "SELECT  tab_columns.column_name, data_type, character_maximum_length,
	                    numeric_precision, is_nullable, tab_constraints.constraint_type
                FROM 	information_schema.columns AS tab_columns
	            LEFT OUTER JOIN
	                    information_schema.constraint_column_usage AS col_constraints
	                 ON tab_columns.table_name = col_constraints.table_name AND
                        tab_columns.column_name = col_constraints.column_name
                LEFT OUTER JOIN
                        information_schema.table_constraints AS tab_constraints
                     ON tab_constraints.constraint_name = col_constraints.constraint_name
                LEFT OUTER JOIN
                        information_schema.check_constraints AS col_check_constraints
                     ON col_check_constraints.constraint_name = tab_constraints.constraint_name
                WHERE   tab_columns.table_name = '" . $tabla . "' AND
                        tab_columns.table_schema = 'public' AND
                        (tab_constraints.constraint_type='PRIMARY KEY' OR tab_constraints.constraint_type ISNULL)
                ORDER BY ordinal_position;";
        $resFT = $this->conexion->Consultas($sqlDT);
        while ($regFT = pg_fetch_assoc($resFT)) {
            $resultadoDT[] = $regFT;
        }
        return $this->getTablaReducida($this->aumentarCampos($resultadoDT), $tabla);
        //return $this->aumentarCampos($resultadoDT);
        //return $resultadoDT;
    }

    private function aumentarCampos($reducido) {
        $aumentado = insertarElementos($reducido);
        return $aumentado;
    }

    function getTablaReducida($tablaAumentada, $nombreTabla) {
        $tablaAum = $tablaAumentada;
        $res = $this->getReferenciasTables($nombreTabla);
        for ($i = 0; $i < sizeof($res); $i++) {
            $indices = explode(",", $res[$i]["referencias"]);
            $tablaAum = $this->buscarReferenciados($tablaAum, $indices);
        }
        return $this->getTableEstructurado($tablaAum, $res);
    }

    /* ( [column_name],[data_type],[character_maximum_length],[es_foranea],[referenciado],[tabla],[referenciados],
      [numeric_precision],[is_nullable],[constraint_type]) */

    function getTableEstructurado($tabla, $referencias) {
        $retorno = array();
        for ($i = 0; $i < sizeof($referencias); $i++) {
            $arreglo = ["column_name" => $referencias[$i]["referencias"], "data_type" => "FOREIGN", "character_maximum_length" => "",
                "es_foranea" => "true", "referenciado" => $referencias[$i]["referencias"], "tabla" => $referencias[$i]["tabla"],
                "referenciados" => $referencias[$i]["referenciados"], "numeric_precision" => "", "is_nullable" => "NO",
                "constraint_type" => "foraneas"];
            $retorno[$i] = $arreglo;
        }
        for ($k = 0; $k < sizeof($tabla); $k++) {
            if ($tabla[$k]["es_foranea"] == "false") {
                $retorno[sizeof($retorno)] = $tabla[$k];
            }
        }
        return $retorno;
    }

    function buscarReferenciados($tablaAument, $indices) {
        for ($i = 0; $i < sizeof($indices); $i++) {
            for ($j = 0; $j < sizeof($tablaAument); $j++) {
                if (trim($tablaAument[$j]["column_name"]) == trim($indices[$i])) {
                    $tablaAument[$j]["es_foranea"] = "true";
                }
            }
        }
        return $tablaAument;
    }

    private function getReferenciasTables($tabla) {
        $resultado = array();
        $refSucio = $this->getReferencias($tabla);
        for ($i = 0; $i < sizeof($refSucio); $i++) {
            $array = multiexplode(array("(", ")"), $refSucio[$i]["referencias"]);
            $variable = dameImportantes($array);
            $arreglo = ["referencias" => $variable[0], "tabla" => $variable[1], "referenciados" => $variable[2]];
            $resultado[$i] = $arreglo;
        }
        return $resultado;
    }

    private function getReferencias($tabla) {
        $resultadoRef = array();
        $sqlRef = "SELECT (SELECT relname
                         FROM pg_catalog.pg_class c LEFT JOIN
                              pg_catalog.pg_namespace n ON n.oid = c.relnamespace
                         WHERE
                              c.oid=r.conrelid) as nombre,conname,
                              pg_catalog.pg_get_constraintdef(oid, true) as referencias from
                              pg_catalog.pg_constraint r WHERE r.conrelid in
                              ( SELECT c.oid FROM pg_catalog.pg_class c LEFT JOIN
                              pg_catalog.pg_namespace n ON n.oid = c.relnamespace WHERE c.relname !~
                              'pg_' and c.relkind = 'r' AND pg_catalog.pg_table_is_visible(c.oid))
                              AND r.contype = 'f'
                              AND (SELECT relname FROM pg_catalog.pg_class c LEFT JOIN
                              pg_catalog.pg_namespace n ON n.oid = c.relnamespace WHERE
                              c.oid=r.conrelid)='" . $tabla . "';";
        $resRF = $this->conexion->Consultas($sqlRef);
        while ($regRef = pg_fetch_assoc($resRF)) {
            $resultadoRef[] = $regRef;
        }
        return $resultadoRef;
    }

    private function getTablesToRefences() {
        $resultadoRef = array();
        $sqlRef = "SELECT (SELECT relname
                         FROM pg_catalog.pg_class c LEFT JOIN
                              pg_catalog.pg_namespace n ON n.oid = c.relnamespace
                         WHERE
                              c.oid=r.conrelid) as tablas,conname,
                              pg_catalog.pg_get_constraintdef(oid, true) as referencias from
                              pg_catalog.pg_constraint r WHERE r.conrelid in
                              ( SELECT c.oid FROM pg_catalog.pg_class c LEFT JOIN
                              pg_catalog.pg_namespace n ON n.oid = c.relnamespace WHERE c.relname !~
                              'pg_' and c.relkind = 'r' AND pg_catalog.pg_table_is_visible(c.oid))
                              AND r.contype = 'f'";
        $resRF = $this->conexion->Consultas($sqlRef);
        while ($regRef = pg_fetch_assoc($resRF)) {
            $resultadoRef[] = $regRef;
        }
        return $resultadoRef;
    }

    public function getCatalogatorsAndSimplex() {
        $resultadoCAS = array();
        $sqlCAS = "SELECT tablename
                 FROM pg_tables
                 WHERE schemaname = 'public' AND
                       tablename NOT IN(SELECT (SELECT relname FROM pg_catalog.pg_class c LEFT JOIN
                       pg_catalog.pg_namespace n ON n.oid = c.relnamespace WHERE
                       c.oid=r.conrelid) as nombre
                 FROM
                       pg_catalog.pg_constraint r WHERE r.conrelid in
                       ( SELECT c.oid FROM pg_catalog.pg_class c LEFT JOIN
                                pg_catalog.pg_namespace n ON n.oid = c.relnamespace WHERE c.relname !~
                                'pg_' and c.relkind = 'r' AND pg_catalog.pg_table_is_visible(c.oid))
                                AND r.contype = 'f')";
        $resCAS = $this->conexion->Consultas($sqlCAS);
        while ($regCAS = pg_fetch_assoc($resCAS)) {
            $resultadoCAS[] = $regCAS;
        }
        return $resultadoCAS;
    }

    private function isPrimaryKey($cadena) {
        if (trim($cadena) != null) {
            return "<span class='glyphicon glyphicon-flash h6' style='color: orange'></span>";
        } else {
            return "";
        }
    }

    public function getTablesAndReferences() {
        $enaccion = true;
        $tablasCatalogators = $this->getCatalogatorsAndSimplex();
        $tablasReferenciadas = formatearTablasAndReferenciados($this->getTablesToRefences());
        $general = array();
        $lineal = $this->getReferenciasLineal($tablasCatalogators);
        $general[0] = $lineal;
        $cantidad = 0;
        if ($enaccion) {
            while ($this->getCantidadRevisar($tablasReferenciadas) > 0) {
                $filaArray = $general[sizeof($general) - 1];
                $nuevoFila = array();
                $ind = 0;
                for ($i = 0; $i < sizeof($filaArray); $i++) {
                    for ($j = 0; $j < sizeof($tablasReferenciadas); $j++) {
                        if ($tablasReferenciadas[$j]["referencias"] == $filaArray[$i]) {
                            $nuevoFila[$ind] = $tablasReferenciadas[$j]["tabla"];
                            $tablasReferenciadas[$j]["revisado"] = "true";
                            $ind++;
                        }
                    }
                }
                $posiscion = sizeof($general);
                $general[$posiscion] = $nuevoFila;
                $cantidad++;
            }
            //print_r($general);
            //echo "--------------------------------------------------------";
            //print_r(array_reverse($this->getRemoveRepeticion($general)));
        }
        return array_reverse($this->getRemoveRepeticion($general));
    }

    public function getRemoveRepeticion($ordenadoCRT) {
        $ordenadoSRT = array();
        $ind = 0;
        for ($i = count($ordenadoCRT); $i > 0; $i--) {
            for ($j = 0; $j < count($ordenadoCRT[$i - 1]); $j++) {
                if (!($this->busacarExistencia($ordenadoSRT, $ordenadoCRT[$i - 1][$j]))) {
                    $tablaArray = ["tablename" => $ordenadoCRT[$i - 1][$j], "nivel" => ($i - 1)];
                    $ordenadoSRT[$ind] = $tablaArray;
                    $ind++;
                }
            }
        }
        return $ordenadoSRT;
    }

    public function busacarExistencia($ordenado, $tabla) {
        $respuesta = false;
        for ($i = 0; $i < count($ordenado); $i++) {
            if ($ordenado[$i]["tablename"] == $tabla) {
                $respuesta = true;
                break;
            }
        }
        return $respuesta;
    }

    public function getReferenciasLineal($vertical) {
        $lineal = array();
        $contador = 0;
        for ($i = 0; $i < sizeof($vertical); $i++) {
            $lineal[$contador] = $vertical[$i]["tablename"];
            $contador++;
        }
        return $lineal;
    }

    public function getCantidadRevisar($tblRev) {
        $cantidad = 0;
        for ($i = 0; $i < sizeof($tblRev); $i++) {
            if ($tblRev[$i]['revisado'] == "false") {
                $cantidad++;
            }
        }
        return $cantidad;
    }

}
?>






















