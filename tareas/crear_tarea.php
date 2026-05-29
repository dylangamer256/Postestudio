<?php
include("../conexion.php");
include("../auth/proteger.php");

if($_SESSION['rol'] != 'docente'){
    die("Acceso denegado");
}

$mensaje = "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $titulo = mysqli_real_escape_string($conn,$_POST['titulo']);
    $materia = mysqli_real_escape_string($conn,$_POST['materia']);
    $descripcion = mysqli_real_escape_string($conn,$_POST['descripcion']);
    $fecha_entrega = $_POST['fecha_entrega'];

    $archivo_nombre = "";

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

    $sql = "INSERT INTO tareas
    (titulo,materia,descripcion,fecha_entrega,archivo,estado)
    VALUES
    ('$titulo','$materia','$descripcion','$fecha_entrega','$archivo_nombre','pendiente')";

    if(mysqli_query($conn,$sql)){
        $mensaje = "Tarea creada correctamente";
    }else{
        $mensaje = "Error al crear tarea";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>Crear Tarea</title>

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

.form-control{
    background:#172238;
    border:1px solid #00b4d8;
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

<h2>Crear Tarea</h2>

<?php if($mensaje != ""){ ?>
<div class="alert alert-info">
<?php echo $mensaje; ?>
</div>
<?php } ?>

<form method="POST" enctype="multipart/form-data">

<div class="form-group">
<label>Título</label>
<input type="text" name="titulo" class="form-control" required>
</div>

<div class="form-group">
<label>Materia</label>
<input type="text" name="materia" class="form-control" required>
</div>

<div class="form-group">
<label>Descripción</label>
<textarea name="descripcion" class="form-control"></textarea>
</div>

<div class="form-group">
<label>Fecha entrega</label>
<input type="date" name="fecha_entrega" class="form-control" required>
</div>

<div class="form-group">
<label>Archivo</label>
<input type="file" name="archivo" class="form-control">
</div>

<button type="submit" class="btn btn-submit">
Crear tarea
</button>

</form>

</div>
</div>

</body>
</html>