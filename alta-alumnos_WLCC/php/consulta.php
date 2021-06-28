<?php
	include_once 'conexion.php';

	$objeto = new Conecion();
	$conexion= $objeto->Conectar();

	$consulta = "SELECT * FROM electivas";
	$resultado= $conexion->prepare($consulta);
	$resultado->execute();
	$data=$resultado->fetchAll(PDO::FETCH_ASSOC);

	print json_encode($data, JSON_UNDESCAPED_UNICODE); //EVIAMOS EL ARRAY AL FINAL DEL FORMATO JSON A AJAX
	$conexion=null;
?>