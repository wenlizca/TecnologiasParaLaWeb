<?php
include_once('php/conexion.php');

$database = new Connection();
$db = $database->open();


$id = (isset($_POST['id'])) ? $_POST['id'] : '';

$eje_tematico=$_GET['editareje'];
$modalidad=$_GET['editarmodalidad'];
$descripcion=$_GET['editradescripcion'];
$factor=$_GET['editrafactor'];
$ejemplos=$_GET['editraejemplos'];


//intento la acción, si si entra entonces elimina, sino me va a mostrar el error
try{ 
    
    //$sql=$link->query("SELECT * FROM denominacion WHERE id=$idDenominacion");
    $sql=$link->query("UPDATE denominacion SET actividad='$eje_tematico', fecha_inicio='$modalidad', fecha_fin='$descripcion', horas='$factor', archivo='$ejemplos' WHERE id='$id' ";

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