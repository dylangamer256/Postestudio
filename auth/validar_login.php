<?php

session_start();

include("../conexion.php");

$correo = $_POST['correo'];
$password = $_POST['password'];

$sql = "SELECT * FROM usuarios 
WHERE correo='$correo'";

$resultado = mysqli_query($conn,$sql);

if(mysqli_num_rows($resultado) > 0){

   $usuario = mysqli_fetch_assoc($resultado);
   
   // Verificar contraseña con password_verify si está hasheada
   if(password_verify($password, $usuario['password']) || $usuario['password'] == $password){
       $_SESSION['usuario'] = $usuario['correo'];
       $_SESSION['rol'] = $usuario['rol'];
       $_SESSION['nombre'] = $usuario['nombre'];
       $_SESSION['id'] = $usuario['id'];
       
       header("Location: ../index.php");
   } else {
       echo "
       <script>
       alert('Correo o contraseña incorrectos');
       window.location='../login.php';
       </script>
       ";
   }

}else{

    echo "
    <script>
    alert('Correo o contraseña incorrectos');
    window.location='../login.php';
    </script>
    ";

}

?>