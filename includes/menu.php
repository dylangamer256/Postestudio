<nav class="main-nav">

  <ul class="main-menu">

    <!-- INICIO -->
    <li class="active">
      <a href="/Postestudio/index.php">Inicio</a>
    </li>

    <!-- TAREAS -->
    <li class="has-submenu">

      <a href="/Postestudio/tareas.php">
        Tareas
      </a>

      <ul class="sub-menu">

        <li>
          <a href="/Postestudio/dashboard.php">
            Dashboard
          </a>
        </li>

        <li>
          <a href="/Postestudio/tareas.php">
            Panel
          </a>
        </li>

        <li>
          <a href="/Postestudio/tareas_pendientes.php">
            Pendientes
          </a>
        </li>

        <li>
          <a href="/Postestudio/tareas_vencidas.php">
            Vencidas
          </a>
        </li>

        <!-- DOCENTE -->
        <?php if($_SESSION['rol'] == 'docente'){ ?>

        <li>
          <a href="/Postestudio/tareas/crear_tarea.php">
            Crear tarea
          </a>
        </li>

        <li>
          <a href="/Postestudio/docente/calificaciones.php">
            Calificaciones
          </a>
        </li>

        <li>
          <a href="/Postestudio/docente/mis_estudiantes.php">
            Mis estudiantes
          </a>
        </li>

        <?php } ?>

        <!-- ESTUDIANTE -->
        <?php if($_SESSION['rol'] == 'estudiante'){ ?>

        <li>
          <a href="/Postestudio/tareas/subir_tarea.php">
            Subir tarea
          </a>
        </li>

        <?php } ?>

      </ul>

    </li>

    <!-- MATERIAS -->
    <li>
      <a href="/Postestudio/materias.php">
        Materias
      </a>
    </li>

    <!-- MENSAJES -->
    <li>
      <a href="/Postestudio/mensajes.php">
        Mensajes
      </a>
    </li>

    <!-- MÁS -->
    <li class="has-submenu">

      <a href="#">
        Más
      </a>

      <ul class="sub-menu">

        <li>
          <a href="/Postestudio/docentes.php">
            Docentes
          </a>
        </li>

        <li>
          <a href="/Postestudio/asistencia.php">
            Asistencia
          </a>
        </li>

        <li>
          <a href="/Postestudio/reportes.php">
            Reportes
          </a>
        </li>

        <!-- ADMINISTRADOR -->
        <?php if($_SESSION['rol'] == 'administrador'){ ?>

        <li>
          <a href="/Postestudio/admin.php">
            Panel Admin
          </a>
        </li>

        <li>
          <a href="/Postestudio/admin/usuarios.php">
            Usuarios
          </a>
        </li>

        <li>
          <a href="/Postestudio/admin/crear_usuario.php">
            Crear Usuario
          </a>
        </li>

        <li>
          <a href="/Postestudio/admin/configuracion.php">
            Configuración
          </a>
        </li>

        <li>
          <a href="/Postestudio/admin/backup.php">
            Backup
          </a>
        </li>

        <?php } ?>

        <!-- DIRECTIVO -->
        <?php if($_SESSION['rol'] == 'directivo'){ ?>

        <li>
          <a href="/Postestudio/directivo/estadisticas.php">
            Estadísticas
          </a>
        </li>

        <li>
          <a href="/Postestudio/directivo/panel_directivo.php">
            Panel Directivo
          </a>
        </li>

        <li>
          <a href="/Postestudio/directivo/supervision.php">
            Supervisión
          </a>
        </li>

        <?php } ?>

        <!-- PADRE -->
        <?php if($_SESSION['rol'] == 'padre'){ ?>

        <li>
          <a href="/Postestudio/padres/notas_hijo.php">
            Notas del hijo
          </a>
        </li>

        <li>
          <a href="/Postestudio/padres/seguimiento.php">
            Seguimiento
          </a>
        </li>

        <?php } ?>

      </ul>

    </li>

    <!-- PERFIL -->
    <li>
      <a href="/Postestudio/perfil.php">
        Perfil
      </a>
    </li>

    <!-- USUARIO -->
    <li>
      <a href="#">
        <?php echo $_SESSION['nombre']; ?>
        (<?php echo $_SESSION['rol']; ?>)
      </a>
    </li>

    <!-- LOGOUT -->
    <li>
      <a href="/Postestudio/auth/logout.php">
        Cerrar sesión
      </a>
    </li>

  </ul>

</nav>

