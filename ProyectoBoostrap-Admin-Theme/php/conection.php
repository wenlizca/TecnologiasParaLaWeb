<?php
    define ("DB_HOST","localhost");
    //conexion al host
    define("DB_USER","root");
    define("DB_PASS","");
    define("DB_DATABASE","electivas");
    function Conectar()
    {
        $conexion = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_DATABASE);
        if ($conexion->connect_errno>0) 
        {
            die ("IMPOSIBLE CONECTAR[.".$conexion->connect_errno."]");
        }
        /*else 
            die("Conexion exitosa")*/
        return $conexion;
    }	

?>