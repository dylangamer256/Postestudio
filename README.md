# Postestudio

 Descripción General
PostEstudio es una plataforma web educativa desarrollada en PHP + MySQL orientada a la gestión académica institucional.
El sistema permite administrar:
•	Usuarios
•	Roles académicos
•	Tareas
•	Materias
•	Reportes
•	Asistencia
•	Mensajería
•	Seguimiento académico
•	Gestión administrativa
Todo el sistema funciona mediante autenticación con sesiones PHP y una base de datos relacional MySQL.
________________________________________
 Tecnologías Utilizadas
Backend
•	PHP 8
•	MySQL / MariaDB
•	Sesiones PHP
Frontend
•	HTML5
•	CSS3
•	Bootstrap
•	JavaScript
Servidor Local
•	Laragon
•	Apache
________________________________________
 Estructura del Proyecto
POSTESTUDIO/
│
├── admin/
│   ├── backup.php
│   ├── configuracion.php
│   ├── crear_usuario.php
│   └── usuarios.php
│
├── assets/
│   ├── css/
│   ├── fonts/
│   ├── images/
│   └── js/
│
├── auth/
│   ├── logout.php
│   ├── proteger.php
│   └── validar_login.php
│
├── directivo/
│   ├── estadisticas.php
│   ├── panel_directivo.php
│   └── supervision.php
│
├── docente/
│   ├── calificaciones.php
│   └── mis_estudiantes.php
│
├── padres/
│   ├── notas_hijo.php
│   └── seguimiento.php
│
├── tareas/
│   ├── crear_tarea.php
│   ├── editar_tarea.php
│   ├── eliminar_tarea.php
│   └── subir_tarea.php
│
├── vendor/
│
├── admin.php
├── asistencia.php
├── conexion.php
├── cursos.php
├── dashboard.php
├── database.sql
├── docentes.php
├── index.php
├── login.php
├── materias.php
├── mensajes.php
├── perfil.php
├── reportes.php
├── tareas.php
├── tareas_pendientes.php
├── tareas_vencidas.php
└── README.md
________________________________________
 Sistema de Autenticación
El sistema utiliza sesiones PHP para controlar el acceso.
Flujo de autenticación
1.	El usuario ingresa:
o	correo
o	contraseña
2.	validar_login.php consulta la base de datos.
3.	Si los datos son correctos:
o	se crea una sesión PHP
o	se almacenan:
	nombre
	correo
	rol
4.	El usuario accede al sistema.
________________________________________
Variables de sesión
$_SESSION['usuario']
$_SESSION['nombre']
$_SESSION['rol']
________________________________________
 Protección de páginas
Todas las páginas privadas usan:
include("auth/proteger.php");
o:
include("../auth/proteger.php");
según la carpeta.
________________________________________
 Roles del Sistema
El sistema trabaja con 5 actores principales.
________________________________________
 Estudiante
Funciones
•	Ver tareas
•	Ver tareas pendientes
•	Ver tareas vencidas
•	Subir tareas
•	Consultar materias
•	Ver mensajes
•	Ver perfil
Archivos relacionados
tareas/subir_tarea.php
tareas.php
perfil.php
________________________________________
 Docente
Funciones
•	Crear tareas
•	Editar tareas
•	Eliminar tareas
•	Ver estudiantes
•	Gestionar calificaciones
•	Revisar entregas
Archivos relacionados
tareas/crear_tarea.php
tareas/editar_tarea.php
tareas/eliminar_tarea.php
docente/calificaciones.php
docente/mis_estudiantes.php
________________________________________
 Administrador
Funciones
•	Crear usuarios
•	Administrar roles
•	Ver usuarios
•	Configuración del sistema
•	Backups
•	Control total de la plataforma
Archivos relacionados
admin/usuarios.php
admin/crear_usuario.php
admin/configuracion.php
admin/backup.php
admin.php
________________________________________
 Directivo
Funciones
•	Supervisar rendimiento
•	Revisar estadísticas
•	Ver reportes institucionales
•	Supervisión académica
Archivos relacionados
directivo/estadisticas.php
directivo/panel_directivo.php
directivo/supervision.php
________________________________________
 Padre de familia
Funciones
•	Ver notas del estudiante
•	Ver seguimiento académico
•	Consultar progreso
Archivos relacionados
padres/notas_hijo.php
padres/seguimiento.php
________________________________________
 Control de Acceso por Roles
El sistema controla permisos mediante:
$_SESSION['rol']
Ejemplo:
if($_SESSION['rol'] == 'docente'){
    echo "Puede crear tareas";
}
________________________________________
🗄 Base de Datos
Nombre de la base de datos
postestudio
________________________________________
 Tabla principal: usuarios
CREATE TABLE usuarios(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    correo VARCHAR(100),
    password VARCHAR(255),
    rol VARCHAR(50),
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
________________________________________
 Tabla de tareas
CREATE TABLE tareas(
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255),
    descripcion TEXT,
    fecha_entrega DATE,
    archivo VARCHAR(255),
    docente_id INT
);
________________________________________
 Comunicación con la Base de Datos
Archivo principal
conexion.php
________________________________________
Código de conexión
<?php

$host = "localhost";
$usuario = "root";
$password = "";
$bd = "postestudio";

$conn = mysqli_connect($host,$usuario,$password,$bd);

if(!$conn){
    die("Error de conexión");
}

?>
________________________________________
 Flujo de consultas SQL
Ejemplo login
$sql = "SELECT * FROM usuarios
WHERE correo='$correo'
AND password='$password'";
________________________________________
Ejemplo tareas
$sql = "SELECT * FROM tareas";
________________________________________
Ejemplo insertar tarea
$sql = "INSERT INTO tareas(
titulo,
descripcion
) VALUES(
'$titulo',
'$descripcion'
)";
________________________________________
 Subida de Archivos
El sistema permite subir tareas.
Funciones
•	Apertura del explorador de archivos
•	Recepción mediante $_FILES
•	Almacenamiento en servidor
Archivo
tareas/subir_tarea.php
________________________________________
 Dashboard
El dashboard muestra:
•	Total de tareas
•	Pendientes
•	Vencidas
•	Estadísticas generales
Archivo:
dashboard.php
________________________________________
 Sistema de Mensajes
Permite comunicación entre usuarios.
Archivo:
mensajes.php
________________________________________
 Gestión Académica
Incluye:
•	Materias
•	Cursos
•	Asistencia
•	Reportes
Archivos:
materias.php
cursos.php
asistencia.php
reportes.php
________________________________________
 Diseño Visual
Características
•	Diseño responsive
•	Bootstrap
•	Menús dinámicos
•	Submenús por rol
•	Estilo moderno educativo
________________________________________
 Seguridad Implementada
Incluye
•	Sesiones PHP
•	Restricción de páginas
•	Validación de login
•	Control de roles
•	Logout seguro
________________________________________
 Cierre de Sesión
Archivo:
auth/logout.php
Destruye:
session_destroy();
________________________________________
 Instalación
1. Clonar proyecto
git clone
________________________________________
2. Copiar en Laragon
C:\laragon\www\Postestudio
________________________________________
3. Iniciar servicios
•	Apache
•	MySQL
________________________________________
4. Crear base de datos
Importar:
database.sql
________________________________________
5. Configurar conexión
Editar:
conexion.php
________________________________________
 Acceso al sistema
http://localhost/Postestudio
________________________________________
 Usuarios de prueba
Administrador
Correo:
admin@postestudio.com

Contraseña:
123456
________________________________________
 Futuras Mejoras
Posibles funcionalidades
•	API REST
•	Chat en tiempo real
•	Notificaciones
•	Recuperar contraseña
•	Panel móvil
•	Calificaciones automáticas
•	IA educativa
•	Exportar PDF
•	Calendario académico
•	Videollamadas
•	Integración con correo
________________________________________
 Arquitectura General
Usuario
   ↓
Frontend HTML/CSS/JS
   ↓
PHP
   ↓
MySQL
   ↓
Respuesta dinámica
________________________________________
 Estado del Proyecto
Actualmente implementado
✅ Login funcional
✅ Roles dinámicos
✅ CRUD de tareas
✅ Protección de páginas
✅ Menús por rol
✅ Subida de archivos
✅ Dashboard
✅ Base de datos funcional
✅ Gestión de usuarios
✅ Panel administrativo
________________________________________
 Autor
Proyecto desarrollado como plataforma educativa académica web utilizando PHP y MySQL.
________________________________________
 Licencia
Proyecto académico y educativo.
Todos los derechos reservados.
