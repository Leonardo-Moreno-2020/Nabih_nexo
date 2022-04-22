<?php
print_r($_POST);
if(!isset($_POST['Id'])){
    header('Location:administrador.php?mensaje=error');
}
include '../Conexion/conexion.php';
$id = $_POST['Id'];
$cedula = $_POST['txtCedula'];
$nombres= $_POST['txtNombres'];
$direccion= $_POST['txtDireccion'];
$telefono= $_POST['txtTelefono'];
$correo= $_POST['txtCorreo'];
$profesion= $_POST['txtProfesion'];
$contraseña= $_POST['txtContraseña'];

$sentencia = $bd->prepare("UPDATE administrador SET Cedula=?, Nombres=?, Direccion=?, Telefono=?, Correo=?, Profesion=?, Contraseña=? WHERE Id=?;");
$resultado = $sentencia->execute([ $cedula, $nombres, $direccion, $telefono, $correo, $profesion, $contraseña,$id]);
if ($resultado === TRUE) {
    header('Location:administrador.php?mensaje=editado');      
} else {
    header('Location:administrador.php?mensaje=error');
} 
?>