<?php
include_once('php/conexion.php');

$database = new Connection();
$db = $database->open();


$id = (isset($_POST['id'])) ? $_POST['id'] : '';

$eje_tematico=$_GET['creareje'];
$modalidad=$_GET['crearmodalidad'];
$descripcion=$_GET['creardescripcion'];
$factor=$_GET['crearfactor'];
$ejemplos=$_GET['crearaejemplos'];


//intento la acción, si si entra entonces elimina, sino me va a mostrar el error
try{ 
    
    //$sql=$link->query("SELECT * FROM denominacion WHERE id=$idDenominacion");

    $sql=$link->query("INSERT INTO denominacion(eje_tematico,modalidad,descripcion,factor,ejemplos) VALUES('$eje_tematico','$modalidad','$descripcion','$factor','$ejemplos')";

    $result=$link->query($sql);
    if (!$result)
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