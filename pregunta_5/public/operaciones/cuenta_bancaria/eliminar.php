<?php
include "../../conexion.inc.php";
$id = $_GET["id"];


$sql = "delete from cuenta_bancaria where id_cuenta_bancaria='" . $id . "'";
$resultado = mysqli_query($con, $sql);

echo "Eliminado con exito";