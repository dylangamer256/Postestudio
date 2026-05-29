<?php
include("../conexion.php");
include("../auth/proteger.php");

if($_SESSION['rol'] != 'docente'){
    die("Acceso denegado");
}

if(!isset($_GET['id'])){
    die("ID no especificado");
}

$id = $_GET['id'];

$sql = "SELECT * FROM tareas WHERE id='$id'";
$resultado = mysqli_query($conn,$sql);

$tarea = mysqli_fetch_assoc($resultado);

if(!$tarea){
    die("Tarea no encontrada");
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $delete = "DELETE FROM tareas WHERE id='$id'";

    mysqli_query($conn,$delete);

    header("Location: ../tareas.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">

<title>Eliminar Tarea</title>

<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../assets/css/fontawesome.css">
<link rel="stylesheet" href="../assets/css/templatemo-grad-school.css">

<style>

body{
    background:#172238;
    color:white;
}

.container-msg{
    margin-top:120px;
}

.msg-card{
    background:#0c1228;
    padding:40px;
    border-radius:10px;
    max-width:600px;
    margin:auto;
    text-align:center;
}

.btn-confirm{
    background:#dc3545;
    color:white;
    margin:10px;
}

.btn-cancel{
    background:#555;
    color:white;
    margin:10px;
}

</style>
</head>

<body>

<header class="main-header clearfix">

<div class="logo">
<a href="../index.php"><em>Post</em>Estudio</a>
</div>

<?php include("../includes/menu.php"); ?>

</header>

<div class="container container-msg">

<div class="msg-card">

<h2>
<i class="fa fa-trash"></i>
Eliminar tarea
</h2>

<p>

¿Deseas eliminar la tarea?

<br><br>

<strong>
<?php echo $tarea['titulo']; ?>
</strong>

</p>

<form method="POST">

<button type="submit" class="btn btn-confirm">

Sí, eliminar

</button>

<a href="../tareas.php" class="btn btn-cancel">

Cancelar

</a>

</form>

</div>
</div>

</body>
</html>

