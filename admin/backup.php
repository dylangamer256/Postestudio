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
<title>PostEstudio - Backup</title>
<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../assets/css/fontawesome.css">
<link rel="stylesheet" href="../assets/css/templatemo-grad-school.css">
<style>
  body {
    background: #172238;
    color: white;
  }
  .backup-container {
    margin-top: 120px;
    margin-bottom: 60px;
  }
  .backup-card {
    background: #0c1228;
    padding: 40px;
    border-radius: 10px;
  }
  .backup-card h2 {
    color: #fff;
    margin-bottom: 30px;
    border-left: 5px solid #00b4d8;
    padding-left: 20px;
  }
  .backup-section {
    background: #172238;
    padding: 30px;
    border-radius: 8px;
    margin-bottom: 30px;
    border-left: 4px solid #00b4d8;
  }
  .backup-section h3 {
    color: #00b4d8;
    margin-bottom: 20px;
  }
  .btn-backup {
    background: #00b4d8;
    color: white;
    border: none;
    padding: 12px 25px;
    border-radius: 5px;
    font-weight: bold;
    cursor: pointer;
    transition: 0.3s;
    margin-top: 15px;
  }
  .btn-backup:hover {
    background: #0096d6;
  }
  .backup-list {
    list-style: none;
    padding: 0;
  }
  .backup-item {
    background: #0c1228;
    padding: 15px 20px;
    margin-bottom: 10px;
    border-radius: 5px;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
  .backup-info {
    flex: 1;
  }
  .backup-name {
    color: #fff;
    font-weight: bold;
    margin-bottom: 5px;
  }
  .backup-details {
    color: #888;
    font-size: 12px;
  }
  .btn-accion {
    background: transparent;
    border: 1px solid #00b4d8;
    color: #00b4d8;
    padding: 5px 10px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 12px;
    margin-left: 10px;
    transition: 0.3s;
  }
  .btn-accion:hover {
    background: #00b4d8;
    color: #172238;
  }
  .btn-delete {
    border-color: #dc3545;
    color: #dc3545;
  }
  .btn-delete:hover {
    background: #dc3545;
    color: white;
  }
  .progress-info {
    text-align: center;
    padding: 20px;
    background: #0c1228;
    border-radius: 8px;
    margin-top: 20px;
    display: none;
  }
  .progress-bar-custom {
    background: #172238;
    height: 30px;
    border-radius: 5px;
    overflow: hidden;
    margin: 15px 0;
  }
  .progress-fill {
    background: linear-gradient(90deg, #00b4d8, #0096d6);
    height: 100%;
    width: 0%;
    transition: width 0.3s;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
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

<div class="container backup-container">
  <div class="backup-card">
    <h2><i class="fa fa-database"></i> Sistema de Respaldo (Backup)</h2>
    
    <div class="backup-section">
      <h3><i class="fa fa-plus"></i> Crear Nuevo Respaldo</h3>
      <p>Crear una copia de seguridad completa de la base de datos y archivos del sistema.</p>
      <button class="btn-backup" onclick="crearBackup()"><i class="fa fa-cloud-upload"></i> Crear Respaldo Ahora</button>
      <div class="progress-info" id="progressInfo">
        <p>Creando respaldo...</p>
        <div class="progress-bar-custom">
          <div class="progress-fill" id="progressFill">0%</div>
        </div>
        <p id="statusText">Inicializando...</p>
      </div>
    </div>

    <div class="backup-section">
      <h3><i class="fa fa-history"></i> Respaldos Anteriores</h3>
      <ul class="backup-list">
        <li class="backup-item">
          <div class="backup-info">
            <div class="backup-name">backup_2025_05_22.sql</div>
            <div class="backup-details">22 de mayo de 2025 - 2:30 AM | Tamaño: 45.6 MB | Estado: Completado</div>
          </div>
          <button class="btn-accion">Descargar</button>
          <button class="btn-accion btn-delete">Eliminar</button>
        </li>
        <li class="backup-item">
          <div class="backup-info">
            <div class="backup-name">backup_2025_05_20.sql</div>
            <div class="backup-details">20 de mayo de 2025 - 2:30 AM | Tamaño: 44.2 MB | Estado: Completado</div>
          </div>
          <button class="btn-accion">Descargar</button>
          <button class="btn-accion btn-delete">Eliminar</button>
        </li>
        <li class="backup-item">
          <div class="backup-info">
            <div class="backup-name">backup_2025_05_18.sql</div>
            <div class="backup-details">18 de mayo de 2025 - 2:30 AM | Tamaño: 43.8 MB | Estado: Completado</div>
          </div>
          <button class="btn-accion">Descargar</button>
          <button class="btn-accion btn-delete">Eliminar</button>
        </li>
      </ul>
    </div>

    <div class="backup-section">
      <h3><i class="fa fa-cog"></i> Configuración de Respaldos</h3>
      <p><strong>Respaldo Automático:</strong> Diario a las 2:00 AM</p>
      <p><strong>Retención:</strong> Últimos 30 días</p>
      <p><strong>Próximo Respaldo Automático:</strong> Mañana a las 2:00 AM</p>
      <button class="btn-backup"><i class="fa fa-edit"></i> Modificar Configuración</button>
    </div>
  </div>
</div>

<script>
function crearBackup() {
  const progressInfo = document.getElementById('progressInfo');
  const progressFill = document.getElementById('progressFill');
  const statusText = document.getElementById('statusText');
  
  progressInfo.style.display = 'block';
  
  let progress = 0;
  const interval = setInterval(() => {
    progress += Math.random() * 30;
    if (progress > 100) progress = 100;
    
    progressFill.style.width = progress + '%';
    progressFill.textContent = Math.round(progress) + '%';
    
    if (progress >= 100) {
      clearInterval(interval);
      statusText.textContent = 'Respaldo completado exitosamente';
      progressFill.style.background = 'linear-gradient(90deg, #2ecc71, #27ae60)';
    }
  }, 500);
}
</script>

</body>
</html>



</html>