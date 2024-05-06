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
    $sql = "select * from cuenta_bancaria where id_cuenta_bancaria='" . $id . "'";
    $resultado = mysqli_query($con, $sql);
    $fila = mysqli_fetch_array($resultado);
    echo $sql;
    ?>

    <h1>Actualizar datos de Cuenta</h1>

    <form id="editar_usuario" method="GET" action="editarg.php">
        <div>
            Id Cuenta Bancaria:
            <input type="text" name="id_cuenta_bancaria" value="<?php echo $fila['id_cuenta_bancaria']; ?>" />
        </div>
        <div>
            Id Cliente:
            <input type="text" name="id_cliente" value="<?php echo $fila['id_cliente']; ?>" />
        </div>
        <div>
            Tipo:
            <input type="text" name="tipo" value="<?php echo $fila['tipo']; ?>" />
        </div>
        <div>
            Saldo:
            <input type="text" name="saldo" value="<?php echo $fila['saldo']; ?>" />
        </div>
        <input id="guardar" type="submit" name="guardar" value="Guardar" />
    </form>
</body>

</html>