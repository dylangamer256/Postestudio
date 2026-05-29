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

$mensaje = "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $titulo = mysqli_real_escape_string($conn,$_POST['titulo']);
    $materia = mysqli_real_escape_string($conn,$_POST['materia']);
    $descripcion = mysqli_real_escape_string($conn,$_POST['descripcion']);
    $fecha_entrega = $_POST['fecha_entrega'];

    $archivo_nombre = $tarea['archivo'];

    if(isset($_FILES['archivo']) && $_FILES['archivo']['error'] == 0){

        $carpeta = "../uploads/tareas/";

        if(!is_dir($carpeta)){
            mkdir($carpeta,0777,true);
        }

        $archivo_nombre = time() . "_" . $_FILES['archivo']['name'];

        move_uploaded_file(
            $_FILES['archivo']['tmp_name'],
            $carpeta . $archivo_nombre
        );
    }

    $update = "UPDATE tareas SET
    titulo='$titulo',
    materia='$materia',
    descripcion='$descripcion',
    fecha_entrega='$fecha_entrega',
    archivo='$archivo_nombre'
    WHERE id='$id'";

    if(mysqli_query($conn,$update)){

        header("Location: ../tareas.php");

    }else{

        $mensaje = "Error al actualizar";

    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Editar Tarea</title>

<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../assets/css/fontawesome.css">
<link rel="stylesheet" href="../assets/css/templatemo-grad-school.css">

<style>

body{
    background:#172238;
    color:white;
}

.form-container{
    margin-top:120px;
    margin-bottom:60px;
}

.form-card{
    background:#0c1228;
    padding:40px;
    border-radius:10px;
    max-width:700px;
    margin:auto;
}

.form-card h2{
    margin-bottom:30px;
    border-left:5px solid #00b4d8;
    padding-left:20px;
}

.form-control{
    background:#172238;
    border:1px solid #00b4d8;
    color:white;
}

.form-control:focus{
    background:#172238;
    color:white;
}

.btn-submit{
    background:#00b4d8;
    color:white;
    width:100%;
    margin-top:20px;
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

<div class="container form-container">

<div class="form-card">

<h2>
<i class="fa fa-edit"></i>
Editar Tarea
</h2>

<?php if($mensaje != ""){ ?>

<div class="alert alert-danger">
<?php echo $mensaje; ?>
</div>

<?php } ?>

<form method="POST" enctype="multipart/form-data">

<div class="form-group">

<label>Título</label>

<input
type="text"
name="titulo"
class="form-control"
value="<?php echo $tarea['titulo']; ?>"
required>

</div>

<div class="form-group">

<label>Materia</label>

<input
type="text"
name="materia"
class="form-control"
value="<?php echo $tarea['materia']; ?>"
required>

</div>

<div class="form-group">

<label>Descripción</label>

<textarea
name="descripcion"
class="form-control"
required><?php echo $tarea['descripcion']; ?></textarea>

</div>

<div class="form-group">

<label>Fecha entrega</label>

<input
type="date"
name="fecha_entrega"
class="form-control"
value="<?php echo $tarea['fecha_entrega']; ?>"
required>

</div>

<div class="form-group">

<label>Nuevo archivo</label>

<input
type="file"
name="archivo"
class="form-control">

</div>

<?php if($tarea['archivo'] != ""){ ?>

<p>

Archivo actual:

<a
href="../uploads/tareas/<?php echo $tarea['archivo']; ?>"
target="_blank">

<?php echo $tarea['archivo']; ?>

</a>

</p>

<?php } ?>

<button type="submit" class="btn btn-submit">

<i class="fa fa-save"></i>
Actualizar tarea

</button>

</form>

</div>
</div>

</body>
</html>

