<?php
if(!isset($_GET['Id'])){
    header('Location:asistencia.php?mensaje=eliminado');   
    exit();
}
include '../Conexion/conexion.php';
$id = $_GET['Id'];
$consulta = $bd->prepare("DELETE FROM asistencia WHERE Id = ?;");
$resultado = $consulta->execute([$id]);

if ($resultado === TRUE) {
    header('Location:asistencia.php?mensaje=eliminado');
} else {
    # code...
    header('Location:asistencia.php?mensaje=error');
}
?>