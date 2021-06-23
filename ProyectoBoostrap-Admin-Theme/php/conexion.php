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


// Creamos la clase Connection
Class Connection{
 // Declaramos los accesos al servidor de datos
	private $server = "mysql:host=localhost;dbname=electivas";
	private $username = "root";
	private $password = "";
	private $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);
	protected $conn;

 	
	public function open(){
 		try{
 			$this->conn = new PDO($this->server, $this->username, $this->password, $this->options);
 			return $this->conn;
 		}
 		catch (PDOException $e){
			// Muestra un mensaje si falla la conexión
 			echo "Hubo un problema con la conexión: " . $e->getMessage();
 		}
 
    }
 
	public function close(){
   		$this->conn = null;
 	}
 
}
 
?>