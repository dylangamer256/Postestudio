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
<title>PostEstudio - Mis Estudiantes</title>
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
  .search-box {
    margin-bottom: 30px;
  }
  .search-box input {
    background: #172238;
    border: 1px solid #00b4d8;
    color: white;
    padding: 12px 15px;
    border-radius: 5px;
    width: 100%;
  }
  .estudiantes-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 20px;
  }
  .estudiante-card {
    background: #172238;
    border-radius: 10px;
    padding: 20px;
    border-left: 4px solid #00b4d8;
    transition: 0.3s;
  }
  .estudiante-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0, 180, 216, 0.1);
  }
  .estudiante-avatar {
    width: 60px;
    height: 60px;
    background: rgba(0, 180, 216, 0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 15px;
    font-size: 30px;
  }
  .estudiante-nombre {
    color: #00b4d8;
    font-weight: bold;
    margin-bottom: 5px;
  }
  .estudiante-id {
    color: #888;
    font-size: 12px;
    margin-bottom: 15px;
  }
  .estudiante-info {
    color: #aaa;
    font-size: 12px;
    margin-bottom: 15px;
  }
  .estudiante-acciones {
    display: flex;
    gap: 10px;
  }
  .btn-accion {
    flex: 1;
    background: rgba(0, 180, 216, 0.2);
    border: 1px solid #00b4d8;
    color: #00b4d8;
    padding: 8px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 12px;
    transition: 0.3s;
    text-align: center;
  }
  .btn-accion:hover {
    background: #00b4d8;
    color: #172238;
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
    <h2><i class="fa fa-users"></i> Mis Estudiantes</h2>
    
    <div class="search-box">
      <input type="text" placeholder="Buscar estudiante por nombre o ID..." onkeyup="filtrarEstudiantes()">
    </div>

    <div class="estudiantes-grid">
      <div class="estudiante-card">
        <div class="estudiante-avatar">👤</div>
        <div class="estudiante-nombre">Juan Pérez</div>
        <div class="estudiante-id">ID: EST-001</div>
        <div class="estudiante-info">
          <strong>Materia:</strong> Matemáticas<br>
          <strong>Promedio:</strong> 87.5<br>
          <strong>Asistencia:</strong> 95%
        </div>
        <div class="estudiante-acciones">
          <button class="btn-accion">Ver perfil</button>
          <button class="btn-accion">Mensajes</button>
        </div>
      </div>

      <div class="estudiante-card">
        <div class="estudiante-avatar">👤</div>
        <div class="estudiante-nombre">María García</div>
        <div class="estudiante-id">ID: EST-002</div>
        <div class="estudiante-info">
          <strong>Materia:</strong> Matemáticas<br>
          <strong>Promedio:</strong> 92.0<br>
          <strong>Asistencia:</strong> 98%
        </div>
        <div class="estudiante-acciones">
          <button class="btn-accion">Ver perfil</button>
          <button class="btn-accion">Mensajes</button>
        </div>
      </div>

      <div class="estudiante-card">
        <div class="estudiante-avatar">👤</div>
        <div class="estudiante-nombre">Carlos López</div>
        <div class="estudiante-id">ID: EST-003</div>
        <div class="estudiante-info">
          <strong>Materia:</strong> Matemáticas<br>
          <strong>Promedio:</strong> 80.0<br>
          <strong>Asistencia:</strong> 90%
        </div>
        <div class="estudiante-acciones">
          <button class="btn-accion">Ver perfil</button>
          <button class="btn-accion">Mensajes</button>
        </div>
      </div>

      <div class="estudiante-card">
        <div class="estudiante-avatar">👤</div>
        <div class="estudiante-nombre">Ana Martínez</div>
        <div class="estudiante-id">ID: EST-004</div>
        <div class="estudiante-info">
          <strong>Materia:</strong> Matemáticas<br>
          <strong>Promedio:</strong> 85.5<br>
          <strong>Asistencia:</strong> 92%
        </div>
        <div class="estudiante-acciones">
          <button class="btn-accion">Ver perfil</button>
          <button class="btn-accion">Mensajes</button>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
function filtrarEstudiantes() {
  // Implementar lógica de búsqueda aquí
}
</script>

</body>
</html>


</div>

</body>

</html>