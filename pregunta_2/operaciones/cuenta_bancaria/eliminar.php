<?php
include "../../conexion.inc.php";
$id = $_GET["id"];

$sql = "select * from cuenta_bancaria where id_cuenta_bancaria='" . $id . "'";
$resultado = mysqli_query($con, $sql);
$fila = mysqli_fetch_array($resultado);

$sql = "select * from cliente where id_cliente='" . $fila['id_cliente'] . "'";
$resultado = mysqli_query($con, $sql);
$fila = mysqli_fetch_array($resultado);

$sql = "select * from usuario where id_usuario_ci=" . $fila['id_usuario_ci'];
$resultado = mysqli_query($con, $sql);
$fila = mysqli_fetch_array($resultado);

$sql = "delete from cuenta_bancaria where id_cuenta_bancaria='" . $id . "'";
$resultado = mysqli_query($con, $sql);

header("location: ../../cuenta_bancaria/index.php?titular=" . $fila['nombre'] . " " . $fila['apellido_pat'] . " " . $fila['apellido_mat'] . "&id=" . $fila['id_usuario_ci']);