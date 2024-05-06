<?php
include "../../conexion.inc.php";

$id_usuario_ci = $_GET['id_usuario_ci'];
$nombre = $_GET['nombre'];
$apellido_pat = $_GET['apellido_pat'];
$apellido_mat = $_GET['apellido_mat'];
$fecha_nacimiento = $_GET['fecha_nacimiento'];
$contraseña = $_GET['contraseña'];

$sql = "update usuario set id_usuario_ci=".$id_usuario_ci.", nombre='".$nombre."', apellido_pat='".$apellido_pat."', apellido_mat='".$apellido_mat."', fecha_nacimiento='".$fecha_nacimiento."' , contraseña='".$contraseña."' where id_usuario_ci=".$id_usuario_ci;

$resultado = mysqli_query($con, $sql);

header("Location: ../../index.php");
?>