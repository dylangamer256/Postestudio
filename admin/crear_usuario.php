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
<title>PostEstudio - Crear Usuario</title>
<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../assets/css/fontawesome.css">
<link rel="stylesheet" href="../assets/css/templatemo-grad-school.css">
<style>
  body {
    background: #172238;
    color: white;
  }
  .form-container {
    margin-top: 120px;
    margin-bottom: 60px;
  }
  .form-card {
    background: #0c1228;
    padding: 40px;
    border-radius: 10px;
    max-width: 600px;
    margin: 0 auto;
  }
  .form-card h2 {
    color: #fff;
    margin-bottom: 30px;
    border-left: 5px solid #00b4d8;
    padding-left: 20px;
  }
  .form-group label {
    color: #00b4d8;
    font-weight: bold;
    margin-top: 15px;
  }
  .form-control {
    background: #172238;
    border: 1px solid #00b4d8;
    color: white;
    padding: 12px 15px;
    border-radius: 5px;
  }
  .form-control:focus {
    background: #172238;
    color: white;
    border-color: #0096d6;
    box-shadow: 0 0 0 0.2rem rgba(0, 180, 216, 0.25);
  }
  .form-control::placeholder {
    color: #777;
  }
  .btn-submit {
    background: #00b4d8;
    color: white;
    border: none;
    padding: 12px 30px;
    border-radius: 5px;
    font-weight: bold;
    cursor: pointer;
    transition: 0.3s;
    margin-top: 20px;
    width: 100%;
  }
  .btn-submit:hover {
    background: #0096d6;
    transform: translateY(-2px);
  }
  .btn-cancel {
    background: #555;
    color: white;
    border: none;
    padding: 12px 30px;
    border-radius: 5px;
    text-decoration: none;
    display: inline-block;
    margin-top: 10px;
    width: 100%;
    text-align: center;
  }
  .btn-cancel:hover {
    background: #777;
    color: white;
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

<div class="container form-container">
  <div class="form-card">
    <h2><i class="fa fa-user-plus"></i> Crear Nuevo Usuario</h2>
    
    <form id="crearUsuarioForm" onsubmit="guardarUsuario(event)">
      <div class="form-group">
        <label for="nombre">Nombre Completo</label>
        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre completo" required>
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="correo@escuela.edu" required>
      </div>

      <div class="form-group">
        <label for="rol">Rol</label>
        <select class="form-control" id="rol" name="rol" required>
          <option value="">-- Seleccione un rol --</option>
          <option value="estudiante">Estudiante</option>
          <option value="docente">Docente</option>
          <option value="padre">Padre/Acudiente</option>
          <option value="directivo">Directivo</option>
          <option value="administrador">Administrador</option>
        </select>
      </div>

      <div class="form-group">
        <label for="password">Contraseña</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña segura" required>
      </div>

      <div class="form-group">
        <label for="password_confirm">Confirmar Contraseña</label>
        <input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Confirme la contraseña" required>
      </div>

      <button type="submit" class="btn-submit"><i class="fa fa-save"></i> Crear Usuario</button>
      <a href="usuarios.php" class="btn-cancel"><i class="fa fa-times"></i> Cancelar</a>
    </form>
  </div>
</div>

<script>
function guardarUsuario(e){
  e.preventDefault();
  
  const nombre = document.getElementById('nombre').value;
  const email = document.getElementById('email').value;
  const rol = document.getElementById('rol').value;
  const password = document.getElementById('password').value;
  const password_confirm = document.getElementById('password_confirm').value;
  
  if(password !== password_confirm){
    alert('Las contraseñas no coinciden');
    return;
  }
  
  const formData = new FormData();
  formData.append('nombre', nombre);
  formData.append('email', email);
  formData.append('rol', rol);
  formData.append('password', password);
  
  fetch('../api/usuarios_api.php?accion=crear', {
    method: 'POST',
    body: formData
  })
  .then(response => response.json())
  .then(data => {
    if(data.exito){
      alert(data.mensaje);
      window.location.href = 'usuarios.php';
    } else {
      alert('Error: ' + data.error);
    }
  });
}
</script>

</body>
</html>