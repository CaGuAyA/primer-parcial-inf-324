<?php
include "../../conexion.inc.php";

$id_usuario_ci = $_GET['id_usuario_ci'];
$nombre = $_GET['nombre'];
$apellido_pat = $_GET['apellido_pat'];
$apellido_mat = $_GET['apellido_mat'];
$fecha_nacimiento = $_GET['fecha_nacimiento'];
$contraseña = $_GET['contraseña'];
$id_cliente = $_GET['id_cliente'];

$sql = "insert into usuario (`id_usuario_ci`, `nombre`, `apellido_pat`, `apellido_mat`, `fecha_nacimiento`, `contraseña`) value (".$id_usuario_ci.", '".$nombre."', '".$apellido_pat."', '".$apellido_mat."', '".$fecha_nacimiento."', '".$contraseña."')";
$resultado = mysqli_query($con, $sql);

$sql = "insert into cliente (`id_usuario_ci`, `id_cliente`) value (".$id_usuario_ci.", '".$id_cliente."')";
$resultado = mysqli_query($con, $sql);

header("Location: ../../index.php");
?>