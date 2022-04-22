<?php
print_r($_POST);
if(!isset($_POST['Id'])){
    header('Location:asistencia.php?mensaje=error');
}
include '../Conexion/conexion.php';
$id = $_POST['Id'];
$comentarios = $_POST['txtComentarios'];
$contacto= $_POST['txtContacto'];
$visita= $_POST['txtVisita'];
$id_usuario= $_POST['txtId_usuario'];
$id_tecnico= $_POST['txtId_tecnico'];
$id_administrador= $_POST['txtId_administrador'];

$sentencia = $bd->prepare("UPDATE asistencia SET Comentarios=?, Contacto=?, Visita=?,Id_usuario=?, Id_tecnico=?, Id_administrador=? WHERE Id=?;");
$resultado = $sentencia->execute([$comentarios, $contacto, $visita, $id_usuario, $id_tecnico, $id_administrador,$id]);
if ($resultado === TRUE) {
    header('Location:asistencia.php?mensaje=editado');      
} else {
    header('Location:asistencia.php?mensaje=error');
} 
?>