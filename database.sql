-- Tabla de Usuarios
CREATE TABLE IF NOT EXISTS usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL,
  correo VARCHAR(100) UNIQUE NOT NULL,
  rol ENUM('administrador', 'docente', 'estudiante', 'directivo', 'padre') NOT NULL,
  password VARCHAR(255) NOT NULL,
  fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabla de Tareas
CREATE TABLE IF NOT EXISTS tareas (
  id INT AUTO_INCREMENT PRIMARY KEY,
  titulo VARCHAR(200) NOT NULL,
  descripcion LONGTEXT,
  materia VARCHAR(100),
  fecha_entrega DATE,
  fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  estado ENUM('activa', 'vencida', 'completada') DEFAULT 'activa',
  docente_id INT,
  FOREIGN KEY (docente_id) REFERENCES usuarios(id)
);

-- Tabla de Entregas de Tareas
CREATE TABLE IF NOT EXISTS entregas_tareas (
  id INT AUTO_INCREMENT PRIMARY KEY,
  tarea_id INT NOT NULL,
  estudiante_id INT NOT NULL,
  archivo VARCHAR(255),
  comentarios LONGTEXT,
  fecha_entrega TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  calificacion INT,
  FOREIGN KEY (tarea_id) REFERENCES tareas(id),
  FOREIGN KEY (estudiante_id) REFERENCES usuarios(id)
);

-- Tabla de Calificaciones
CREATE TABLE IF NOT EXISTS calificaciones (
  id INT AUTO_INCREMENT PRIMARY KEY,
  estudiante_id INT NOT NULL,
  docente_id INT NOT NULL,
  materia VARCHAR(100),
  periodo VARCHAR(50),
  actividades DECIMAL(5,2),
  tareas DECIMAL(5,2),
  examen DECIMAL(5,2),
  promedio DECIMAL(5,2),
  FOREIGN KEY (estudiante_id) REFERENCES usuarios(id),
  FOREIGN KEY (docente_id) REFERENCES usuarios(id)
);

-- Tabla de Mensajes
CREATE TABLE IF NOT EXISTS mensajes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  remitente_id INT NOT NULL,
  destinatario_id INT NOT NULL,
  contenido LONGTEXT,
  fecha_envio TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  leido BOOLEAN DEFAULT FALSE,
  FOREIGN KEY (remitente_id) REFERENCES usuarios(id),
  FOREIGN KEY (destinatario_id) REFERENCES usuarios(id)
);

-- Tabla de Asistencia
CREATE TABLE IF NOT EXISTS asistencia (
  id INT AUTO_INCREMENT PRIMARY KEY,
  estudiante_id INT NOT NULL,
  fecha DATE,
  estado ENUM('presente', 'ausente', 'tarde'),
  FOREIGN KEY (estudiante_id) REFERENCES usuarios(id)
);


