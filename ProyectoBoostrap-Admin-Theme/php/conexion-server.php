<?php

    $servidor   ="sql213.byethost16.com";   //hostname
    $usuario    ="b16_28920494";            //nombre de usuario en el servidor
    $clave      ="wcarrilloc";              //tu contraseña del servidor
    $basedatos  ="b16_28920494_electivas";  //nombre de la base de datos en el servidor

    $conexion = mysqli_connect($servidor,$usuario,$clave,$basedatos); //mandamos conectar la base de datos
    
    mysqli_set_charset($conexion,"utf8"); //indico que la base de datos contiene datos como acentos, dieresis, etc.
?>