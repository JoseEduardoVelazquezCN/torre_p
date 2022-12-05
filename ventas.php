<?php
    include 'conf.php';
    session_start();

    if(!isset($_SESSION['rol'])){
        header('location: index.php');
    }else{
        if($_SESSION['rol'] != 2){
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
    <title>Ventas</title>

    <link rel="stylesheet" href="./assets/css/ventas.css">
</head>

<body>
    <h1>Consulta de Ventas</h1>
    <div class="buscar">
        <form action="" method="get">
            <label for="busqueda">Folio de venta</label>
            <input type="text" name="busqueda" id="busqueda">
            <input type="submit" name="enviar" value="Consultar" class="button">
        </form>
        <br>
        <h1>Listado de productos</h1>
        <?php 
        $inc = include_once("conf.php");
        ?>

        <table role="table" id="table" class="table table-hover">
                <thead role="rowgroup">
                    <tr role="row">
                        <th role="columnheader">#</th>
                        <th role="columnheader">Producto</th>
                        <th role="columnheader">cantidad</th>
                        <th role="columnheader">Precio Unitario</th>
                        <th role="columnheader">total</th>
                    </tr>
                </thead>

        <?php 
         include_once 'db.php';
        
            if(isset($_GET['enviar'])){
   
                $busqueda = $_GET['busqueda'];
                $consulta = "SELECT * FROM consultas WHERE Folio LIKE '%$busqueda'";
                $resultado = mysqli_query($con, $consulta);

                while($row = $resultado -> fetch_array()){
                    $no = $row['no'];
                    $producto = $row['producto'];
                    $cantidad = $row['cantidad'];
                    $PU = $row['PU'];
                    $total = $row['total'];
                    $total_productos = $row['total_productos'];
                    $total_venta = $row['total_venta'];

                    
                }
                
                
               
            }
            else{
                echo "Folio no encontrado";
            }
        
        
        ?>

        <tbody role="rowgroup">
                    <tr role="row">
                        <td role="cell"><?php echo $no;?></th>
                        <td role="cell"><?php echo $producto;?></th>
                        <td role="cell"><?php echo $cantidad;?></td>
                        <td role="cell"><?php echo $PU;?></td>
                        <td role="cell"><?php echo $total;?></td>
                    </tr>
        </tbody>
        
        <?php  
                
        ?>
        </table>
        <br>
  
       <label>Total de productos: <?php echo $total_productos;?></label>
            <label >Total de ventas: <?php echo $total_venta;?></label> 
                <br>
                
            <form action="closeSesion.php" class="exit">
                <input type="submit" value="Salir" >
            </form> 
    </div>

          

   
</body>

</html>