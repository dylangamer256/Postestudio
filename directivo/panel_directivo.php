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
<title>PostEstudio - Panel Directivo</title>
<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../assets/css/fontawesome.css">
<link rel="stylesheet" href="../assets/css/templatemo-grad-school.css">
<style>
  body {
    background: #172238;
    color: white;
  }
  .directivo-container {
    margin-top: 120px;
    margin-bottom: 60px;
  }
  .directivo-card {
    background: #0c1228;
    padding: 40px;
    border-radius: 10px;
  }
  .directivo-card h2 {
    color: #fff;
    margin-bottom: 30px;
    border-left: 5px solid #00b4d8;
    padding-left: 20px;
  }
  .quick-links {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    margin-bottom: 40px;
  }
  .link-box {
    background: #172238;
    padding: 25px;
    border-radius: 10px;
    text-align: center;
    border-left: 4px solid #00b4d8;
    transition: 0.3s;
    cursor: pointer;
  }
  .link-box:hover {
    transform: translateY(-5px);
    background: rgba(0, 180, 216, 0.1);
  }
  .link-box i {
    font-size: 40px;
    color: #00b4d8;
    margin-bottom: 15px;
    display: block;
  }
  .link-box h4 {
    color: #fff;
    margin-bottom: 10px;
  }
  .link-box p {
    color: #aaa;
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

<div class="container directivo-container">
  <div class="directivo-card">
    <h2><i class="fa fa-dashboard"></i> Panel Directivo</h2>
    
    <div class="quick-links">
      <div class="link-box" onclick="window.location.href='estadisticas.php'">
        <i class="fa fa-bar-chart"></i>
        <h4>Estadísticas</h4>
        <p>Ver análisis del desempeño académico</p>
      </div>
      <div class="link-box" onclick="window.location.href='supervision.php'">
        <i class="fa fa-eye"></i>
        <h4>Supervisión</h4>
        <p>Monitorear actividades del sistema</p>
      </div>
      <div class="link-box" onclick="window.location.href='../reportes.php'">
        <i class="fa fa-file-pdf"></i>
        <h4>Reportes</h4>
        <p>Generar reportes de la institución</p>
      </div>
      <div class="link-box" onclick="window.location.href='../materias.php'">
        <i class="fa fa-book"></i>
        <h4>Materias</h4>
        <p>Gestionar asignaturas disponibles</p>
      </div>
    </div>
  </div>
</div>

</body>
</html>

<h1>Panel Directivo</h1>

<p>Sección en desarrollo...</p>

</div>

</body>

</html>