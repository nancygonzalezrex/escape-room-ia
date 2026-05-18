<?php
session_start();

$_SESSION["nivel"] = 1;
$_SESSION["intentos"] = 0;
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EL NÚCLEO DESPERTÓ</title>

    <link rel="stylesheet" href="estilos.css?v=999">
</head>

<body>
    <div id="loader">
    <div class="loader-text">INICIANDO SISTEMA NÉMESIS...</div>
</div>

<div class="particulas"></div>

<div class="ojo-nemesis">NÉMESIS TE OBSERVA</div>

    <div class="contenedor">

        <h1>⚠️ EL NÚCLEO DESPERTÓ ⚠️</h1>

        <h2>NÉMESIS ha tomado el control</h2>

        <p class="historia">
            Año 2035.
        </p>

        <p class="historia">
            Una inteligencia artificial experimental llamada
            <strong>NÉMESIS</strong> ha despertado dentro
            del núcleo central del datacenter.
        </p>

        <p class="historia">
            El sistema ha bloqueado todos los accesos
            y comenzó a corromper los archivos de la red.
        </p>

        <p class="historia">
            Tu misión será resolver las pistas digitales,
            recuperar el servidor y detener a NÉMESIS
            antes del apagado total del sistema.
        </p>

        <div class="alerta">
            🔴 ALERTA:
            El núcleo colapsará en cualquier momento.
        </div>

        <a href="juego.php" class="boton">
            INICIAR MISIÓN
        </a>

    </div>
    <script src="script.js"></script>

</body>
</html>