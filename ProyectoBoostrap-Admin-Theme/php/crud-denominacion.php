<?php

    $accion = $_POST['accion'];

    //Modelo de los datos
	/*if(isset($_POST['accion']))
	{
		$accion = $_POST['accion'];
	}
	else if( isset($_GET['accion']))
	{
		$accion = $_GET['accion'];
	}*/

    include "conexion_1.php";

    switch($accion)
    {
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

function accionCrear($conexion)
{
	//es un arreglo para la respuesta de lo que oasa al crear un registro

	$respuesta = array();

	$eje_tematico = $_POST['eje_tematico'];
	$modalidad = $_POST['modalidad'];
	$descripcion  = $_POST['descripcion'];
	$factor  = $_POST['factor'];
	$ejemplos = $_POST['ejemplos'];

	$Query = "INSERT INTO denominacion (id, eje_tematico, modalidad, descripcion, factor, ejemplos) VALUES (NULL, '".$eje_tematico."', '".$modalidad."',  '".$descripcion."',  '".$factor."',  '".$ejemplos."')";

	//Esta intrución crea el registro en la vase de datos
	//Numero de filas (registros) adectados =1 
	$resultado = mysqli_query($conexion,$Query);

	if($resultado>=1)
	{
		$respuesta['estado'] = 1; //Para el programador
		$respuesta['mensaje']= "El registro se creo con Exito";// para el alumno o persona encargada de las electuvas (usuarios)
		$respuesta['id']	 = mysqli_insert_id($conexion); //Programador
		echo json_encode($respuesta);
	}
	else
	{
		$respuesta['estado'] = 0;//Para el programador
		$respuesta['mensaje']= "Ocurrio un error desconocido";// para el alumno o persona encargada de las electuvas (usuarios)
		$respuesta['id']	 = -1; //Programador
		echo json_encode($respuesta);
	}

}

function accionEliminar($conexion)
{
	$id = $_POST['id'];

	//codificar para eliminar el registro
	$off='0';

	//$sql = $link->query("UPDATE pacientes SET IDP='$idp' WHERE visible='0'");
	$_UPDATE_SQL="UPDATE pacientes Set visible='$off' WHERE IDP='$idp'"; 
	mysqli_query($conexion,$_UPDATE_SQL); 


				/*if ($link->query($sql)===TRUE) 
					{*/
						//echo "EL PACIENTE HA SIDO REGISTRADO CON EXITO";
						//header("location:../Pacientes/registrarPaciente.php");
						header("location:../Pacientes/guardar.php");
					/*}     
					}else {*/
						//echo "ERROR AL BORRAR EL PACIENTE " .$_UPDATE_SQL .$link-> error;
					/*}*/

	mysqli_close($link);
}

function accionLeer($conexion)
{
	$respuesta = array();

	if (isset($_GET['id'])) 
	{
		//quiero un solo registro
		$id = $_GET['id'];
	}
	else
	{
		//Quiero todos los registros
		$Query = "SELECT * FROM denominacion";
		$resultado = mysqli_query($conexion, $Query);
		//echo imprime String
		//print_r($resultado);
		
		
		
		//Ciclo para  reocrrer las columnas/registros (por le momento son 18)
		//cada registro lo vuelve en un arreglo
		while ( $row =  mysqli_fetch_array($resultado)) //contiene los 16 rows y cada uno tiene 6 fields
		{
			$rowDenominacion = array();
			//echo "Este es el id: ".$row[0];
			//echo "Este es el id: ".$row["id"];
			//echo "Este es el id: ".$row[1];
			//echo "Este es el id: ".$row["eje_tematico"];
			//echo "Este es el id: ".$row[2];
			//echo "Este es el id: ".$row["modalidad"];
			$rowDenominacion["id"]			=$row["id"];
			$rowDenominacion["eje_tematico"]=$row["eje_tematico"];
			$rowDenominacion["modalidad"]	=$row["modalidad"];
			$rowDenominacion["descripcion"]	=$row["descripcion"];
			$rowDenominacion["factor"]		=$row["factor"];
			$rowDenominacion["ejemplos"]	=$row["ejemplos"];

		}
	}

	echo json_encode();
}

function accionActualizar($conexion)
{
	$id = $_POST['id'];
	$eje_temantico = $_POST['eje_temantico'];
	$modaliddad = $_POST['modalidad'];
	$descripcion  = $_POST['descripcion'];
	$factor  = $_POST['factor'];
	$ejemplos = $_POST['ejemplos'];
}

?>