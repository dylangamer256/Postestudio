<?php
include("../conexion.php");
include("../auth/proteger.php");

if($_SESSION['rol'] != 'directivo'){
    die("Acceso denegado");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>PostEstudio - Supervisión</title>
<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../assets/css/fontawesome.css">
<link rel="stylesheet" href="../assets/css/templatemo-grad-school.css">
<style>
  body {
    background: #172238;
    color: white;
  }
  .supervision-container {
    margin-top: 120px;
    margin-bottom: 60px;
  }
  .supervision-card {
    background: #0c1228;
    padding: 40px;
    border-radius: 10px;
  }
  .supervision-card h2 {
    color: #fff;
    margin-bottom: 30px;
    border-left: 5px solid #00b4d8;
    padding-left: 20px;
  }
  .activity-log {
    background: #172238;
    border-radius: 8px;
    padding: 20px;
  }
  .activity-item {
    padding: 15px;
    border-bottom: 1px solid rgba(255,255,255,0.1);
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
  .activity-item:last-child {
    border-bottom: none;
  }
  .activity-icon {
    color: #00b4d8;
    font-size: 20px;
    margin-right: 15px;
  }
  .activity-info {
    flex: 1;
  }
  .activity-title {
    color: #fff;
    font-weight: bold;
    margin-bottom: 5px;
  }
  .activity-time {
    color: #888;
    font-size: 12px;
  }
  .status-badge {
    background: #00b4d8;
    color: #172238;
    padding: 5px 10px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: bold;
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

<div class="container supervision-container">
  <div class="supervision-card">
    <h2><i class="fa fa-eye"></i> Supervisión del Sistema</h2>
    
    <div class="activity-log">
      <div class="activity-item">
        <i class="fa fa-user activity-icon"></i>
        <div class="activity-info">
          <div class="activity-title">Nuevo usuario registrado</div>
          <div class="activity-time">hace 2 horas</div>
        </div>
        <span class="status-badge">Completado</span>
      </div>

      <div class="activity-item">
        <i class="fa fa-file activity-icon"></i>
        <div class="activity-info">
          <div class="activity-title">Tarea enviada por estudiante</div>
          <div class="activity-time">hace 1 hora</div>
        </div>
        <span class="status-badge">Completado</span>
      </div>

      <div class="activity-item">
        <i class="fa fa-check activity-icon"></i>
        <div class="activity-info">
          <div class="activity-title">Calificación asignada</div>
          <div class="activity-time">hace 30 minutos</div>
        </div>
        <span class="status-badge">Completado</span>
      </div>

      <div class="activity-item">
        <i class="fa fa-pencil activity-icon"></i>
        <div class="activity-info">
          <div class="activity-title">Tarea modificada por docente</div>
          <div class="activity-time">hace 15 minutos</div>
        </div>
        <span class="status-badge">Completado</span>
      </div>

      <div class="activity-item">
        <i class="fa fa-envelope activity-icon"></i>
        <div class="activity-info">
          <div class="activity-title">Mensaje enviado</div>
          <div class="activity-time">hace 5 minutos</div>
        </div>
        <span class="status-badge">Completado</span>
      </div>
    </div>
  </div>
</div>

</body>
</html>

<h1>👥 Supervisión</h1>

<p>Sección en desarrollo...</p>

</div>

</body>

</html>