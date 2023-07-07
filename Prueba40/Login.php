<?php
    include "CLASS/Autenticar.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Verificar si los datos están presentes en la solicitud POST
        if (isset($_POST["Rut"]) && isset($_POST["Clave"])) {
            $Rut = $_POST["Rut"];
            $Clave = $_POST["Clave"];

            // Aquí puedes realizar las operaciones necesarias con los datos recibidos

            // Ejemplo de uso en la clase Autenticar
            $autenticador = new Autenticar($Rut, $Clave);
            $autenticador->Validar();
        } else {
            // Los datos no están presentes en la solicitud POST
            echo "Faltan los datos requeridos.";
        }
    } else {
        // La solicitud no se realizó utilizando el método POST
        echo "Método de solicitud no válido.";
    }

    ?>