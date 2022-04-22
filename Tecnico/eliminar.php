<?php
if(!isset($_GET['Id'])){
    header('Location: tecnico.php?mensaje=eliminado');   
    exit();
}
include '../Conexion/conexion.php';
$id = $_GET['Id'];
$consulta = $bd->prepare("DELETE FROM tecnico WHERE Id = ?;");
$resultado = $consulta->execute([$id]);

if ($resultado === TRUE) {
    header('Location: tecnico.php?mensaje=eliminado');
} else {
    # code...
    header('Location: tecnico.php?mensaje=error');
}
?>
