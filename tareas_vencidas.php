<?php
include("conexion.php");
include("auth/proteger.php");

$sql = "SELECT * FROM tareas
WHERE estado='vencida'
ORDER BY fecha_entrega ASC";

$resultado = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">
<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Tareas Vencidas</title>

<link href="vendor/bootstrap/css/bootstrap.min.css"
rel="stylesheet">

<link rel="stylesheet"
href="assets/css/fontawesome.css">

<link rel="stylesheet"
href="assets/css/templatemo-grad-school.css">

<style>

body{
    background:#172238;
    color:white;
}

.container-box{
    margin-top:120px;
    background:white;
    color:black;
    padding:30px;
    border-radius:10px;
}

.badge-danger-custom{
    background:#dc3545;
    color:white;
    padding:8px 15px;
    border-radius:20px;
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

<div class="container">

<div class="container-box">

<h2 class="mb-4">
Tareas Vencidas
</h2>

<table class="table table-striped">

<thead>

<tr>

<th>Materia</th>
<th>Tarea</th>
<th>Fecha entrega</th>
<th>Estado</th>

</tr>

</thead>

<tbody>

<?php while($fila = mysqli_fetch_assoc($resultado)){ ?>

<tr>

<td>
<?php echo $fila['materia']; ?>
</td>

<td>
<?php echo $fila['titulo']; ?>
</td>

<td>
<?php echo date("d/m/Y",
strtotime($fila['fecha_entrega'])); ?>
</td>

<td>

<span class="badge-danger-custom">
Vencida
</span>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

</body>

</html>