<?php
/*Creacion de Clase Autenticar*/
require ("CLASS/Conexion.php");
session_start();
Class Autenticar{
    private $Rut;
    private $Clave;
    

    public function __construct($Rut,$Clave){
        $this->Rut = $Rut;
        $this->Clave = $Clave;
    }

    public function Validar(){
        $conexion = new Conexion();
        $conexion->Conecta();
        
        $consulta = "SELECT * FROM Usuario WHERE Rut = '$this->Rut' AND Clave = '$this->Clave'";
        
        $resultado = $conexion->Ejecuta($consulta);

        if ($resultado->num_rows == 1) {
           
            $data = $resultado->fetch_assoc();
            $perfil = $data['perfil_id'];

            if($perfil == 1){
                $_SESSION["Rut"] = $this->Rut;
                header('Location: Panel.php');
            }else{
                $_SESSION["Rut"] = $this->Rut;
                header('Location: PanelUser.php');
            }
        } else {
            header('Location: Index.php');
        }

    }

}


?>