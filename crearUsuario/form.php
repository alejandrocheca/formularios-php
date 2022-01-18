<?php
session_start();

class usuarios{
    function crearUsuario($nombre,$apellidos, $correo,$contrasena){ 
        require('db/conexion.php');
        $sql= "INSERT INTO usuarios(nombre,apellidos,fecha_nacimiento,correo, contrasena) VALUES('".$nombre."',' ".$apellidos."',
             '".$fecha_nacimiento."','".$correo."','".$contrasena."')";
              if($conn->query($sql)===true){
               echo "Cuenta creada con exito";
                  header("location: index.php?opcion=iniciarsesion");
              }else{
                echo "Error al crear la cuenta. Inténtelo otra vez";
              }
      }
}

$sql = "SELECT * FROM usuarios;";
if(isset($_POST["registrarse"])){
	$nuevoUsuario = new crearUsuario($_POST["nombre"],$_POST["apellidos"], $_POST["correo"],$_POST["contrasena"]); 
}

if($cantidad = $conn->query($sql)){
	$cantidad = $cantidad->num_rows;
}else{
	echo "Error en la consulta";
}
?>