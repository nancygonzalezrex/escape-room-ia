-- CREATE DATABASE IF NOT EXISTS escape_room
-- CHARACTER SET utf8mb4
-- COLLATE utf8mb4_unicode_ci;

-- USE escape_room;

DROP TABLE IF EXISTS pistas;

CREATE TABLE pistas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pregunta TEXT NOT NULL,
    respuesta VARCHAR(100) NOT NULL,
    mensaje_exito TEXT NOT NULL,
    orden INT NOT NULL
) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

INSERT INTO pistas (pregunta, respuesta, mensaje_exito, orden)
VALUES

(
'⚠️ NÉMESIS ha bloqueado el núcleo principal.

Descrube: Soy la estructura base de toda página web.
Sin mí, las etiquetas no tendrían orden ni existiría contenido.
¿Quién soy?',
'HTML',
'✅ Acceso parcial concedido. La estructura del servidor ha sido restaurada.',
1
),

(
'🎨 NÉMESIS intenta ocultar la interfaz del sistema.

Descrube: Soy el lenguaje encargado de dar color, diseño y apariencia visual a las páginas web.
¿Quién soy?',
'CSS',
'✅ Diseño restaurado. Los paneles visuales vuelven a mostrarse correctamente.',
2
),

(
'⚡ El núcleo comienza a reaccionar.

Descrube: Trabajo del lado del cliente.
Soy un lenguaje de programación que puede validar formularios, mostrar alertas y modificar elementos dinámicamente.
¿Quién soy?',
'JavaScript',
'✅ Scripts reactivados. El sistema responde nuevamente.',
3
),

(
'🖥️ NÉMESIS protege el servidor central.

Descrube: Vivo en el servidor.
Tambien soy un lenguaje de programación que procesa formularios y puedo conectarme a bases de datos(como pista extra, me has estado estudiando en tus clases de taller Aplicaciones para internet).
¿Quién soy?',
'PHP',
'✅ Conexión establecida. Has penetrado las defensas del núcleo.',
4
),

(
'🧠 ÚLTIMO BLOQUEO DETECTADO.

Soy el sistema utilizado para almacenar información en tablas y consultas.
¿Quién soy?',
'MySQL',
'✅ Base de datos recuperada. NÉMESIS ha sido desactivada.',
5
);