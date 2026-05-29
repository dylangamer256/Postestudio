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
<title>PostEstudio - Gestión de Usuarios</title>
<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../assets/css/fontawesome.css">
<link rel="stylesheet" href="../assets/css/templatemo-grad-school.css">
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
  .header-actions {
    margin-bottom: 30px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 15px;
  }
  .search-box {
    flex: 1;
    min-width: 200px;
  }
  .search-box input {
    background: #172238;
    border: 1px solid #00b4d8;
    color: white;
    padding: 12px 15px;
    border-radius: 5px;
    width: 100%;
  }
  .btn-nuevo {
    background: #00b4d8;
    color: white;
    border: none;
    padding: 12px 25px;
    border-radius: 5px;
    font-weight: bold;
    cursor: pointer;
    text-decoration: none;
    transition: 0.3s;
  }
  .btn-nuevo:hover {
    background: #0096d6;
    color: white;
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
  .badge-rol {
    background: rgba(0, 180, 216, 0.2);
    color: #00b4d8;
    padding: 5px 10px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: bold;
  }
  .btn-accion {
    background: transparent;
    border: 1px solid #00b4d8;
    color: #00b4d8;
    padding: 5px 10px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 12px;
    margin-right: 5px;
    transition: 0.3s;
  }
  .btn-accion:hover {
    background: #00b4d8;
    color: #172238;
  }
  .btn-delete {
    background: transparent;
    border: 1px solid #dc3545;
    color: #dc3545;
  }
  .btn-delete:hover {
    background: #dc3545;
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

<div class="container admin-container">
  <div class="admin-card">
    <h2><i class="fa fa-users"></i> Gestión de Usuarios</h2>
    
    <div class="header-actions">
      <div class="search-box">
        <input type="text" placeholder="Buscar usuario por nombre o email..." id="searchInput">
      </div>
      <a href="crear_usuario.php" class="btn-nuevo"><i class="fa fa-plus"></i> Nuevo Usuario</a>
    </div>

    <div class="table-responsive">
      <table>
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Rol</th>
            <th>Creado</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody id="usuariosTable">
          <tr>
            <td colspan="5" style="text-align: center; padding: 30px;">Cargando usuarios...</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function(){
  cargarUsuarios();
  document.getElementById('searchInput').addEventListener('keyup', filtrarUsuarios);
});

function cargarUsuarios(){
  fetch('../api/usuarios_api.php?accion=obtener_todos')
    .then(response => response.json())
    .then(data => {
      let html = '';
      if(data.length === 0){
        html = '<tr><td colspan="5" style="text-align: center; padding: 20px;">No hay usuarios</td></tr>';
      } else {
        data.forEach(usuario => {
          let colorRol = '#00b4d8';
          if(usuario.rol === 'estudiante') colorRol = '#f39c12';
          if(usuario.rol === 'administrador') colorRol = '#e67e22';
          if(usuario.rol === 'directivo') colorRol = '#dc3545';
          if(usuario.rol === 'padre') colorRol = '#2ecc71';
          
          html += `
            <tr>
              <td>${usuario.nombre}</td>
              <td>${usuario.correo}</td>
              <td><span class="badge-rol" style="background: ${colorRol}20; color: ${colorRol};">${usuario.rol}</span></td>
              <td>${usuario.fecha_creacion}</td>
              <td>
                <button class="btn-accion" onclick="editarUsuario(${usuario.id})">Editar</button>
                <button class="btn-accion btn-delete" onclick="eliminarUsuario(${usuario.id})">Eliminar</button>
              </td>
            </tr>
          `;
        });
      }
      document.getElementById('usuariosTable').innerHTML = html;
    });
}

function eliminarUsuario(id){
  if(confirm('¿Está seguro que desea eliminar este usuario?')){
    fetch('../api/usuarios_api.php?accion=eliminar', {
      method: 'POST',
      headers: {'Content-Type': 'application/x-www-form-urlencoded'},
      body: 'id=' + id
    })
    .then(response => response.json())
    .then(data => {
      if(data.exito){
        alert(data.mensaje);
        cargarUsuarios();
      } else {
        alert('Error: ' + data.error);
      }
    });
  }
}

function editarUsuario(id){
  alert('Funcionalidad de edición próximamente');
}

function filtrarUsuarios(){
  let valor = document.getElementById('searchInput').value.toLowerCase();
  let filas = document.getElementById('usuariosTable').querySelectorAll('tr');
  
  filas.forEach(fila => {
    if(fila.textContent.toLowerCase().includes(valor)){
      fila.style.display = '';
    } else {
      fila.style.display = 'none';
    }
  });
}
</script>

<script>
document.getElementById('searchInput').addEventListener('keyup', function() {
  // Implementar lógica de búsqueda aquí
});
</script>

</body>
</html>