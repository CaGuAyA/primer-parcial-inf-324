<?php
include "conexion.inc.php";

$tipo_departamento = $_GET['departamento'];

$query = "
    SELECT
        d.tipo AS departamento,
        SUM(CASE
            WHEN d.tipo = ? THEN 1 * monto
            ELSE monto
        END) AS monto_invertido
    FROM
        departamento d
    WHERE
        d.tipo = ?
    GROUP BY
        d.tipo;
";

if ($stmt = $con->prepare($query)) {
    $stmt->bind_param("ss", $tipo_departamento, $tipo_departamento);
    $stmt->execute();

    $result = $stmt->get_result();

    $data = $result->fetch_assoc();
    echo $data['departamento'];

    header("location: ./index.php?departamento=" . $data['departamento'] . "&monto_invertido=" . $data['monto_invertido']);
    ?>
    <h2>Datos del Departamento Seleccionado</h2>
    <table>
        <tr>
            <th>Departamento</th>
            <th>Monto Invertido</th>
        </tr>
        <?php
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['departamento'] . "</td>";
            echo "<td>" . $row['monto_invertido'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <?php

    $stmt->close();
} else {
    echo "Error al preparar la consulta: " . $con->error;
}

$con->close();
?>
