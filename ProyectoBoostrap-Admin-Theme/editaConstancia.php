<?php
include_once('php/conexion.php');

$database = new Connection();
$db = $database->open();


$idConstancia=$_GET['id'];
$nom=$_GET["nombre"];
$aP=$_GET["ape_pat"];
$aM=$_GET["ape_mat"];
$edad=$_GET["edad"];
$pass1=$_GET["pas1"];
$pass2=$_GET["pas2"];

//intento la acción, si si entra entonces elimina, sino me va a mostrar el error
try{ 
    //$sql=$link->query("UPDATE constancia SET actividad='$actividad', fecha_inicio='$inicio', fecha_fin='$final', horas='$horas', archivo='$archivo', observaciones='$observaciones', observaciones_encargado='$observaciones', creditos='$horas' WHERE id='$id' ";
    
    $sql="UPDATE constancia SET actividad='$actividad', fecha_inicio='$inicio', fecha_fin='$final', horas='$horas', archivo='$archivo', observaciones='$observaciones', observaciones_encargado='$observaciones', creditos='$horas' WHERE id='$id' ";

	if ($link->query($sql)===TRUE) 
	{
		header("location:altas-constancia.php");
	}
    {
        echo "Error al Elminar";
    }
    else
    {
        echo "Eliminado con Exito";
        header("location:altas-constancia.php");
    }
}catch(PDOException $e){
    echo "Hubo un problema en la conexión: " . $e->getMessage();
}

mysqli_close($link); //cierro la conexion
?>