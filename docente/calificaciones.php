<?php
include("../conexion.php");
include("../auth/proteger.php");

if($_SESSION['rol'] != 'docente'){
    die("Acceso denegado");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>PostEstudio - Calificaciones</title>
<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../assets/css/fontawesome.css">
<link rel="stylesheet" href="../assets/css/templatemo-grad-school.css">
<style>
  body {
    background: #172238;
    color: white;
  }
  .docente-container {
    margin-top: 120px;
    margin-bottom: 60px;
  }
  .docente-card {
    background: #0c1228;
    padding: 40px;
    border-radius: 10px;
  }
  .docente-card h2 {
    color: #fff;
    margin-bottom: 30px;
    border-left: 5px solid #00b4d8;
    padding-left: 20px;
  }
  .filters {
    margin-bottom: 30px;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 15px;
  }
  .filter-group {
    display: flex;
    flex-direction: column;
  }
  .filter-group label {
    color: #00b4d8;
    font-weight: bold;
    margin-bottom: 8px;
    font-size: 12px;
  }
  .filter-group select {
    background: #172238;
    border: 1px solid #00b4d8;
    color: white;
    padding: 10px;
    border-radius: 5px;
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
  .calificacion-input {
    background: #0c1228;
    border: 1px solid #00b4d8;
    color: white;
    padding: 8px 12px;
    border-radius: 4px;
    width: 80px;
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

<div class="container docente-container">
  <div class="docente-card">
    <h2><i class="fa fa-star"></i> Calificaciones de Estudiantes</h2>
    
    <div class="filters">
      <div class="filter-group">
        <label for="materia">Materia</label>
        <select id="materia">
          <option value="">Todas</option>
          <option value="matematicas">Matemáticas</option>
          <option value="lenguaje">Lenguaje</option>
          <option value="ciencias">Ciencias</option>
        </select>
      </div>
      <div class="filter-group">
        <label for="periodo">Período</label>
        <select id="periodo">
          <option value="">Todos</option>
          <option value="1">Período 1</option>
          <option value="2">Período 2</option>
          <option value="3">Período 3</option>
        </select>
      </div>
    </div>

    <div class="table-responsive">
      <table>
        <thead>
          <tr>
            <th>Estudiante</th>
            <th>Materia</th>
            <th>Actividades</th>
            <th>Tareas</th>
            <th>Examen</th>
            <th>Promedio</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Juan Pérez</td>
            <td>Matemáticas</td>
            <td><input type="number" class="calificacion-input" value="85"></td>
            <td><input type="number" class="calificacion-input" value="90"></td>
            <td><input type="number" class="calificacion-input" value="88"></td>
            <td>87.67</td>
            <td><button style="background: #00b4d8; color: white; border: none; padding: 5px 10px; border-radius: 4px;">Guardar</button></td>
          </tr>
          <tr>
            <td>María García</td>
            <td>Matemáticas</td>
            <td><input type="number" class="calificacion-input" value="92"></td>
            <td><input type="number" class="calificacion-input" value="95"></td>
            <td><input type="number" class="calificacion-input" value="91"></td>
            <td>92.67</td>
            <td><button style="background: #00b4d8; color: white; border: none; padding: 5px 10px; border-radius: 4px;">Guardar</button></td>
          </tr>
          <tr>
            <td>Carlos López</td>
            <td>Matemáticas</td>
            <td><input type="number" class="calificacion-input" value="78"></td>
            <td><input type="number" class="calificacion-input" value="82"></td>
            <td><input type="number" class="calificacion-input" value="80"></td>
            <td>80</td>
            <td><button style="background: #00b4d8; color: white; border: none; padding: 5px 10px; border-radius: 4px;">Guardar</button></td>
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