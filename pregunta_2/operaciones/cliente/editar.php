<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link href="./css/editar.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php
    include "../../conexion.inc.php";
    $id = $_GET["id"];
    $sql = "select * from usuario where id_usuario_ci=" . $id;
    $resultado = mysqli_query($con, $sql);
    $fila = mysqli_fetch_array($resultado);
    ?>

    <h1>Actualizar datos de usuario</h1>

    <form id="editar_usuario" method="GET" action="editarg.php">
        <div>
            C.I.:
            <input type="text" name="id_usuario_ci" value="<?php echo $fila['id_usuario_ci']; ?>" />
        </div>
        <div>
            Nombre:
            <input type="text" name="nombre" value="<?php echo $fila['nombre']; ?>" />
        </div>
        <div>
            Apellido Paterno:
            <input type="text" name="apellido_pat" value="<?php echo $fila['apellido_pat']; ?>" />
        </div>
        <div>
            Apellido Materno:
            <input type="text" name="apellido_mat" value="<?php echo $fila['apellido_mat']; ?>" />
        </div>
        <div>
            Fehca de Nacimiento:
            <input type="text" name="fecha_nacimiento" value="<?php echo $fila['fecha_nacimiento']; ?>" />
        </div>
        <div>
            Contraseña:
            <input type="text" name="contraseña" value="<?php echo $fila['contraseña']; ?>" />
        </div>
        <input id="guardar" type="submit" name="guardar" value="Guardar" />
    </form>
</body>

</html>