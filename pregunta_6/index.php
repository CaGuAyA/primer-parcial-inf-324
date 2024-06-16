<?php include "inicio.php"; ?>
<?php include "db.php"; ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ci = $_POST['ci'];
    $sql = "SELECT * FROM director_bancario WHERE id_usuario_ci = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $ci);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                header("Location: ../pregunta_7/");
                exit();
            }
        } else {
            $sql1 = "SELECT * FROM cliente WHERE id_usuario_ci = ?";
            if ($stmt = $conn->prepare($sql1)) {
                $stmt->bind_param("i", $ci);
                $stmt->execute();
                $result = $stmt->get_result();
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        header("Location: cliente.php?ci=".$ci);
                        exit();
                    }
                } else {
                    echo "No se encontraron usuarios.";
                }
            }
        }

        $stmt->close();
    }
}
?>

<form action="" method="post">
    <label for="nombre">Ingrese su C.I.:</label><br>
    <input type="text" id="ci" name="ci"><br><br>

    <label for="apellido">Ingrese su Contraseña:</label><br>
    <input type="text" id="contraseña" name="contraseña"><br><br>

    <input id="button" type="submit" value="Enviar">
</form>

<?php include "fin.php"; ?>