<?php
//Iniciamos la session
session_start();

require("CLASS/Conexion.php");


// Validar el inicio de sesión
if (!isset($_SESSION['Rut'])) {
    // Redirigir al formulario de inicio de sesión si no hay sesión activa
    header('Location: Index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QPromotor - Panel de Administración</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/Estilo.css">
    <style>
        body {
            background-image: url('IMG/Panel.jpg');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>

<body class=id>
<h1 class=title>ESTAS EN EL PANEL DEL ADMINISTRADOR</h1>
    <p>Esta es una página protegida que solo puede ser accedida después de iniciar sesión.</p>  
    

    <?php



    // Crear una instancia de la clase Conexion
    $conexion = new Conexion();
    $conexion->Conecta();

    $consulta = "SELECT * FROM Usuario";

    $resultado = $conexion->Ejecuta($consulta);  // es una funcion

    // Verificar si hay registros en el resultado
    if ($resultado->num_rows > 0) {
        // Recorrer los registros con un bucle while
        while ($row = $resultado->fetch_assoc()) {
            // Acceder a los datos de cada registro
            $Rut = $row['Rut'];
            $Nombre = $row['Nombre'];
            $Apellido_P = $row['Apellido_P'];
            $Apellido_M = $row['Apellido_M'];
            $Direccion = $row['Direccion'];
            $Telefono = $row['Telefono'];
            $Clave = $row['Clave'];
            $perfil_id = $row['perfil_id'];

            // Imprimir los datos
            echo "RUT: " . $Rut . "<br>";
            echo "Nombres: " . $Nombre . "<br>";
            echo "Apellido Paterno: " . $Apellido_P . "<br>";
            echo "Apellido Materno: " . $Apellido_P . "<br>";
            echo "Dirección: " . $Direccion . "<br>";
            echo "Teléfono: " . $Telefono . "<br>";
            echo "Clave: " . $Clave  . "<br>";
            echo "Perfil-- Admi = 1  // User = 2 :  " . $perfil_id . "<br>";
            echo "<br>";
        }
    } else {
        // Si no hay registros, mostrar un mensaje
        echo "No se encontraron registros en la base de datos.";
    }

    $color = "greenyellow";
    $tamanioFuente = "30px";
    $estilo = "font-weight: bold;";

    echo "<p style='color: $color; font-size: $tamanioFuente; $estilo'>POR SER ADMI PUEDE HACER LO SIGUIENTE.</p>";
    echo "<p> (Agregar, Modificar, Eliminar)</p>";

    // Propiedades y métodos existentes...

    
    /*echo "<ul>";
    echo "<ul><a href='Agregar.php'>Agregar</a></ul>";
    echo "<ul><a href='Eliminar.php'>Eliminar</a></ul>";
    echo "</ul>";*/

    ?>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
<ul>
    <ul><a href="Agregar.php">Agregar</a></ul>
    <ul><a href="Eliminar.php">Eliminar</a></ul>
    <ul><a href="Modificar.php?Rut=<?php echo urlencode($Rut); ?>">Modificar</a></ul>
    <BR></BR>
    <BR></BR>

    <ul><a href='/Prueba40/Index.php'>Salir al LOGIN</a></ul>
    </ul>
<footer>
   <p>&copy; Daniel Gozme  /  Danny Quezada / Brandon Alexander</p> 

</footer>
</html>