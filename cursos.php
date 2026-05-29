<?php
include("conexion.php");
include("auth/proteger.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Cursos</title>

<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/fontawesome.css">
<link rel="stylesheet" href="assets/css/templatemo-grad-school.css">

<style>

</style>
</head>

<body>

<header class="main-header clearfix">
  <div class="logo">
    <a href="index.php"><em>Post</em>Estudio</a>
  </div>
  <?php include("includes/menu.php"); ?>
</header>
<div class="container">
  <div class="card-custom">
    <h2 class="title">🎓 Cursos</h2>

    <p>Curso de programación web</p>
    <p>Curso de matemáticas básicas</p>
  </div>
</div>

</body>
</html>