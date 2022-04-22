<?php
print_r($_POST);
if(!isset($_POST['Id'])){
    header('Location:locales.php?mensaje=error');
}
include '../Conexion/conexion.php';
$id = $_POST['Id'];
$representante = $_POST['txtRepresentante'];
$local= $_POST['txtLocal'];
$telefono= $_POST['txtTelefono'];
$direccion= $_POST['txtDireccion'];
$id_tecnico= $_POST['txtId_tecnico'];

$sentencia = $bd->prepare("UPDATE locales SET Representante=?, Local=?, Telefono=?, Direccion=?, Id_tecnico=? WHERE Id=?;");
$resultado = $sentencia->execute([$representante, $local, $telefono, $direccion, $id_tecnico, $id]);
if ($resultado === TRUE) {
    header('Location:locales.php?mensaje=editado');      
} else {
    header('Location:locales.php?mensaje=error');
} 
?>