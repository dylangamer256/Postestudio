<?php
include("conexion.php");
include("auth/proteger.php");

/*
========================
CONTADORES
========================
*/

$total =
mysqli_num_rows(
mysqli_query($conn,
"SELECT * FROM tareas")
);

$pendientes =
mysqli_num_rows(
mysqli_query($conn,
"SELECT * FROM tareas
WHERE estado='activa'")
);

$vencidas =
mysqli_num_rows(
mysqli_query($conn,
"SELECT * FROM tareas
WHERE estado='vencida'")
);

?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">
<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Dashboard - PostEstudio</title>

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

.dashboard{
    margin-top:120px;
    margin-bottom:60px;
}

.card-box{
    background:#0c1228;
    padding:30px;
    border-radius:15px;
    text-align:center;
    margin-bottom:30px;
    transition:0.3s;
}

.card-box:hover{
    transform:translateY(-5px);
}

.card-box h2{
    color:#00b4d8;
    font-size:50px;
}

.card-box p{
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

<div class="container dashboard">

<div class="row">

<div class="col-md-4">

<div class="card-box">

<h2>
<?php echo $total; ?>
</h2>

<p>Tareas Totales</p>

</div>

</div>

<div class="col-md-4">

<div class="card-box">

<h2>
<?php echo $pendientes; ?>
</h2>

<p>Tareas Pendientes</p>

</div>

</div>

<div class="col-md-4">

<div class="card-box">

<h2>
<?php echo $vencidas; ?>
</h2>

<p>Tareas Vencidas</p>

</div>

</div>

</div>

</div>

</body>

</html>