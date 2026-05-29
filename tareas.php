<?php
include("conexion.php");
include("auth/proteger.php");

/*
========================
CONSULTA DE TAREAS
========================
*/

$sql = "SELECT * FROM tareas
ORDER BY fecha_entrega ASC";

$resultado = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="utf-8">
<meta name="viewport"
content="width=device-width, initial-scale=1">

<title>PostEstudio - Mis Tareas</title>

<link href="vendor/bootstrap/css/bootstrap.min.css"
rel="stylesheet">

<link rel="stylesheet"
href="assets/css/fontawesome.css">

<link rel="stylesheet"
href="assets/css/templatemo-grad-school.css">

<style>

body{
    background:#172238;
}

.tareas-container{
    margin-top:120px;
    margin-bottom:60px;
}

.tareas-card{
    background:#0c1228;
    padding:40px;
    border-radius:10px;
}

.tareas-card h2{
    color:#fff;
    margin-bottom:30px;
    border-left:5px solid #00b4d8;
    padding-left:20px;
}

.tabla-tareas{
    width:100%;
    color:#fff;
    border-collapse:collapse;
}

.tabla-tareas th,
.tabla-tareas td{
    padding:15px;
    text-align:left;
    border-bottom:1px solid rgba(255,255,255,0.1);
}

.tabla-tareas th{
    color:#00b4d8;
    font-weight:700;
}

.estado-activa{
    background:#e67e22;
    padding:6px 14px;
    border-radius:20px;
    font-size:12px;
    font-weight:bold;
}

.estado-completada{
    background:#2ecc71;
    padding:6px 14px;
    border-radius:20px;
    font-size:12px;
    font-weight:bold;
}

.estado-vencida{
    background:#e74c3c;
    padding:6px 14px;
    border-radius:20px;
    font-size:12px;
    font-weight:bold;
}

.btn-subir{
    background:#00b4d8;
    color:#fff;
    padding:8px 15px;
    border-radius:5px;
    text-decoration:none;
    border:none;
    font-size:12px;
    cursor:pointer;
}

.btn-subir:hover{
    background:#0077b6;
}

.form-control{
    background:#fff;
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

<!-- INPUT OCULTO -->

<input type="file"
id="fileInput"
hidden>

<div class="container tareas-container">

<div class="tareas-card">

<h2>
<i class="fa fa-tasks"></i>
Mis Tareas
</h2>

<!-- BUSCADOR -->

<div class="mb-4">

<input type="text"
id="buscador"
class="form-control"
placeholder="Buscar tarea..."
onkeyup="filtrarTareas()">

</div>

<!-- TABLA -->

<table class="tabla-tareas"
id="tablaTareas">

<thead>

<tr>

<th>Materia</th>
<th>Tarea</th>
<th>Fecha entrega</th>
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

<?php
echo date(
"d/m/Y",
strtotime($fila['fecha_entrega'])
);
?>

</td>

<td>

<?php

if($fila['estado'] == 'activa'){

echo '<span class="estado-activa">
Pendiente
</span>';

}

elseif($fila['estado'] == 'completada'){

echo '<span class="estado-completada">
Entregado
</span>';

}

elseif($fila['estado'] == 'vencida'){

echo '<span class="estado-vencida">
Vencida
</span>';

}

?>

</td>

<td>

<!-- SOLO ESTUDIANTE -->

<?php if($_SESSION['rol'] == 'estudiante'){ ?>

<button class="btn-subir"
onclick="subirTarea()">

Subir

</button>

<?php } ?>

<!-- SOLO DOCENTE -->

<?php if($_SESSION['rol'] == 'docente'){ ?>

<a href="tareas/editar_tarea.php?id=<?php echo $fila['id']; ?>"
class="btn-subir">

Editar

</a>

<a href="tareas/eliminar_tarea.php?id=<?php echo $fila['id']; ?>"
class="btn-subir"
style="background:#e74c3c;">

Eliminar

</a>

<?php } ?>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

<footer>

<div class="container text-center">

<p>
© 2026 PostEstudio - Gestión Educativa
</p>

</div>

</footer>

<script>

/*
========================
BUSCADOR
========================
*/

function filtrarTareas(){

let input =
document.getElementById("buscador");

let filtro =
input.value.toLowerCase();

let tabla =
document.getElementById("tablaTareas");

let tr =
tabla.getElementsByTagName("tr");

for(let i = 1; i < tr.length; i++){

let texto =
tr[i].textContent.toLowerCase();

if(texto.indexOf(filtro) > -1){

tr[i].style.display = "";

}else{

tr[i].style.display = "none";

}

}

}

/*
========================
SUBIDA VISUAL
========================
*/

function subirTarea(){

document.getElementById("fileInput").click();

}

</script>

</body>

</html>