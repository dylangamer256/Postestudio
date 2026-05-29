<?php
include("../conexion.php");
include("../auth/proteger.php");

if($_SESSION['rol'] != 'administrador'){
    die("Acceso denegado");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>PostEstudio - Configuración</title>
<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../assets/css/fontawesome.css">
<link rel="stylesheet" href="../assets/css/templatemo-grad-school.css">
<style>
  body {
    background: #172238;
    color: white;
  }
  .config-container {
    margin-top: 120px;
    margin-bottom: 60px;
  }
  .config-card {
    background: #0c1228;
    padding: 40px;
    border-radius: 10px;
  }
  .config-card h2 {
    color: #fff;
    margin-bottom: 30px;
    border-left: 5px solid #00b4d8;
    padding-left: 20px;
  }
  .config-section {
    background: #172238;
    padding: 20px;
    border-radius: 8px;
    margin-bottom: 30px;
    border-left: 4px solid #00b4d8;
  }
  .config-section h3 {
    color: #00b4d8;
    margin-bottom: 20px;
    font-size: 16px;
  }
  .config-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px;
    border-bottom: 1px solid rgba(255,255,255,0.1);
  }
  .config-item:last-child {
    border-bottom: none;
  }
  .config-label {
    color: #fff;
    font-weight: bold;
  }
  .config-value {
    color: #aaa;
    font-size: 12px;
  }
  .btn-config {
    background: rgba(0, 180, 216, 0.2);
    border: 1px solid #00b4d8;
    color: #00b4d8;
    padding: 8px 15px;
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
    font-size: 12px;
  }
  .btn-config:hover {
    background: #00b4d8;
    color: #172238;
  }
  .toggle-switch {
    position: relative;
    display: inline-block;
    width: 50px;
    height: 24px;
  }
  .toggle-switch input {
    opacity: 0;
    width: 0;
    height: 0;
  }
  .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #555;
    transition: .3s;
    border-radius: 24px;
  }
  .slider:before {
    position: absolute;
    content: "";
    height: 18px;
    width: 18px;
    left: 3px;
    bottom: 3px;
    background-color: white;
    transition: .3s;
    border-radius: 50%;
  }
  input:checked + .slider {
    background-color: #00b4d8;
  }
  input:checked + .slider:before {
    transform: translateX(26px);
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

<div class="container config-container">
  <div class="config-card">
    <h2><i class="fa fa-sliders"></i> Configuración del Sistema</h2>
    
    <div class="config-section">
      <h3><i class="fa fa-cog"></i> Configuración General</h3>
      <div class="config-item">
        <div>
          <div class="config-label">Nombre de la Institución</div>
          <div class="config-value">PostEstudio - Sistema Educativo</div>
        </div>
        <button class="btn-config">Editar</button>
      </div>
      <div class="config-item">
        <div>
          <div class="config-label">Email de Soporte</div>
          <div class="config-value">soporte@poststudio.edu</div>
        </div>
        <button class="btn-config">Editar</button>
      </div>
      <div class="config-item">
        <div>
          <div class="config-label">Teléfono de Contacto</div>
          <div class="config-value">+57 123 456 7890</div>
        </div>
        <button class="btn-config">Editar</button>
      </div>
    </div>

    <div class="config-section">
      <h3><i class="fa fa-lock"></i> Seguridad</h3>
      <div class="config-item">
        <div>
          <div class="config-label">Autenticación de Dos Factores</div>
          <div class="config-value">Deshabilitado</div>
        </div>
        <label class="toggle-switch">
          <input type="checkbox">
          <span class="slider"></span>
        </label>
      </div>
      <div class="config-item">
        <div>
          <div class="config-label">Notificaciones por Email</div>
          <div class="config-value">Habilitado</div>
        </div>
        <label class="toggle-switch">
          <input type="checkbox" checked>
          <span class="slider"></span>
        </label>
      </div>
      <div class="config-item">
        <div>
          <div class="config-label">Encriptación de Contraseñas</div>
          <div class="config-value">Habilitado (bcrypt)</div>
        </div>
        <button class="btn-config">Ver detalles</button>
      </div>
    </div>

    <div class="config-section">
      <h3><i class="fa fa-database"></i> Base de Datos</h3>
      <div class="config-item">
        <div>
          <div class="config-label">Última Optimización</div>
          <div class="config-value">Hace 3 días</div>
        </div>
        <button class="btn-config">Optimizar ahora</button>
      </div>
      <div class="config-item">
        <div>
          <div class="config-label">Respaldo Automático</div>
          <div class="config-value">Diario a las 2:00 AM</div>
        </div>
        <button class="btn-config">Cambiar</button>
      </div>
    </div>
  </div>
</div>

</body>
</html>


</div>

</body>

</html>