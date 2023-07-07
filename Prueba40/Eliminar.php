
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

// Verificar si se ha enviado un formulario para eliminar un usuario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si el rut del usuario a eliminar está presente en la solicitud POST
    if (isset($_POST["Rut"])) {
        $Rut = $_POST["Rut"];

        // Crear una instancia de la clase Conexion
        $conexion = new Conexion();
        $conexion->Conecta();

        // Realizar la consulta de eliminación
        $query = "DELETE FROM Usuario WHERE Rut = '$Rut'";
        $resultado = $conexion->Ejecuta($query);

        if ($resultado) {
            echo "<h2>El usuario ha sido eliminado correctamente.</h2>";
        } else {
            echo "Error al eliminar el usuario.";
        }
    } else {
        echo "Falta el rut del usuario a eliminar.";
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
    <title>Eliminar Usuario</title>
    <style>
        body {
            background-image: url('IMG/Panel.jpg');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>

<body class=id>
    <h1>Eliminar Usuario</h1>
    <form action="eliminar.php" method="post">
        <label for="Rut">Rut:</label>
        <input type="text" name="Rut">
        <input type="submit" value="Eliminar">
    </form>
    <br></br>
    <br></br>
    <br></br>
    <p></p>

<ul>
    <ul><a href='/Prueba40/Panel.php'>Volver al Incio</a></ul>
    <BR></BR>
    <ul><a href='/Prueba40/Index.php'>Salir al LOGIN</a></ul>
    </ul>
    <br>


</body>

<br></br>
<br></br>
<br></br>
<br></br>
<footer>
<footer>
   <p>&copy; Daniel Gozme Cuellar /  Danny Quezada / Brandon Alexander</p> 

</footer>

</footer>

</html>