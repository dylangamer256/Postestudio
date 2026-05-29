<?php
include("../conexion.php");
include("../auth/proteger.php");

$id_usuario = $_SESSION['id'];

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $id_tarea = $_POST['tarea'];
    $comentarios = $_POST['comentarios'];

    $archivo = $_FILES['archivo']['name'];
    $tmp = $_FILES['archivo']['tmp_name'];

    $nombreArchivo = time() . "_" . $archivo;

    $ruta = "../uploads/tareas/" . $nombreArchivo;

    move_uploaded_file($tmp, $ruta);

    $sql = "INSERT INTO entregas_tareas
    (id_tarea,id_estudiante,archivo,comentarios)
    VALUES
    ('$id_tarea','$id_usuario','$nombreArchivo','$comentarios')";

    if(mysqli_query($conn,$sql)){

        $mensaje = "Tarea enviada correctamente";

    }else{

        $mensaje = "Error al enviar tarea";

    }

}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>PostEstudio - Subir Tarea</title>

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
    margin:0 auto;
}

.form-card h2{
    color:#fff;
    margin-bottom:30px;
    border-left:5px solid #00b4d8;
    padding-left:20px;
}

.form-group label{
    color:#00b4d8;
    font-weight:bold;
    margin-top:15px;
}

.form-control{
    background:#172238;
    border:1px solid #00b4d8;
    color:white;
    padding:12px 15px;
    border-radius:5px;
}

.form-control:focus{
    background:#172238;
    color:white;
}

.file-upload-area{
    background:#172238;
    border:2px dashed #00b4d8;
    border-radius:8px;
    padding:30px;
    text-align:center;
    cursor:pointer;
    margin-top:10px;
}

.file-upload-area i{
    font-size:40px;
    color:#00b4d8;
    margin-bottom:10px;
    display:block;
}

.btn-submit{
    background:#00b4d8;
    color:white;
    border:none;
    padding:12px 30px;
    border-radius:5px;
    font-weight:bold;
    margin-top:20px;
    width:100%;
}

.btn-submit:hover{
    background:#0096d6;
}

.btn-cancel{
    background:#555;
    color:white;
    border:none;
    padding:12px 30px;
    border-radius:5px;
    text-decoration:none;
    display:inline-block;
    margin-top:10px;
    width:100%;
    text-align:center;
}

.file-input{
    display:none;
}

.alert-custom{
    background:#28a745;
    padding:15px;
    border-radius:5px;
    margin-bottom:20px;
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
<i class="fa fa-upload"></i>
Enviar Tarea
</h2>

<?php if(isset($mensaje)){ ?>

<div class="alert-custom">
<?php echo $mensaje; ?>
</div>

<?php } ?>

<form method="POST" enctype="multipart/form-data">

<div class="form-group">

<label>Seleccionar Tarea</label>

<select class="form-control" name="tarea" required>

<option value="">
-- Seleccione una tarea --
</option>

<?php

$sqlTareas = "SELECT * FROM tareas ORDER BY fecha_entrega ASC";

$resultadoTareas = mysqli_query($conn,$sqlTareas);

while($tarea = mysqli_fetch_assoc($resultadoTareas)){

?>

<option value="<?php echo $tarea['id']; ?>">

<?php echo $tarea['titulo']; ?>
-
<?php echo $tarea['materia']; ?>

</option>

<?php } ?>

</select>

</div>

<div class="form-group">

<label>Archivo de Entrega</label>

<div class="file-upload-area"
onclick="document.getElementById('archivo').click()">

<i class="fa fa-cloud-upload"></i>

<p>Haz clic aquí o arrastra tu archivo</p>

<p style="font-size:12px;color:#777;">
Máximo 50MB
</p>

</div>

<input
type="file"
class="file-input"
id="archivo"
name="archivo"
required
onchange="updateFileName()">

<small
id="file-name"
style="color:#00b4d8;margin-top:10px;display:block;">
</small>

</div>

<div class="form-group">

<label>Comentarios</label>

<textarea
class="form-control"
name="comentarios"
placeholder="Añade comentarios...">
</textarea>

</div>

<button type="submit" class="btn-submit">

<i class="fa fa-check"></i>

Enviar Tarea

</button>

<a href="../tareas.php" class="btn-cancel">

<i class="fa fa-times"></i>

Cancelar

</a>

</form>

</div>

</div>

<script>

function updateFileName(){

const fileInput =
document.getElementById('archivo');

const fileName =
document.getElementById('file-name');

if(fileInput.files && fileInput.files[0]){

fileName.textContent =
'Archivo seleccionado: '
+ fileInput.files[0].name;

}

}

</script>

</body>
</html>