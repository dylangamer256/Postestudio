<?php
include("conexion.php");
include("auth/proteger.php");

$sql = "SELECT * FROM usuarios WHERE rol='docente'";
$resultado = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Docentes</title>

<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/fontawesome.css">
<link rel="stylesheet" href="assets/css/templatemo-grad-school.css">

<style>

body{
    background:#172238;
    color:white;
}

.container-box{
    margin-top:120px;
    margin-bottom:60px;
}

.docente-card{
    background:#0c1228;
    padding:25px;
    border-radius:15px;
    margin-bottom:20px;
}

.docente-card h4{
    color:#00b4d8;
}

</style>

</head>

<body>

<header class="main-header clearfix">

<div class="logo">
<a href="index.php"><em>Post</em>Estudio</a>
</div>

<?php include("includes/menu.php"); ?>

</header>

<div class="container container-box">

<h1 class="mb-4">
👨‍🏫 Docentes
</h1>

<?php while($fila = mysqli_fetch_assoc($resultado)){ ?>

<div class="docente-card">

<h4>
<?php echo $fila['nombre']; ?>
</h4>

<p>
📧 <?php echo $fila['correo']; ?>
</p>

<p>
Rol:
<?php echo $fila['rol']; ?>
</p>

</div>

<?php } ?>

</div>

</body>
</html>