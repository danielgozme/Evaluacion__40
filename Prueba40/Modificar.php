<?php
// Iniciamos la sesión
session_start();

require("CLASS/Conexion.php");

// Validar el inicio de sesión
if (!isset($_SESSION['Rut'])) {
    // Redireccionar al formulario de inicio de sesión si no hay sesión activa
    header('Location: Index.php');
    exit();
}

// Verificar si se ha enviado un formulario para modificar un usuario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si los datos requeridos están presentes en la solicitud POST
    if (isset($_POST["Rut"]) && isset($_POST["Nombre"]) && isset($_POST["Apellido_P"]) && isset($_POST["Apellido_M"]) && isset($_POST["Direccion"]) && isset($_POST["Telefono"]) && isset($_POST["Clave"]) && isset($_POST["perfil_id"])) {
        $Rut = $_POST['Rut'];
        $Nombre = $_POST['Nombre'];
        $Apellido_P = $_POST['Apellido_P'];
        $Apellido_M = $_POST['Apellido_M'];
        $Direccion = $_POST['Direccion'];
        $Telefono = $_POST['Telefono'];
        $Clave = $_POST['Clave'];
        $perfil_id = $_POST['perfil_id'];

        

        // Crear una instancia de la clase Conexion
        $conexion = new Conexion();
        $conexion->Conecta();

        // Realizar la consulta de actualización
        $query = "UPDATE Usuario SET Nombre = '$Nombre', Apellido_P = '$Apellido_P', Apellido_M = '$Apellido_M', Direccion = '$Direccion', Telefono = '$Telefono', Clave = '$Clave', perfil_id = '$perfil_id' WHERE Rut = '$Rut'";
        $resultado = $conexion->Ejecuta($query);

        if ($resultado) {
            echo "<h2>Usuario Modificado Correctamente</h2>";
        } else {
            echo "Error al modificar el usuario.";
        }
        } else {
            echo "Faltan datos requeridos para modificar el usuario.";
        }
} 
elseif ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Verificar si se ha enviado el parámetro de rut en la URL
    if (isset($_GET["Rut"])) {
        $Rut = $_GET["Rut"];

        // Crear una instancia de la clase Conexion
        $conexion = new Conexion();
        $conexion->Conecta();

        

        // Realizar la consulta para obtener los datos del usuario
        $query = "SELECT * FROM Usuario WHERE Rut = '$Rut'";
        $resultado = $conexion->Ejecuta($query);

        if ($resultado->num_rows >=0) {
            // Obtener los datos del usuario
            $row = $resultado->fetch_assoc();
            $Nombre = $row['Nombre'];
            $Apellido_P = $row['Apellido_P'];
            $Apellido_M = $row['Apellido_M'];
            $Direccion = $row['Direccion'];
            $Telefono = $row['Telefono'];
            $Clave = $row['Clave'];
            $perfil_id = $row['perfil_id'];
        } else {
            // No se encontró el usuario
            echo "Usuario no Encontrado";
            exit();
        }
    } else {
        echo "Falta el parámetro de rut en la URL.";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/Estilo.css">

</head>

<body class=id>
<div class="container">
    <h1>Modificar Usuario</h1>
    <form action="Modificar.php" method="post">
        <label for="Rut">Rut:</label>
        <input type="text" name="Rut" value="<?php echo $Rut; ?>">
        <BR></BR>
        <label for="Nombre">Nombres:</label>
        <input type="text" name="Nombre" value="<?php echo $Nombre; ?>">
        <BR></BR>
        <label for="Apellido_P">Apellido Paterno:</label>
        <input type="text" name="Apellido_P" value="<?php echo $Apellido_P; ?>">
        <BR></BR>
        <label for="Apellido_M">Apellido Materno:</label>
        <input type="text" name="Apellido_M" value="<?php echo $Apellido_M; ?>">
        <BR></BR>
        <label for="Direccion">Dirección:</label>
        <input type="text" name="Direccion" value="<?php echo $Direccion; ?>">
        <BR></BR>
        <label for="Telefono">Teléfono:</label>
        <input type="text" name="Telefono" value="<?php echo $Telefono; ?>">
        <BR></BR>
        <label for="Clave">Clave:</label>
        <input type="password" name="Clave" value="<?php echo $Clave; ?>">
        <BR></BR>
        <label for="perfil_id">perfil_id:</label>
        <input type="text" name="perfil_id" value="<?php echo $perfil_id; ?>">
        <BR></BR>
        <input type="submit" value="Guardar cambios">
    </form>
    <br>
    <p>¿Qué desea realizar?</p>


    <ul>
    <ul><a href='/Prueba40/Panel.php'>Volver al Incio</a></ul>
    <BR></BR>
    <ul><a href='/Prueba40/Index.php'>Salir al LOGIN</a></ul>
    </ul>
    <br>
    <footer>
   <p>&copy; Daniel Gozme  /  Danny Quezada / Brandon Alexander</p> 

</footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</div>
</body>

</html>