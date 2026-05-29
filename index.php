<?php
include("conexion.php");
include("auth/proteger.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>PostEstudio - Inicio</title>
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/fontawesome.css">
<link rel="stylesheet" href="assets/css/templatemo-grad-school.css">
</head>
<body>

<header class="main-header clearfix">
  <div class="logo">
    <a href="index.php"><em>Post</em>Estudio</a>
  </div>
  <?php include("includes/menu.php"); ?>
</header>

<section class="main-banner">
  <video autoplay muted loop id="bg-video">
    <source src="assets/images/course-video.mp4" type="video/mp4" />
  </video>
  <div class="video-overlay header-text">
    <div class="caption">
      
      <h6>Sistema de Gestión Académica</h6>

      <h2><em>Post</em>Estudio</h2>
      <div class="main-button">
        <a href="tareas.php">Ver mis tareas</a>
      </div>
    </div>
  </div>
</section>

<section class="features">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="features-post">
          <div class="features-content">
            <h4><i class="fa fa-book"></i>Consultar Tareas</h4>
            <p>Revisa todas tus tareas fácilmente.</p>
            <a href="tareas.php">Ir a tareas</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="features-post">
          <div class="features-content">
            <h4><i class="fa fa-upload"></i>Entregar Tarea</h4>
            <p>Sube tus trabajos.</p>
            <a href="tareas.php">Subir</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="features-post">
          <div class="features-content">
            <h4><i class="fa fa-comments"></i>Mensajería</h4>
            <p>Comunícate fácilmente.</p>
            <a href="mensajes.php">Ir a mensajes</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<footer>
  <div class="container text-center">
    <p>© 2024 PostEstudio - Gestión Educativa</p>
  </div>
</footer>

</body>
</html>