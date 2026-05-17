<?php
session_start();

$intentos = isset($_SESSION["intentos"]) ? $_SESSION["intentos"] : 0;

session_destroy();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Acceso recuperado | EL NÚCLEO DESPERTÓ</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <div id="loader">
    <div class="loader-text">INICIANDO SISTEMA NÉMESIS...</div>
</div>

<div class="particulas"></div>

<div class="ojo-nemesis">NÉMESIS TE OBSERVA</div>

    <div class="contenedor">

        <h1>✅ ACCESO RECUPERADO</h1>

        <h2>NÉMESIS ha sido desactivada</h2>

        <p class="historia">
            Has superado todos los protocolos de seguridad del núcleo.
        </p>

        <p class="historia">
            Los archivos del servidor fueron restaurados correctamente
            y el sistema volvió a estar bajo control humano.
        </p>

        <div class="alerta exito-final">
            🟢 MISIÓN COMPLETADA
        </div>

        <p class="historia">
            Intentos realizados: <strong><?php echo $intentos; ?></strong>
        </p>

        <a href="index.php" class="boton">
            VOLVER A JUGAR
        </a>

    </div>
    <script src="script.js"></script>

</body>
</html>