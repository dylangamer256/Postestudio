<?php
include("../conexion.php");
include("../auth/proteger.php");

if($_SESSION['rol'] != 'padre'){
    die("Acceso denegado");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>PostEstudio - Seguimiento</title>
<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../assets/css/fontawesome.css">
<link rel="stylesheet" href="../assets/css/templatemo-grad-school.css">
<style>
  body {
    background: #172238;
    color: white;
  }
  .padre-container {
    margin-top: 120px;
    margin-bottom: 60px;
  }
  .padre-card {
    background: #0c1228;
    padding: 40px;
    border-radius: 10px;
  }
  .padre-card h2 {
    color: #fff;
    margin-bottom: 30px;
    border-left: 5px solid #00b4d8;
    padding-left: 20px;
  }
  .seguimiento-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    margin-bottom: 40px;
  }
  .seguimiento-box {
    background: #172238;
    padding: 25px;
    border-radius: 10px;
    border-left: 4px solid #00b4d8;
  }
  .seguimiento-box h4 {
    color: #00b4d8;
    margin-bottom: 10px;
    font-size: 12px;
    font-weight: bold;
    text-transform: uppercase;
  }
  .seguimiento-value {
    font-size: 32px;
    color: #fff;
    font-weight: bold;
  }
  .timeline {
    background: #172238;
    border-radius: 8px;
    padding: 20px;
  }
  .timeline-item {
    padding: 20px;
    border-left: 3px solid #00b4d8;
    margin-bottom: 20px;
    position: relative;
  }
  .timeline-item::before {
    content: '';
    position: absolute;
    left: -9px;
    top: 10px;
    width: 12px;
    height: 12px;
    background: #00b4d8;
    border-radius: 50%;
  }
  .timeline-date {
    color: #00b4d8;
    font-weight: bold;
    margin-bottom: 5px;
  }
  .timeline-text {
    color: #fff;
    margin-bottom: 5px;
  }
  .timeline-detail {
    color: #888;
    font-size: 12px;
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

<div class="container padre-container">
  <div class="padre-card">
    <h2><i class="fa fa-line-chart"></i> Seguimiento Académico</h2>
    
    <div class="seguimiento-grid">
      <div class="seguimiento-box">
        <h4>Asistencia General</h4>
        <div class="seguimiento-value">92%</div>
      </div>
      <div class="seguimiento-box">
        <h4>Promedio Actual</h4>
        <div class="seguimiento-value">86.3</div>
      </div>
      <div class="seguimiento-box">
        <h4>Tareas Entregadas</h4>
        <div class="seguimiento-value">28/30</div>
      </div>
      <div class="seguimiento-box">
        <h4>Materias Aprobadas</h4>
        <div class="seguimiento-value">4/4</div>
      </div>
    </div>

    <h3 style="color: #00b4d8; margin-top: 40px; margin-bottom: 20px;">Actividad Reciente</h3>
    
    <div class="timeline">
      <div class="timeline-item">
        <div class="timeline-date">Hoy, 14:30</div>
        <div class="timeline-text">Tarea entregada en Matemáticas</div>
        <div class="timeline-detail">Título: "Ejercicios de Álgebra Lineal" - Calificación pendiente</div>
      </div>

      <div class="timeline-item">
        <div class="timeline-date">Ayer, 11:00</div>
        <div class="timeline-text">Calificación recibida en Lenguaje</div>
        <div class="timeline-detail">Puntuación: 92/100 - Excelente desempeño</div>
      </div>

      <div class="timeline-item">
        <div class="timeline-date">hace 2 días, 15:45</div>
        <div class="timeline-text">Nueva tarea asignada en Ciencias</div>
        <div class="timeline-detail">Fecha de entrega: 30 de mayo de 2026</div>
      </div>

      <div class="timeline-item">
        <div class="timeline-date">hace 3 días, 09:20</div>
        <div class="timeline-text">Asistencia registrada</div>
        <div class="timeline-detail">Todas las clases del día completadas</div>
      </div>

      <div class="timeline-item">
        <div class="timeline-date">hace 1 semana, 13:00</div>
        <div class="timeline-text">Reunión con docente</div>
        <div class="timeline-detail">Tema: Progreso académico general - Resultados satisfactorios</div>
      </div>
    </div>
  </div>
</div>

</body>
</html>



</div>

</body>

</html>