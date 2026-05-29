<?php
include("conexion.php");
include("auth/proteger.php");

$totalUsuarios =
mysqli_num_rows(
mysqli_query($conn,"SELECT * FROM usuarios")
);

$totalTareas =
mysqli_num_rows(
mysqli_query($conn,"SELECT * FROM tareas")
);

$totalMensajes =
mysqli_num_rows(
mysqli_query($conn,"SELECT * FROM mensajes")
);

?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Reportes</title>

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

.report-card{
    background:#0c1228;
    padding:30px;
    border-radius:15px;
    text-align:center;
    margin-bottom:30px;
}

.report-card h2{
    color:#00b4d8;
    font-size:50px;
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

<h1 class="mb-5">
📊 Reportes del Sistema
</h1>

<div class="row">

<div class="col-md-4">

<div class="report-card">

<h2>
<?php echo $totalUsuarios; ?>
</h2>

<p>
Usuarios registrados
</p>

</div>

</div>

<div class="col-md-4">

<div class="report-card">

<h2>
<?php echo $totalTareas; ?>
</h2>

<p>
Tareas creadas
</p>

</div>

</div>

<div class="col-md-4">

<div class="report-card">

<h2>
<?php echo $totalMensajes; ?>
</h2>

<p>
Mensajes enviados
</p>

</div>

</div>

</div>

</div>

</body>
</html>