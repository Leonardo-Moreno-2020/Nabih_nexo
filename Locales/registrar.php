<?php include '../Template/header.php';?>
<div class="container-fluid bg-info">
        <div class="row">
            <div class="col-md">
                <header class="py-3">
                    <h3 class="text-center">Locales y representantes</h3>
                </header>
            </div>
        </div>
    </div>
<div class="container mt-5">
<div class="row">
<div class="col-md-12">

<?php
print_r($_POST);
if(empty($_POST["oculto"]) || empty($_POST["txtRepresentante"]) || empty($_POST["txtLocal"]) || empty($_POST["txtTelefono"]) || empty($_POST["txtDireccion"]) || empty($_POST["txtId_tecnico"])){
header('Location: locales.php?mensaje=faltan-datos');
exit();
}
include_once '../Conexion/conexion.php';
$representante = $_POST["txtRepresentante"];
$local = $_POST["txtLocal"];
$telefono = $_POST["txtTelefono"];
$direccion = $_POST["txtDireccion"];
$id_tecnico = $_POST["txtId_tecnico"];

$sentencia = $bd->prepare("INSERT INTO locales(Representante,Local,Telefono,Direccion,Id_tecnico) VALUES (?,?,?,?,?);"); 
$resultado = $sentencia->execute([$representante,$local,$telefono,$direccion,$id_tecnico]);

if ($resultado === TRUE) {
    header('Location:locales.php?mensaje=registrado');
} else {
    header('Location:locales.php?mensaje=error');
    exit();
}
?>