<?php
include "../../conexion.inc.php";

$id_cuenta_bancaria = $_GET['id_cuenta_bancaria'];
$id_cliente = $_GET['id_cliente'];
$tipo = $_GET['tipo'];
$saldo = $_GET['saldo'];

$sql = "update cuenta_bancaria set id_cuenta_bancaria='" . $id_cuenta_bancaria . "', id_cliente='" . $id_cliente . "', tipo='" . $tipo . "', saldo=" . $saldo . " where id_cuenta_bancaria='" . $id_cuenta_bancaria . "'";
$resultado = mysqli_query($con, $sql);

$sql = "select * from cliente where id_cliente='" . $id_cliente . "'";
$resultado = mysqli_query($con, $sql);
$fila = mysqli_fetch_array($resultado);

$sql = "select * from usuario where id_usuario_ci=" . $fila['id_usuario_ci'];
$resultado = mysqli_query($con, $sql);
$fila = mysqli_fetch_array($resultado);

header("Location: ../../cuenta_bancaria/?titular=" . $fila['nombre'] . " " . $fila['apellido_pat'] . " " . $fila['apellido_mat'] . "&id=" . $fila['id_usuario_ci']);
