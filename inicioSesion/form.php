<?php
session_start();

class usuarios{
    function comprobarUsuario($correo, $contrasena){         
        require('db/conexion.php');
               $sql= "SELECT correo, contrasena FROM usuarios WHERE correo LIKE '".$correo."' AND contrasena LIKE '".$contrasena."';";
                $comprobar = $conn->query($sql);
                if($comprobar){
                  $comprobar = $comprobar->num_rows;
                    if($comprobar == 1){
                        
                        session_start();
                        $_SESSION["usuario"]["correo"] = $correo;
                        $_SESSION["usuario"]["sesion_iniciada"]=true;
                        header('Location: index.php');
                    }else{
                        echo "Contraseña y/o correo incorrectos";
                    }
                }else{
                  echo "Error en la sentencia.";
                }    
    }
}
if(isset($_POST["correo"])) {
    
    $inicio = new Usuario();
    $inicio->comprobarUsuario($_POST["correo"], $_POST["password"]);

?>