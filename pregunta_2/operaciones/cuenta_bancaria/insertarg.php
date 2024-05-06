<?php
include "../../conexion.inc.php";

$tipo = $_GET['tipo'];
$saldo = $_GET['saldo'];
$id_cuenta_bancaria = $_GET['id_cuenta_bancaria'];
$id_usuario_ci = $_GET['id_usuario_ci'];

$sql = "select * from cliente where id_usuario_ci=".$id_usuario_ci;
$resultado = mysqli_query($con, $sql);
$fila = mysqli_fetch_array($resultado);

$sql = "insert into cuenta_bancaria (`id_cliente`, `tipo`, `saldo`, `id_cuenta_bancaria`) value ('".$fila['id_cliente']."', '" . $tipo . "', " . $saldo . ", '" . $id_cuenta_bancaria . "')";
$resultado = mysqli_query($con, $sql);

$sql = "select * from cuenta_bancaria where id_cuenta_bancaria='" . $id_cuenta_bancaria . "'";
$resultado = mysqli_query($con, $sql);
$fila = mysqli_fetch_array($resultado);

$sql = "select * from cliente where id_cliente='" . $fila['id_cliente'] . "'";
$resultado = mysqli_query($con, $sql);
$fila = mysqli_fetch_array($resultado);

$sql = "select * from usuario where id_usuario_ci=" . $fila['id_usuario_ci'];
$resultado = mysqli_query($con, $sql);
$fila = mysqli_fetch_array($resultado);

header("location: ../../cuenta_bancaria/index.php?titular=" . $fila['nombre'] . " " . $fila['apellido_pat'] . " " . $fila['apellido_mat'] . "&id=" . $fila['id_usuario_ci']);