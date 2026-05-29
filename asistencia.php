<?php
include("conexion.php");
include("auth/proteger.php");

if($_SESSION['rol'] != 'docente' ){
    die("Acceso denegado");
}

$sql = "SELECT * FROM usuarios WHERE rol='estudiante'";
$resultado = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Asistencia</title>

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

.card-box{
    background:#0c1228;
    padding:30px;
    border-radius:15px;
}

.table{
    color:white;
}

.btn-asistencia{
    background:#00b4d8;
    color:white;
    border:none;
    padding:8px 15px;
    border-radius:5px;
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

<div class="card-box">

<h2 class="mb-4">
📅 Control de Asistencia
</h2>

<table class="table">

<thead>
<tr>
<th>Estudiante</th>
<th>Correo</th>
<th>Estado</th>
</tr>
</thead>

<tbody>

<?php while($fila = mysqli_fetch_assoc($resultado)){ ?>

<tr>

<td>
<?php echo $fila['nombre']; ?>
</td>

<td>
<?php echo $fila['correo']; ?>
</td>

<td>

<button class="btn-asistencia">
Presente
</button>

<button class="btn btn-danger">
Ausente
</button>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

</body>
</html>