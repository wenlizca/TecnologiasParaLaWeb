<?php
include_once('php/conexion.php');

$database = new Connection();
$db = $database->open();


$idConstancia=$_GET['id'];

//intento la acción, si si entra entonces elimina, sino me va a mostrar el error
try{ 
    $sql="DELETE FROM constancia WHERE id=$idConstancia";
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