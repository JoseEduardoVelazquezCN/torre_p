<?php
    include 'conf.php';
    session_start();

    if(!isset($_SESSION['rol'])){
        header('location: index.php');
    }else{
        if($_SESSION['rol'] != 1){
            header('location: index.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <link rel="stylesheet" href="admin.css">
</head>
<body>


    <form action="insert.php" method="post">
        <h1>ADMINISTRADOR</h1>
        <br>
        <h3>Ingresar Datos de Venta</h3>
        <br>
        <label for="no">No.</label>
        <input type="number" id="no" name="no">

        <label for="producto">Producto</label>
        <input type="text" id="producto" name="producto">

        <label for="Cantidad">Cantidad</label>
        <input type="number" id="Cantidad" name="Cantidad">

        <label for="pu">Precio Unitario</label>
        <input type="number" id="pu" name="pu">

        <label for="total">Total</label>
        <input type="number" id="total" name="total">

        <label for="totalP">Total Productos</label>
        <input type="number" id="totalP" name="totalP">

        <label for="totalV">Total Venta</label>
        <input type="number" id="totalV" name="totalV">

        <input type="submit" value="Ingresar" class="button">
    </form>

    <form action="closeSesion.php" class="exit">
        <input type="submit" value="Salir" >
    </form>
</body>
</html>