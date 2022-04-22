<?php include '../Template/header.php';?>
<div class="container-fluid bg-info">
        <div class="row">
            <div class="col-md">
                <header class="py-3">
                    <h3 class="text-center">Registro de asistencia y asignación de técnico</h3>
                </header>
            </div>
        </div>
    </div>
<div class="container mt-5">
<div class="row">
<div class="col-md-12">

<?php
print_r($_POST);
if(empty($_POST["oculto"]) || empty($_POST["txtComentarios"]) || empty($_POST["txtContacto"]) || empty($_POST["txtVisita"]) || empty($_POST["txtId_usuario"]) || empty($_POST["txtId_tecnico"]) || empty($_POST["txtId_administrador"])){
header('Location: asistencia.php?mensaje=faltan-datos');
exit();
}
include_once '../Conexion/conexion.php';
$comentarios = $_POST["txtComentarios"];
$contacto = $_POST["txtContacto"];
$visita = $_POST["txtVisita"];
$id_usuario = $_POST["txtId_usuario"];
$id_tecnico = $_POST["txtId_tecnico"];
$id_administrador = $_POST["txtId_administrador"];

$sentencia = $bd->prepare("INSERT INTO asistencia(Comentarios,Contacto,Visita,Id_usuario,Id_tecnico,Id_administrador) VALUES (?,?,?,?,?,?);"); 
$resultado = $sentencia->execute([$comentarios,$contacto,$visita,$id_usuario,$id_tecnico,$id_administrador]);

if ($resultado === TRUE) {
    header('Location:asistencia.php?mensaje=registrado');
} else {
    header('Location:asistencia.php?mensaje=error');
    exit();
}
?>