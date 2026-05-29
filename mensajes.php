<?php
include("conexion.php");
include("auth/proteger.php");

$sql = "SELECT * FROM mensajes ORDER BY fecha DESC";
$resultado = mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>PostEstudio - Mensajes</title>

<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/fontawesome.css">
<link rel="stylesheet" href="assets/css/templatemo-grad-school.css">

<style>

body{
    background:#172238;
    color:white;
}

.mensajes-container{
    margin-top:120px;
    margin-bottom:60px;
}

.mensajes-card{
    background:#0c1228;
    padding:40px;
    border-radius:10px;
}

.mensajes-card h2{
    color:#fff;
    margin-bottom:30px;
    border-left:5px solid #00b4d8;
    padding-left:20px;
}

.mensaje-item{
    background:#172238;
    padding:20px;
    border-radius:10px;
    margin-bottom:20px;
    transition:0.3s;
}

.mensaje-item:hover{
    transform:translateX(5px);
}

.mensaje-header{
    display:flex;
    justify-content:space-between;
    margin-bottom:10px;
    flex-wrap:wrap;
}

.remitente{
    color:#00b4d8;
    font-weight:bold;
}

.fecha{
    color:#888;
    font-size:12px;
}

.asunto{
    font-weight:bold;
    margin-bottom:8px;
    color:white;
    font-size:18px;
}

.mensaje-preview{
    color:#ccc;
    font-size:14px;
}

.btn-nuevo{
    background:#00b4d8;
    color:#fff;
    padding:12px 25px;
    border-radius:5px;
    text-decoration:none;
    display:inline-block;
    margin-top:20px;
    transition:0.3s;
}

.btn-nuevo:hover{
    background:#0077b6;
    color:white;
}

.sin-mensajes{
    text-align:center;
    color:#aaa;
    padding:40px;
}

</style>

</head>

<body>

<header class="main-header clearfix">

<div class="logo">
<a href="index.php">
<em>Post</em>Estudio
</a>
</div>

<?php include("includes/menu.php"); ?>

</header>

<div class="container mensajes-container">

<div class="mensajes-card">

<h2>
<i class="fa fa-envelope"></i>
Bandeja de entrada
</h2>

<?php
if(mysqli_num_rows($resultado) > 0){

while($mensaje = mysqli_fetch_assoc($resultado)){
?>

<div class="mensaje-item">

<div class="mensaje-header">

<span class="remitente">
<i class="fa fa-user"></i>

<?php echo $mensaje['remitente']; ?>
</span>

<span class="fecha">

<?php echo date("d/m/Y H:i", strtotime($mensaje['fecha'])); ?>

</span>

</div>

<div class="asunto">

<?php echo $mensaje['asunto']; ?>

</div>

<div class="mensaje-preview">

<?php echo $mensaje['mensaje']; ?>

</div>

</div>

<?php
}
}else{
?>

<div class="sin-mensajes">

<h4>No hay mensajes disponibles</h4>

<p>
Todavía no existen mensajes en la base de datos.
</p>

</div>

<?php } ?>

<?php if(
$_SESSION['rol'] == 'docente' ||
$_SESSION['rol'] == 'administrador'
){ ?>

<a href="crear_mensaje.php" class="btn-nuevo">

<i class="fa fa-plus"></i>
Nuevo mensaje

</a>

<?php } ?>

</div>
</div>

<footer>

<div class="container text-center">

<p>
© 2024 PostEstudio - Gestión Educativa
</p>

</div>

</footer>

</body>
</html>