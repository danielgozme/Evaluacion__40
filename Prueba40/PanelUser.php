<?php
//Iniciamos la session
session_start();

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

</head>

<body class=id>
    <h1>Bienvenido al Panel de Usuario</h1>
    <p>Esta es una página protegida que solo puede ser accedida después de iniciar sesión.</p>

    <!-- Aquí puedes agregar contenido adicional según tus necesidades -->
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/js/bootstrap.bundle.min.js"></script>

  <ul>
    <BR></BR>
    <ul><a href='/Prueba40/Index.php'>Salir al LOGIN</a></ul>
    </ul>
    
</body>

<footer>
   <p>&copy; Daniel Gozme  /  Danny Quezada / Brandon Alexander</p> 
</footer>
</html>







