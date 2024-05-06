<?php include "inicio.php" ?>

<?php
include "conexion.inc.php";
$sql = "select * from cuenta_bancaria";
$resultado = mysqli_query($con, $sql);
?>

<table>
    <tr id="cabecera">
        <td>Id Cuenta Bancaria</td>
        <td>Id Cliente</td>
        <td>Tipo</td>
        <td>Saldo Bs.</td>
    </tr>
<?php
while ($fila = mysqli_fetch_array($resultado)) {
    echo "<tr id='cuerpo_tabla'>";
    echo "<td>".$fila['id_cuenta_bancaria']."</td>";
    echo "<td>".$fila['id_cliente']."</td>";
    echo "<td>".$fila['tipo']."</td>";
    echo "<td id='saldo'>".$fila['saldo']."</td>";
    echo "</tr>";
}
?>
</table>

<?php include "fin.php" ?>