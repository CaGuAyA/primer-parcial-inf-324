<?php include "inicio.php" ?>

<?php
include "conexion.inc.php";
$sql = "select * from usuario";
$resultado = mysqli_query($con, $sql);
?>

<table>
    <tr id="cabecera">
        <td>C.I.</td>
        <td>Nombre</td>
        <td>Apellido Paterno</td>
        <td>Apellido Materno</td>
        <td>Fecha de Nacimiento</td>
        <td>Cuentas Bancarias</td>
        <td>Operaciones</td>
    </tr>
<?php
while ($fila = mysqli_fetch_array($resultado)) {
    echo "<tr id='cuerpo_tabla'>";
    echo "<td>".$fila['id_usuario_ci']."</td>";
    echo "<td>".$fila['nombre']."</td>";
    echo "<td>".$fila['apellido_pat']."</td>";
    echo "<td>".$fila['apellido_mat']."</td>";
    echo "<td>".$fila['fecha_nacimiento']."</td>";
    echo "<td>
            <a href='./cuenta_bancaria/?id=".$fila['id_usuario_ci']."&titular=".$fila['nombre'].' '.$fila['apellido_pat'].' '.$fila['apellido_mat']."&ci=".$fila['id_usuario_ci']."'>Ir a Cuentas Bancarias</a>
         </td>";
    echo "<td>";
        echo "<a href='./operaciones/cliente/editar.php?id=".$fila['id_usuario_ci']."'>Editar</a>";
        echo " ";
        echo "<a href='./operaciones/cliente/eliminar.php?id=".$fila['id_usuario_ci']."'>Eliminar</a>";
    echo "</td>";
    echo "</tr>";
}
?>
</table>
<a href="./operaciones/cliente/insertar.php">Ingresar nuevo cliente</a>

<?php include "fin.php" ?>