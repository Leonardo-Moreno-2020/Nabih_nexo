<?php include '../Template/header.php';?>
<div class="container-fluid bg-info">
        <div class="row">
            <div class="col-md">
                <header class="py-3">
                    <h3 class="text-center">Técnicos registro y seguimiento</h3>
                </header>
            </div>
        </div>
    </div>
<?php
print_r($_POST);
if(empty($_POST["oculto"]) || empty($_POST["txtCedula"]) || empty($_POST["txtNombres"])|| empty($_POST["txtTelefono"]) || empty($_POST["txtCorreo"]) || empty($_POST["txtLocal"]) || empty($_POST["txtContraseña"])){
header('Location: tecnico.php?mensaje=faltan-datos');
exit();
}
include_once '../Conexion/conexion.php';
$cedula = $_POST["txtCedula"];
$nombres = $_POST["txtNombres"];
$telefono = $_POST["txtTelefono"];
$correo = $_POST["txtCorreo"];
$local = $_POST["txtLocal"];
$contraseña = $_POST["txtContraseña"];

$sentencia = $bd->prepare("INSERT INTO tecnico(Cedula,Nombres,Telefono,Correo,Local,Contraseña) VALUES (?,?,?,?,?,?);"); 
$resultado = $sentencia->execute([$cedula,$nombres,$telefono,$correo,$local,$contraseña]);

if ($resultado === TRUE) {
    header('Location:tecnico.php?mensaje=registrado');
} else {
    header('Location:tecnico.php?mensaje=error');
    exit();
}
?>