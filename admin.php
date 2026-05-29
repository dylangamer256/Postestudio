<?php
include("conexion.php");
include("auth/proteger.php");
?>
<?php
if($_SESSION['rol'] != 'administrador'){
    die("Acceso denegado");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>PostEstudio - Panel Administrador</title>
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/fontawesome.css">
<link rel="stylesheet" href="assets/css/templatemo-grad-school.css">
<style>
  body {
    background: #172238;
    color: white;
  }
  .admin-container {
    margin-top: 120px;
    margin-bottom: 60px;
  }
  .admin-card {
    background: #0c1228;
    padding: 40px;
    border-radius: 10px;
  }
  .admin-card h2 {
    color: #fff;
    margin-bottom: 30px;
    border-left: 5px solid #00b4d8;
    padding-left: 20px;
  }
  .stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
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
    font-size: 40px;
    color: #fff;
    font-weight: bold;
  }
  .admin-section {
    margin-top: 30px;
  }
  .admin-list {
    list-style: none;
    padding: 0;
  }
  .admin-list li {
    background: #172238;
    padding: 15px 20px;
    margin-bottom: 10px;
    border-radius: 8px;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
  .admin-list a {
    color: #00b4d8;
    text-decoration: none;
    padding: 8px 15px;
    background: rgba(0, 180, 216, 0.2);
    border-radius: 5px;
    font-size: 12px;
    font-weight: bold;
    transition: 0.3s;
  }
  .admin-list a:hover {
    background: #00b4d8;
    color: #172238;
  }
</style>
</head>
<body>

<header class="main-header clearfix">
  <div class="logo">
    <a href="index.php"><em>Post</em>Estudio</a>
  </div>
  <?php include("includes/menu.php"); ?>
</header>

<div class="container admin-container">
  <div class="admin-card">
    <h2><i class="fa fa-cogs"></i> Panel Administrativo</h2>
    
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

    <div class="admin-section">
      <h4 style="color: #00b4d8; margin-bottom: 20px;">Opciones de Administración</h4>
      <ul class="admin-list">
        <li>
          <span><i class="fa fa-users"></i> Gestión de Usuarios</span>
          <a href="admin/usuarios.php">Ver</a>
        </li>
        <li>
          <span><i class="fa fa-user-plus"></i> Crear Nuevo Usuario</span>
          <a href="admin/crear_usuario.php">Crear</a>
        </li>
        <li>
          <span><i class="fa fa-sliders"></i> Configuración del Sistema</span>
          <a href="admin/configuracion.php">Configurar</a>
        </li>
        <li>
          <span><i class="fa fa-database"></i> Respaldo de Base de Datos</span>
          <a href="admin/backup.php">Hacer Backup</a>
        </li>
      </ul>
    </div>
  </div>
</div>

</body>
</html>