<?php

print_r($_POST);
if(!isset($_POST['Id'])){
    header('Location:tecnico.php?mensaje=error');
}
include '../Conexion/conexion.php';
$id = $_POST['Id'];
$cedula = $_POST['txtCedula'];
$nombres = $_POST['txtNombres'];
$telefono = $_POST['txtTelefono'];
$correo = $_POST['txtCorreo'];
$local = $_POST['txtLocal'];
$contraseña = $_POST['txtContraseña'];

$sentencia = $bd->prepare("UPDATE tecnico SET Cedula=?, Nombres=?, Telefono=?, Correo=?,Local=?, Contraseña=? WHERE Id=?;");
$resultado = $sentencia->execute([$cedula,$nombres,$telefono,$correo,$local,$contraseña,$id]);
if ($resultado === TRUE) {
    header('Location:tecnico.php?mensaje=editado');      
} else {
    header('Location:tecnico.php?mensaje=error');
}

?>