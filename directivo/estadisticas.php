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
<title>PostEstudio - Estadísticas</title>
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
  .stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
    margin-bottom: 40px;
  }
  .stat-box {
    background: #172238;
    padding: 25px;
    border-radius: 10px;
    text-align: center;
    border-left: 4px solid #00b4d8;
  }
  .stat-box h4 {
    color: #00b4d8;
    margin-bottom: 10px;
    font-size: 12px;
    font-weight: bold;
    text-transform: uppercase;
  }
  .stat-box .number {
    font-size: 35px;
    color: #fff;
    font-weight: bold;
  }
  .table-responsive {
    background: #172238;
    border-radius: 8px;
    padding: 20px;
    overflow-x: auto;
  }
  table {
    color: white;
    width: 100%;
  }
  table th {
    color: #00b4d8;
    border-bottom: 2px solid #00b4d8;
    padding: 15px;
  }
  table td {
    padding: 12px 15px;
    border-bottom: 1px solid rgba(255,255,255,0.1);
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
    <h2><i class="fa fa-bar-chart"></i> Estadísticas del Sistema</h2>
    
    <div class="stats-grid">
      <div class="stat-box">
        <h4>Total Usuarios</h4>
        <div class="number">45</div>
      </div>
      <div class="stat-box">
        <h4>Docentes</h4>
        <div class="number">12</div>
      </div>
      <div class="stat-box">
        <h4>Estudiantes</h4>
        <div class="number">28</div>
      </div>
      <div class="stat-box">
        <h4>Tareas Activas</h4>
        <div class="number">15</div>
      </div>
    </div>

    <h3 style="color: #00b4d8; margin-top: 40px; margin-bottom: 20px;">Desempeño por Materia</h3>
    <div class="table-responsive">
      <table>
        <thead>
          <tr>
            <th>Materia</th>
            <th>Estudiantes</th>
            <th>Promedio</th>
            <th>Tasa Entrega</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Matemáticas</td>
            <td>28</td>
            <td>85%</td>
            <td>92%</td>
          </tr>
          <tr>
            <td>Lenguaje</td>
            <td>28</td>
            <td>88%</td>
            <td>95%</td>
          </tr>
          <tr>
            <td>Ciencias</td>
            <td>28</td>
            <td>82%</td>
            <td>88%</td>
          </tr>
          <tr>
            <td>Historia</td>
            <td>28</td>
            <td>86%</td>
            <td>91%</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

</body>
</html>