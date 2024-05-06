<?php include "inicio.php" ?>

<?php
include "../conexion.inc.php";

$titular = $_GET['titular'];
$ci = $_GET['id'];

$sql = "select * from cliente where id_usuario_ci=" . $ci;
$resultado = mysqli_query($con, $sql);
$fila = mysqli_fetch_array($resultado);

$sql = "select * from cuenta_bancaria where id_cliente='" . $fila['id_cliente'] . "'";
$resultado = mysqli_query($con, $sql);

echo "Titular: " . $titular;
echo "<br>";
echo "C.I.: " . $ci;
?>

<table>
    <tr id="cabecera">
        <td>Id Cuenta Bancaria</td>
        <td>Id Cliente</td>
        <td>Tipo</td>
        <td>Saldo Bs.</td>
        <td>Operaciones</td>
    </tr>
    <?php
    while ($fila = mysqli_fetch_array($resultado)) {
        echo "<tr id='cuerpo_tabla'>";
        echo "<td>" . $fila['id_cuenta_bancaria'] . "</td>";
        echo "<td>" . $fila['id_cliente'] . "</td>";
        echo "<td>" . $fila['tipo'] . "</td>";
        echo "<td id='saldo'>" . $fila['saldo'] . "</td>";
        echo "<td>";
        echo "<a href='../operaciones/cuenta_bancaria/editar.php?id=" . $fila['id_cuenta_bancaria'] . "'>Editar</a>";
        echo " ";
        echo "<a href='../operaciones/cuenta_bancaria/eliminar.php?id=" . $fila['id_cuenta_bancaria'] . "'>Eliminar</a>";
        echo "</td>";
        echo "</tr>";
    }
    ?>
</table>
<?php
echo "<a href='../operaciones/cuenta_bancaria/insertar.php?titular=" . $titular . "&ci=" . $ci . "'>Ingresar Nueva Cuenta</a>";
echo "<a href='../'>Ir a Inicio</a>";

?>

<?php include "fin.php" ?>