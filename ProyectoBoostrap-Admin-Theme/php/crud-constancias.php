<?php

/*Modelo de datos = Modelo-Vista-Controlador
    Modelo  = .PHP
    Vista   = .HTML
    Controlador =.JS

	GET = 'Read'  POST = 'Create'  PUT = 'Update'   DELETE = 'Delet'	
*/


if(isset($_POST['accion'])){
	
	include "conexion_1.php";

	switch ($_POST['accion']) {
		case 'Create':
			accionCrear($conexion);
			break;
		case 'Delete':
			accionEliminar($conexion);
			break;
		case 'Read':
			accionLeer($conexion);
			break;
		case 'Update':
			accionActualizar($conexion);
			break;
		default:
			break;
	}
}

//------------------------------ Crear 

function accionCrear($conexion)
{
	//es un arreglo para la respuesta de lo que oasa al crear un registro

	$respuesta = array();

    $act 		= $_POST['actividad'];
	$dateIn 	= $_POST['fecha_inicio'];
	$dateOut 	= $_POST['fecha_fin'];
	$hours 		= $_POST['horas'];
	$file 		= $_POST['archivo'];
	$message 	= $_POST['observaciones'];

	$Query = "INSERT INTO constancia (id, actividad, fecha_inicio, fecha_fin, horas, archivo, observaciones) VALUES (NULL, '".$act."', '".$dateIn."',  '".$dateOut."',  '".$hours."',  '".$file."',  '".$message."')";

	//Esta intrución crea el registro en la vase de datos
	//Numero de filas (registros) adectados =1 
	$resultado = mysqli_query($conexion,$Query);

	if($resultado>=1)
	{
		$respuesta['estado']	 = 1; //Para el programador
		$respuesta['mensaje']	 = "El registro se creo con Exito";// para el alumno o persona encargada de las electuvas (usuarios)
		$respuesta['id']	 	 = mysqli_insert_id($conexion); //Programador
		echo json_encode($respuesta);
	}
	else
	{
		$respuesta['estado']	= 0;//Para el programador
		$respuesta['mensaje']	= "Ocurrio un error desconocido";// para el alumno o persona encargada de las electuvas (usuarios)
		$respuesta['id']		= -1; //Programador
		echo json_encode($respuesta);
	}
}

//------------------------------ Leer 

function accionLeer($conexion)
{
	$respuesta = array();
	//isset permite saber si se me esta enviando el parametro id (recive de .js)
	if (isset($_GET['id'])) 
	{
		//quiero un solo registro
		$id = $_GET['id'];
	}
	else
	{
		//Quiero todos los registros
		$Query = "SELECT * FROM constancia";
		$Respuesta["consta"]	=	array();
		$resultado = mysqli_query($conexion, $Query);
		//echo imprime String
		//print_r($resultado);
			
		
		//Ciclo para  reocrrer las columnas/registros (por le momento son 18)
		//cada registro lo vuelve en un arreglo
		while ( $row =  mysqli_fetch_array($resultado)) //contiene los 16 rows y cada uno tiene 6 fields
		{
			$rowConstancias = array();
			//echo "Este es el id: ".$row[0];
			//echo "Este es el id: ".$row["id"];
			//echo "Este es el id: ".$row[1];
			//echo "Este es el id: ".$row["eje_tematico"];
			//echo "Este es el id: ".$row[2];
			//echo "Este es el id: ".$row["modalidad"];
			$rowConstancias["id"]			=$row["id"];
			$rowConstancias["act"] = $row['actividad'];
			$rowConstancias["dateIn"] = $row['fecha_inicio'];
			$rowConstancias["dateOut"]  = $row['fecha_fin'];
			$rowConstancias["hours"]  = $row['horas'];
			$rowConstancias["file"] = $row['archivo'];
			$rowConstancias["message"] = $row['observaciones'];

			array_push($Respuesta["consta"], $constancia);
		}
        $Respuesta["estado"]	=1;
        $Respuesta["mensaje"]	="Consulta exitosa";
        
        echo json_encode($Respuesta);
	}
	echo json_encode();

}

//------------------------------ Actualizar

function accionActualizar($conexion)
{
    $ident  = $_POST['id'];
	$act    = $_POST['actividad'];
	$dateIn = $_POST['fecha_inicio'];
	$dateOut= $_POST['fecha_fin'];
	$hours  = $_POST['horas'];
	$file   = $_POST['archivo'];
	$message= $_POST['observaciones'];

    $Query ="UPDATE constancia SET actividad='".$act."', fecha_inicio='".$dataIN."', fecha_fin='".$dateOut."', horas='".$hours."', archivo='".$file."', observaciones='".$message."' WHERE id=".$Id;
	
	mysqli_query($conexion,$Query);

	if(mysqli_affected_rows($conexion)>0){
		$Respuesta['estado']=1;
		$Respuesta['mensaje']="Datos actualizados correctamente";	
	}else{
		$Respuesta['estado']=0;
		$Respuesta['mensaje']="Ocurrrio un error desconocido";
	}
	echo json_encode($Respuesta);
	
}

//------------------------------ Eliminar

function accionEliminar($conexion)
{
	$Respuesta=array();

	if(isset($_POST['id'])){
		
		$Id = $_POST['id'];
		$Query = "DELETE FROM constancia WHERE id=".$Id;

		mysqli_query($conexion,$Query);

		if(mysqli_affected_rows($conexion)>0){
			$Respuesta["estado"]	=1;
			$Respuesta["mensaje"]	="Se elimino correctamente";
		}else{
			$Respuesta["estado"]	=0;
			$Respuesta["mensaje"]	="Ocurrio un error desconocido";
		}
	}else{
		$Respuesta["estado"]	=0;
		$Respuesta["mensaje"]	="Falta un id";
	}

	echo json_encode($Respuesta);
}




?>