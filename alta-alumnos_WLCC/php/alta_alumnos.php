<?php


if(isset($_POST['accion'])){

	include "conexion.php";

	switch ($_POST['accion']) {
		case 'read':
			ActionReadPHP($conexion);
			break;
		case 'update':
			ActionUpdatePHP($conexion);
			break;
		case 'create':
			ActionCreatePHP($conexion);
			break;
		case 'delete':
			ActionDeletePHP($conexion);
			break;
		default:
			$Respuesta["estado"]=0;
			$Respuesta["mensaje"]="Accion no valida";
			echo json_encode($Respuesta);
			break;
	}

}else{
	$Respuesta["estado"]=0;
	$Respuesta["mensaje"]="Faltan Parametros";
	echo json_encode($Respuesta);
}

function ActionCreatePHP($conexion){

	$nombre 		= $_POST['nombre'];
	$programa 	= $_POST['programa'];
  $apellidoP 	= $_POST['apellidoP'];
  $apellidoM 	= $_POST['apellidoM'];

	$Query = "INSERT INTO alumno (id, programa, nombre, apellidoP, apellidoM) VALUES (NULL, '".$programa."',  '".$nombre."', '".$apellidoP."', '".$apellidoM."')";

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


function ActionReadPHP($conexion){

	$Query = "SELECT * FROM alumno";

	$Respuesta["crud"]	=	array();

	$Resultado 	= mysqli_query($conexion,$Query);


	while($Renglon = mysqli_fetch_array($Resultado)){

		$Tipo_Evento = array();

		$Tipo_Evento["id"]			= $Renglon["id"];
		$Tipo_Evento["programa"]	= $Renglon["programa"];
		$Tipo_Evento["nombre"]      = $Renglon["nombre"];

		array_push($Respuesta["crud"], $Tipo_Evento);
	}
	$Respuesta["estado"]	=1;
	$Respuesta["mensaje"]	="Consulta exitosa";

	echo json_encode($Respuesta);
}



function ActionUpdatePHP($conexion){

  $Id  = $_POST['id'];
	$nombre    = $_POST['nombre'];
	$programa = $_POST['programa'];
  $apellidoP 	= $_POST['apellidoP'];
  $apellidoM 	= $_POST['apellidoM'];


    $Query ="UPDATE alumno SET  nombre='".$nombre."', apellidoP='".$apellidoP."', apellidoM='".$apellidoM."', programa='".$programa."' WHERE id=".$Id;

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


function ActionDeletePHP($conexion){

	$Respuesta=array();

	if(isset($_POST['id'])){

		$Id = $_POST['id'];

		$Query = "DELETE FROM alumno WHERE id=".$Id;

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
