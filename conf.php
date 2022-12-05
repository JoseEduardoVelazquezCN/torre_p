<?php
    $Host = "sql200.epizy.com";
    $user = "epiz_33134373";
    $pass = "qyQvY2s06QXxX1";
    $db = "epiz_33134373_prueba";

    $con = new mysqli($Host,$user,$pass,$db);
    if($con->connect_error)
        die("Fallo la conexion: " .$con->$connect_error)
    
?>