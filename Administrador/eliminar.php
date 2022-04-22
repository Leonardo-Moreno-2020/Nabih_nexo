<?php
if(!isset($_GET['Id'])){
    header('Location:administrador.php?mensaje=eliminado');   
    exit();
}
include '../Conexion/conexion.php';
$id = $_GET['Id'];
$consulta = $bd->prepare("DELETE FROM administrador WHERE Id = ?;");
$resultado = $consulta->execute([$id]);

if ($resultado === TRUE) {
    header('Location:administrador.php?mensaje=eliminado');
} else {
    # code...
    header('Location:administrador.php?mensaje=error');
}
?>