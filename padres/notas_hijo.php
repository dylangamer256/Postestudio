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
<title>PostEstudio - Notas del Hijo</title>
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
  .info-estudiante {
    background: #172238;
    padding: 20px;
    border-radius: 8px;
    margin-bottom: 30px;
    border-left: 4px solid #00b4d8;
  }
  .info-row {
    display: flex;
    justify-content: space-between;
    padding: 8px 0;
  }
  .info-label {
    color: #00b4d8;
    font-weight: bold;
  }
  .info-valor {
    color: #fff;
  }
  .calificaciones-table {
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
  .badge-aprobado {
    background: #2ecc71;
    color: white;
    padding: 5px 10px;
    border-radius: 20px;
    font-size: 12px;
  }
  .badge-regular {
    background: #f39c12;
    color: white;
    padding: 5px 10px;
    border-radius: 20px;
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
    <h2><i class="fa fa-graduation-cap"></i> Notas de mi Hijo</h2>
    
    <div class="info-estudiante">
      <div class="info-row">
        <span class="info-label">Estudiante:</span>
        <span class="info-valor">Juan Pérez García</span>
      </div>
      <div class="info-row">
        <span class="info-label">Grado:</span>
        <span class="info-valor">10° A</span>
      </div>
      <div class="info-row">
        <span class="info-label">Período Académico:</span>
        <span class="info-valor">2024-2025</span>
      </div>
    </div>

    <h3 style="color: #00b4d8; margin-top: 30px; margin-bottom: 20px;">Calificaciones por Materia</h3>
    
    <div class="calificaciones-table">
      <table>
        <thead>
          <tr>
            <th>Materia</th>
            <th>Actividades</th>
            <th>Tareas</th>
            <th>Examen</th>
            <th>Promedio</th>
            <th>Estado</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Matemáticas</td>
            <td>85</td>
            <td>90</td>
            <td>88</td>
            <td><strong>87.7</strong></td>
            <td><span class="badge-aprobado">Aprobado</span></td>
          </tr>
          <tr>
            <td>Lenguaje</td>
            <td>88</td>
            <td>92</td>
            <td>90</td>
            <td><strong>90</strong></td>
            <td><span class="badge-aprobado">Aprobado</span></td>
          </tr>
          <tr>
            <td>Ciencias</td>
            <td>78</td>
            <td>82</td>
            <td>80</td>
            <td><strong>80</strong></td>
            <td><span class="badge-regular">Regular</span></td>
          </tr>
          <tr>
            <td>Historia</td>
            <td>86</td>
            <td>89</td>
            <td>87</td>
            <td><strong>87.3</strong></td>
            <td><span class="badge-aprobado">Aprobado</span></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

</body>
</html>



</div>

</body>

</html>