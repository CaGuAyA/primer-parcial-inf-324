<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link href="./css/editar.css" rel="stylesheet" type="text/css">
</head>

<body>
    <h1>Ingresar datos de la cuenta</h1>

    <form id="editar_usuario" method="GET" action="insertarg.php">
        <?php
        include "../../conexion.inc.php";
        $titular = $_GET['titular'];
        $ci = $_GET['ci'];

        $sql = "select * from cliente where id_usuario_ci=" . $ci;
        $resultado = mysqli_query($con, $sql);
        $fila = mysqli_fetch_array($resultado);

        echo "Titular: ";
        echo "<input type='text' name='titular' value='" . $titular . "' disabled/>";
        echo "C.I.: ";
        echo "<input type='text' name='id_usuario_ci' value='" . $ci . "' disabled/>";
        echo "Id cliente: ";
        echo "<input type='text' name='id_cliente' value='".$fila['id_cliente']."' disabled/>";
        ?>
        <div>
            Tipo :
            <input type="text" name="tipo" value="" />
        </div>
        <div>
            Saldo:
            <input type="text" name="saldo" value="" />
        </div>
        <div>
            C.I. :
            <input type="text" name="id_usuario_ci" value="" />
        </div>
        <div>
            Id Cuenta Bancaria :
            <input type="text" name="id_cuenta_bancaria" value="" />
        </div>
        <input id="guardar" type="submit" name="guardar" value="Guardar" />
    </form>
</body>

</html>