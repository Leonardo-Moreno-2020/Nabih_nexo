<?php
if(!isset($_GET['Id'])){
    header('Location:locales.php?mensaje=eliminado');   
    exit();
}
include '../Conexion/conexion.php';
$id = $_GET['Id'];
$consulta = $bd->prepare("DELETE FROM locales WHERE Id = ?;");
$resultado = $consulta->execute([$id]);

if ($resultado === TRUE) {
    header('Location:locales.php?mensaje=eliminado');
} else {
    # code...
    header('Location:locales.php?mensaje=error');
}
?>