<?php
include("conexion.php");
include("auth/proteger.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>PostEstudio - Mi Perfil</title>
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/fontawesome.css">
<link rel="stylesheet" href="assets/css/templatemo-grad-school.css">
<style>
  .perfil-container {
    margin-top: 120px;
    margin-bottom: 60px;
  }
  .perfil-card {
    background: #0c1228;
    padding: 40px;
    border-radius: 10px;
  }
  .perfil-card h2 {
    color: #fff;
    margin-bottom: 30px;
    border-left: 5px solid #00b4d8;
    padding-left: 20px;
  }
  .perfil-avatar {
    text-align: center;
    margin-bottom: 30px;
  }
  .perfil-avatar i {
    font-size: 100px;
    color: #00b4d8;
  }
  .perfil-info {
    background: #172238;
    padding: 25px;
    border-radius: 10px;
  }
  .info-row {
    display: flex;
    padding: 12px 0;
    border-bottom: 1px solid rgba(255,255,255,0.1);
  }
  .info-label {
    width: 150px;
    font-weight: bold;
    color: #00b4d8;
  }
  .info-value {
    color: #fff;
    flex: 1;
  }
  .btn-editar {
    background: #00b4d8;
    color: #fff;
    padding: 10px 25px;
    border-radius: 5px;
    text-decoration: none;
    display: inline-block;
    margin-top: 20px;
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

<div class="container perfil-container">
  <div class="perfil-card">
    <h2><i class="fa fa-user-circle"></i> Mi Perfil</h2>
    
    <div id="perfilContenido">
      <p style="text-align: center;">Cargando datos del perfil...</p>
    </div>
  </div>
</div>

<footer>
  <div class="container text-center">
    <p>© 2024 PostEstudio - Gestión Educativa</p>
  </div>
</footer>

<script>
document.addEventListener('DOMContentLoaded', function(){
  cargarPerfil();
});

function cargarPerfil(){
  fetch('api/usuarios_api.php?accion=obtener_perfil')
    .then(response => response.json())
    .then(usuario => {
      let html = `
        <div class="row">
          <div class="col-md-4">
            <div class="perfil-avatar">
              <i class="fa fa-user-circle"></i>
              <h3 style="color:#fff; margin-top:15px;">${usuario.nombre}</h3>
              <p style="color:#aaa;">${usuario.rol} </p>
            </div>
          </div>
          <div class="col-md-8">
            <div class="perfil-info">
              <div class="info-row">
                <div class="info-label"><i class="fa fa-envelope"></i> Correo:</div>
                <div class="info-value">${usuario.correo}</div>
              </div>
              <div class="info-row">
                <div class="info-label"><i class="fa fa-id-card"></i> ID:</div>
                <div class="info-value">${usuario.id}</div>
              </div>
              <div class="info-row">
                <div class="info-label"><i class="fa fa-calendar"></i> Miembro desde:</div>
                <div class="info-value">${usuario.fecha_creacion}</div>
              </div>
              <button class="btn-editar" onclick="abrirEdicion()"><i class="fa fa-edit"></i> Editar perfil</button>
            </div>
          </div>
        </div>
      `;
      document.getElementById('perfilContenido').innerHTML = html;
    });
}

function abrirEdicion(){
  fetch('api/usuarios_api.php?accion=obtener_perfil')
    .then(response => response.json())
    .then(usuario => {
      let html = `
        <div class="row">
          <div class="col-md-4">
            <div class="perfil-avatar">
              <i class="fa fa-user-circle"></i>
              <h3 style="color:#fff; margin-top:15px;">${usuario.nombre}</h3>
            </div>
          </div>
          <div class="col-md-8">
            <div class="perfil-info">
              <div class="form-group">
                <label>Nombre</label>
                <input type="text" class="form-control" id="editNombre" value="${usuario.nombre}">
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" id="editEmail" value="${usuario.correo}">
              </div>
              <div class="form-group">
                <label>Nueva Contraseña (dejar vacío para no cambiar)</label>
                <input type="password" class="form-control" id="editPassword" placeholder="Contraseña nueva">
              </div>
              <button class="btn-editar" onclick="guardarPerfil()"><i class="fa fa-save"></i> Guardar cambios</button>
              <button class="btn-editar" style="background: #555;" onclick="cargarPerfil()"><i class="fa fa-times"></i> Cancelar</button>
            </div>
          </div>
        </div>
      `;
      document.getElementById('perfilContenido').innerHTML = html;
    });
}

function guardarPerfil(){
  const nombre = document.getElementById('editNombre').value;
  const email = document.getElementById('editEmail').value;
  const password = document.getElementById('editPassword').value;
  
  const formData = new FormData();
  formData.append('nombre', nombre);
  formData.append('email', email);
  formData.append('password', password);
  
  fetch('api/usuarios_api.php?accion=actualizar_perfil', {
    method: 'POST',
    body: formData
  })
  .then(response => response.json())
  .then(data => {
    if(data.exito){
      alert(data.mensaje);
      cargarPerfil();
    } else {
      alert('Error: ' + data.error);
    }
  });
}
</script>

<style>
.form-group {
  margin-bottom: 15px;
}
.form-group label {
  color: #00b4d8;
  font-weight: bold;
  display: block;
  margin-bottom: 8px;
}
.form-control {
  background: #172238;
  border: 1px solid #00b4d8;
  color: white;
  padding: 10px 12px;
  border-radius: 5px;
  width: 100%;
}
</style>

</body>
</html>