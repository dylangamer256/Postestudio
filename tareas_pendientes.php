<?php
include("conexion.php");
include("auth/proteger.php");

$sql = "SELECT * FROM tareas
WHERE estado='activa'
ORDER BY fecha_entrega ASC";

$resultado = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">
<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Tareas Pendientes</title>

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

.page-heading{
    padding-top:120px;
    padding-bottom:40px;
    text-align:center;
}

.table-container{
    background:white;
    padding:30px;
    border-radius:10px;
    color:black;
}

.badge-pending{
    background:#ffc107;
    color:black;
    padding:8px 12px;
    border-radius:20px;
}

.btn-custom{
    background:#00b4d8;
    color:white;
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

<section class="page-heading">

<h2>Tareas Pendientes</h2>

</section>

<div class="container mb-5">

<div class="table-container">

<table class="table table-hover">

<thead>

<tr>

<th>Materia</th>
<th>Tarea</th>
<th>Fecha</th>
<th>Estado</th>
<th>Acción</th>

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

<span class="badge-pending">
Pendiente
</span>

</td>

<td>

<?php if($_SESSION['rol'] == 'estudiante'){ ?>

<button class="btn btn-custom">
Entregar
</button>

<?php } ?>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

</body>

</html>