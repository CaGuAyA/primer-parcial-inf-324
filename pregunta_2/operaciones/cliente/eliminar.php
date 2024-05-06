<?php
include "../../conexion.inc.php";
$id = $_GET["id"];

$sql = "select * from cliente where id_usuario_ci=".$id;
$resultado = mysqli_query($con, $sql);
$fila = mysqli_fetch_array($resultado);

$sql = "delete from cuenta_bancaria where id_cliente='".$fila['id_cliente']."'";
$resultado = mysqli_query($con, $sql);

$sql = "delete from cliente where id_usuario_ci=".$id;
$resultado = mysqli_query($con, $sql);

$sql = "delete from usuario where id_usuario_ci=".$id;
$resultado = mysqli_query($con, $sql);

header("location: ../../index.php");
?>