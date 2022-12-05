<?php 
    include_once("conf.php");

    $no = $_POST["no"];
    $producto = $_POST["producto"];
    $Cantidad = $_POST["Cantidad"];
    $pu = $_POST["pu"];
    $total = $_POST["total"];
    $totalP = $_POST["totalP"];
    $totalV = $_POST["totalV"];

    $insert = "INSERT INTO consultas(no, producto, cantidad, PU, total, total_productos, total_venta) 
                    VALUES ('$no','$producto','$Cantidad','$pu','$total','$totalP','$totalV')";

    $resultado = mysqli_query($con, $insert);

    if($resultado){
        echo "<script>alert('Ingreso de datos exitoso'); window.location='./admin.php' </script>" ;
    }
    else{
        echo "<script>alert('Erro: Ingreso de datos Fallo'); window.location='./admin.php' </script>" ;
    }

?>
