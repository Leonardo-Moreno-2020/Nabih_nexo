<?php
if(!isset($_GET['Id'])){
    header('Location:usuario.php?mensaje=eliminado');   
    exit();
}
include '../Conexion/conexion.php';
$id = $_GET['Id'];
$consulta = $bd->prepare("DELETE FROM usuario WHERE Id = ?;");
$resultado = $consulta->execute([$id]);

if ($resultado === TRUE) {
    header('Location:usuario.php?mensaje=eliminado');
} else {
    # code...
    header('Location:usuario.php?mensaje=error');
}
?>