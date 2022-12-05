<?php
    include_once 'db.php';
    
    session_start();

    if(isset($_GET['cerrar_sesion'])){
        session_unset(); 

        // destroy the session 
        session_destroy(); 
    }
    
    if(isset($_SESSION['rol'])){
        switch($_SESSION['rol']){
            case 1:
                //ventana de tabla administrador 
                header('location: admin.php');
            break;

            case 2:
                 //ventana de formulario colaborador 
                header('location: ventas.php');
            break;

            default:
        }
    }

    if(isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $db = new Database();
        $query = $db->connect()->prepare('SELECT *FROM usuarios WHERE username = :username AND password = :password');
        $query->execute(['username' => $username, 'password' => $password]);

        $row = $query->fetch(PDO::FETCH_NUM);
        
        if($row == true){
            $rol = $row[3];
            
            $_SESSION['rol'] = $rol;
            switch($rol){
                case 1:
                    header('location: admin.php');
                break;

                case 2:
                header('location: ventas.php');
                break;

                default:
            }
        }else{
            // no existe el usuario
            //echo "Nombre de usuario o contraseña incorrecto";
            echo "<script languaje='JavaScript'>
                alert('Error, revisa tus datos');
                location.assign('index.php');
                </script>";
        }
        

    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="./assets/css/index.css">

</head>

<body>
    <form action="" method="POST">
        <h1>Login</h1>
        <div class="entradas">
            <label for="usuario">Usuario: </label>
            <input type="text" id="username" name="username" placeholder="Usuario">
            <label for="text">Contraseña:</label>
            <input type="text" id="password" name="password" placeholder="Contraseña">
            <input type="submit" value="Ingresar">
        </div>
    </form>
</body>

</html>