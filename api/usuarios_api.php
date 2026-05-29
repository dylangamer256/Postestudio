<?php
include("../conexion.php");
session_start();

// CREAR USUARIO
if($_REQUEST['accion'] == 'crear'){
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $rol = $_POST['rol'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO usuarios (nombre, correo, rol, password) 
            VALUES ('$nombre', '$email', '$rol', '$password')";
    
    if(mysqli_query($conn, $sql)){
        echo json_encode(['exito' => true, 'mensaje' => 'Usuario creado exitosamente']);
    } else {
        echo json_encode(['exito' => false, 'error' => mysqli_error($conn)]);
    }
}

// OBTENER USUARIOS
if($_REQUEST['accion'] == 'obtener_todos'){
    $sql = "SELECT id, nombre, correo, rol, DATE_FORMAT(fecha_creacion, '%d/%m/%Y') as fecha_creacion FROM usuarios";
    $resultado = mysqli_query($conn, $sql);
    $usuarios = [];
    
    while($fila = mysqli_fetch_assoc($resultado)){
        $usuarios[] = $fila;
    }
    
    echo json_encode($usuarios);
}

// OBTENER USUARIO POR ID
if($_REQUEST['accion'] == 'obtener_uno'){
    $id = $_POST['id'];
    $sql = "SELECT * FROM usuarios WHERE id='$id'";
    $resultado = mysqli_query($conn, $sql);
    $usuario = mysqli_fetch_assoc($resultado);
    
    echo json_encode($usuario);
}

// ACTUALIZAR USUARIO
if($_REQUEST['accion'] == 'actualizar'){
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $rol = $_POST['rol'];
    
    $sql = "UPDATE usuarios SET nombre='$nombre', correo='$email', rol='$rol' WHERE id='$id'";
    
    if(mysqli_query($conn, $sql)){
        echo json_encode(['exito' => true, 'mensaje' => 'Usuario actualizado exitosamente']);
    } else {
        echo json_encode(['exito' => false, 'error' => mysqli_error($conn)]);
    }
}

// ELIMINAR USUARIO
if($_REQUEST['accion'] == 'eliminar'){
    $id = $_POST['id'];
    
    $sql = "DELETE FROM usuarios WHERE id='$id'";
    
    if(mysqli_query($conn, $sql)){
        echo json_encode(['exito' => true, 'mensaje' => 'Usuario eliminado exitosamente']);
    } else {
        echo json_encode(['exito' => false, 'error' => mysqli_error($conn)]);
    }
}

// OBTENER PERFIL DEL USUARIO LOGUEADO
if($_REQUEST['accion'] == 'obtener_perfil'){
    $correo = $_SESSION['usuario'];
    $sql = "SELECT * FROM usuarios WHERE correo='$correo'";
    $resultado = mysqli_query($conn, $sql);
    $usuario = mysqli_fetch_assoc($resultado);
    
    echo json_encode($usuario);
}

// ACTUALIZAR PERFIL
if($_REQUEST['accion'] == 'actualizar_perfil'){
    $correo = $_SESSION['usuario'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    if(!empty($password)){
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE usuarios SET nombre='$nombre', correo='$email', password='$password' WHERE correo='$correo'";
    } else {
        $sql = "UPDATE usuarios SET nombre='$nombre', correo='$email' WHERE correo='$correo'";
    }
    
    if(mysqli_query($conn, $sql)){
        $_SESSION['nombre'] = $nombre;
        $_SESSION['usuario'] = $email;
        echo json_encode(['exito' => true, 'mensaje' => 'Perfil actualizado exitosamente']);
    } else {
        echo json_encode(['exito' => false, 'error' => mysqli_error($conn)]);
    }
}

?>
