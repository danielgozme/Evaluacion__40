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

// Verificar si se ha enviado un formulario para agregar un nuevo usuario
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
        // Realizar la consulta de inserción
        $query = "INSERT INTO Usuario (Rut, Nombre, Apellido_P, Apellido_M, Direccion, Telefono, Clave, perfil_id) VALUES ('$Rut', '$Nombre', '$Apellido_P', '$Apellido_M', '$Direccion', '$Telefono','$Clave','$perfil_id')";
        $resultado = $conexion->Ejecuta($query);

        if ($resultado) {
            echo "<h2>El usuario ha sido agregado correctamente.</h2>";
        } else {
            echo "Error al agregar el Usuario.";
        }
        
    } else {
        echo "Faltan datos requeridos para agregar el Usuario.";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/Estilo.css">
    <title>Agregar Usuario</title>
    <style>
        body {
            background-image: url('IMG/Panel.jpg');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>

<body class=id>
    <h1 class=title>Agregar Usuario</h1>
    <form style="text-align: center;" action="agregar.php" method="post">
        <label for="Rut">Rut:</label>
        <input type="text" name="Rut">
        <br><br>
        <label for="Nombre">Nombre:</label>
        <input type="text" name="Nombre">
        <br><br>
        <label for="Apellido_P">Apellido Paterno:</label>
        <input type="text" name="Apellido_P">
        <br><br>
        <label for="Apellido_M">Apellido Materno:</label>
        <input type="text" name="Apellido_M">
        <br><br>
        <label for="Direccion">Dirección:</label>
        <input type="text" name="Direccion">
        <br><br>
        <label for="Telefono">Teléfono:</label>
        <input type="text" name="Telefono">
        <br><br>
        <label for="Clave">Clave:</label>
        <input type="password" name="Clave">
        <br><br>
        <label for="perfil_id">Perfil:</label>
        <input type="text" name="perfil_id">
        <br><br>
        <input type="submit" value="Agregar">
    </form>
    <br><br>
    <ul>
    <ul><a href='/Prueba40/Panel.php'>Volver al Incio</a></ul>
    <BR></BR>
    <ul><a href='/Prueba40/Index.php'>Salir al LOGIN</a></ul>
    </ul>
    <br>

</body>
<footer>
   <p>&copy; Daniel Gozme /  Danny Quezada / Brandon Alexander</p> 

</footer>


</html>




