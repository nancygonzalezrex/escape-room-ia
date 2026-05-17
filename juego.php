<?php
session_start();
include("conexion.php");

if (!isset($_SESSION["nivel"])) {
    $_SESSION["nivel"] = 1;
}

if (!isset($_SESSION["intentos"])) {
    $_SESSION["intentos"] = 0;
}

$nivel = $_SESSION["nivel"];
$mensaje = "";
$tipo_mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $respuesta_usuario = trim($_POST["respuesta"]);

    $sql_validar = "SELECT * FROM pistas WHERE orden = $nivel";
    $resultado_val = $conexion->query($sql_validar);
    $pista_validar = $resultado_val->fetch_assoc();

    $_SESSION["intentos"]++;

    if (strcasecmp($respuesta_usuario, $pista_validar["respuesta"]) == 0) {

        $mensaje = $pista_validar["mensaje_exito"];
        $tipo_mensaje = "exito";

        $_SESSION["nivel"]++;

        $siguiente_nivel = $_SESSION["nivel"];
        $sql_siguiente = "SELECT * FROM pistas WHERE orden = $siguiente_nivel";
        $resultado_siguiente = $conexion->query($sql_siguiente);

        if ($resultado_siguiente->num_rows == 0) {
            header("Location: final.php");
            exit();
        }

        $nivel = $_SESSION["nivel"];

    } else {
        $mensaje = "❌ Respuesta incorrecta. NÉMESIS rechaza el acceso al núcleo.";
        $tipo_mensaje = "error";
    }
}

$sql = "SELECT * FROM pistas WHERE orden = $nivel";
$resultado = $conexion->query($sql);

if ($resultado->num_rows == 0) {
    header("Location: final.php");
    exit();
}

$pista = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Nivel <?php echo $nivel; ?> | EL NÚCLEO DESPERTÓ</title>

    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <div id="loader">
    <div class="loader-text">INICIANDO SISTEMA NÉMESIS...</div>
</div>

<div class="particulas"></div>

<div class="ojo-nemesis">NÉMESIS TE OBSERVA</div>

    <div class="contenedor nivel-<?php echo $nivel; ?>">

        <h1>🧠 NIVEL <?php echo $nivel; ?></h1>

        <h2>Protocolo de desbloqueo</h2>
        <div id="temporizador">Tiempo restante: 60</div>

        <div class="estado-sistema">
            Intentos realizados: <?php echo $_SESSION["intentos"]; ?>
        </div>

        <div class="pista">
            <h3>📡 Pista interceptada</h3>
            <p><?php echo $pista["pregunta"]; ?></p>
        </div>

        <?php if ($mensaje != "") { ?>
            <div class="mensaje <?php echo $tipo_mensaje; ?>">
                <?php echo $mensaje; ?>
            </div>
        <?php } ?>

        <form method="POST" onsubmit="return validarFormulario();">
            <input 
                type="text" 
                name="respuesta" 
                id="respuesta" 
                placeholder="Ingresa el código de respuesta..."
                autocomplete="off"
            >

            <button type="submit">
                ENVIAR RESPUESTA
            </button>
        </form>

        <a href="index.php" class="volver">
            Reiniciar misión
        </a>

    </div>

    <script src="script.js"></script>

</body>
</html>