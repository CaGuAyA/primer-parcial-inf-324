<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION["ci_usuario"] = $_POST["ci"];
}
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $ci = $_GET["ci"];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
</head>
<body>
    <?php
    if (isset($_SESSION["ci_usuario"])) {
        echo "<h1>Hola, bienvenido</h1>";
        echo "<p>Tu número de CI es: " . $_SESSION["ci_usuario"] . "</p>";
    } else {
        echo "<h1>Hola, bienvenido usuario ".$ci."</h1>";
        //echo "<p>No se ha proporcionado un número de CI.</p>";
    }
    ?>
</body>
</html>
