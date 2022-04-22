<?php include '../Template/header.php';?>
<div class="container-fluid bg-info">
        <div class="row">
            <div class="col-md">
                <header class="py-3">
                    <h3 class="text-center">Administradores del sitio Web</h3>
                </header>
            </div>
        </div>
    </div>
<div class="container mt-5">
<div class="row">
<div class="col-md-12">

<?php
print_r($_POST);
if(empty($_POST["oculto"]) || empty($_POST["txtCedula"]) || empty($_POST["txtNombres"]) || empty($_POST["txtDireccion"]) || empty($_POST["txtTelefono"]) || empty($_POST["txtCorreo"]) || empty($_POST["txtProfesion"]) || empty($_POST["txtContraseña"])){
header('Location: administrador.php?mensaje=faltan-datos');
exit();
}
include_once '../Conexion/conexion.php';
$cedula = $_POST["txtCedula"];
$nombres = $_POST["txtNombres"];
$direccion = $_POST["txtDireccion"];
$telefono = $_POST["txtTelefono"];
$correo = $_POST["txtCorreo"];
$profesion = $_POST["txtProfesion"];
$contraseña = $_POST["txtContraseña"];

$sentencia = $bd->prepare("INSERT INTO administrador(Cedula,Nombres,Direccion,Telefono,Correo,Profesion,Contraseña) VALUES (?,?,?,?,?,?,?);"); 
$resultado = $sentencia->execute([$cedula,$nombres,$direccion,$telefono,$correo,$profesion,$contraseña]);

if ($resultado === TRUE) {
    header('Location:administrador.php?mensaje=registrado');
} else {
    header('Location:administrador.php?mensaje=error');
    exit();
}
?>