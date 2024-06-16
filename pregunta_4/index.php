<!DOCTYPE html>
<html>

<head>
    <title>Formulario</title>
    <link href="./styles.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div id="contenedor">
        <div>
            <h2>Enviar datos a .Net</h2>
            <form action="https://localhost:44328/WebForm1.aspx" method="post">
                <label for="nombre">Nombre:</label><br>
                <input type="text" id="nombre" name="nombre"><br><br>

                <label for="apellido">Apellido:</label><br>
                <input type="text" id="apellido" name="apellido"><br><br>

                <input id="button" type="submit" value="Enviar">
            </form>
        </div>
        <div>
            <h2>Enviar datos a JAVA</h2>
            <form action="procesar_formulario.php" method="get">
                <label for="nombre">Nombre:</label><br>
                <input type="text" id="nombre" name="nombre"><br><br>

                <label for="apellido">Apellido:</label><br>
                <input type="text" id="apellido" name="apellido"><br><br>

                <input id="button" type="submit" value="Enviar">
            </form>
        </div>
    </div>
</body>

</html>