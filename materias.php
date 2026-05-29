<?php
include("conexion.php");
include("auth/proteger.php");

$sql = "SELECT * FROM materias";
$resultado = mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Materias</title>

<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/fontawesome.css">
<link rel="stylesheet" href="assets/css/templatemo-grad-school.css">

<style>

body{
    background:#172238;
    color:white;
}

.materias-container{
    margin-top:120px;
    margin-bottom:60px;
}

.materias-card{
    background:#0c1228;
    padding:40px;
    border-radius:10px;
}

.materia-item{
    background:#172238;
    margin-bottom:20px;
    padding:20px;
    border-radius:10px;
}

.progress{
    height:10px;
    background:#2d3a5e;
}

.progress-bar{
    background:#00b4d8;
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

<div class="container materias-container">

<div class="materias-card">

<h2>Mis Materias</h2>

<?php while($materia = mysqli_fetch_assoc($resultado)){ ?>

<div class="materia-item">

<h4>
<?php echo $materia['nombre']; ?>
</h4>

<p>
<?php echo $materia['docente']; ?>
-
<?php echo $materia['creditos']; ?> créditos
</p>

<div class="progress mb-2">
<div class="progress-bar"
style="width: <?php echo $materia['progreso']; ?>%">
</div>
</div>

<p>
<?php echo $materia['progreso']; ?>% completado
</p>

</div>

<?php } ?>

</div>
</div>

</body>
</html>