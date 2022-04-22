<?php
print_r($_POST);
if(!isset($_POST['Id'])){
    header('Location:usuario.php?mensaje=error');
}
include '../Conexion/conexion.php';
$id = $_POST['Id'];
$cedula = $_POST['txtCedula'];
$nombres= $_POST['txtNombres'];
$direccion= $_POST['txtDireccion'];
$telefono= $_POST['txtTelefono'];
$correo= $_POST['txtCorreo'];
$profesion= $_POST['txtProfesion'];
$asistencia= $_POST['txtAsistencia'];

$sentencia = $bd->prepare("UPDATE usuario SET Cedula=?, Nombres=?, Direccion=?, Telefono=?, Correo=?, Profesion=?, Asistencia=? WHERE Id=?;");
$resultado = $sentencia->execute([ $cedula, $nombres, $direccion, $telefono, $correo, $profesion, $asistencia,$id]);
if ($resultado === TRUE) {
    header('Location:usuario.php?mensaje=editado');      
} else {
    header('Location:usuario.php?mensaje=error');
} 
?>