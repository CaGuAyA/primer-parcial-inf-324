<?php
$host = 'localhost';
$dbname = 'examen_1';
$username = 'root';
$password = 'Caguaya99';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "SELECT id_departamento, tipo AS departamento FROM departamento";

    $statement = $pdo->prepare($query);
    $statement->execute();

    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Montos por Departamento</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>

    <h2>Seleccionar Departamento</h2>

    <form action="consulta.php" method="get">
        <label for="departamento">Departamento:</label>
        <select name="departamento" id="departamento">
            <option value="">Seleccionar Departamento</option>
            <?php foreach ($results as $row) : ?>
                <option value="<?php echo $row['departamento']; ?>">
                    <?php echo $row['departamento']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <input type="submit" value="Mostrar Datos">
    </form>

    <?php

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "SELECT * FROM departamento";

        $statement = $pdo->prepare($query);
        $statement->execute();

        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error de conexión: " . $e->getMessage();
    }
    ?>
    <h2>Datos del Departamento Seleccionado</h2>
    <table>
        <tr>
            <th>ID Departamento</th>
            <th>Departamento</th>
            <th>Monto Invertido</th>
        </tr>
        <?php foreach ($results as $row) : ?>
            <tr>
                <td><?php echo $row['id_departamento']; ?></td>
                <td><?php echo $row['tipo']; ?></td>
                <td><?php echo $row['monto']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <h2>Monto disponible del departamento: <?php echo $_GET['departamento']?></h2>
    <table>
        <tr>
            <th>Departamento</th>
            <th>Monto Existente</th>
        </tr>
        <?php
            echo "<tr>";
            echo "<td>" . $_GET['departamento'] . "</td>";
            echo "<td>" . $_GET['monto_invertido'] . "</td>";
            echo "</tr>";
        ?>
    </table>
    <?php
    ?>
</body>

</html>