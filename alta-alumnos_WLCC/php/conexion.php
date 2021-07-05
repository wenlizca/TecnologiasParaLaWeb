<?php
    $servidor   ="localhost";
    $usuario    ="root";
    $clave      ="";
    $basedatos  ="electivas";
    $puerto		="3308";

    $conexion = mysqli_connect($servidor,$usuario,$clave,$basedatos, $puerto);

    mysqli_set_charset($conexion,"utf8");
?>
