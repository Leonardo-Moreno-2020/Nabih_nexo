<?php include '../Template/header.php';?>
<?php
require_once('../Conexion/Conexion_1.php');
?>
<?php
if(!isset($_GET['Id'])){
header('Location:asistencia.php?mensaje=error');
exit();
} 
include_once '../Conexion/conexion.php';
$Id = $_GET['Id'];

$sentencia = $bd->prepare("SELECT * FROM asistencia WHERE Id = ?;");
$sentencia->execute([$Id]);
$asistencia = $sentencia->fetch(PDO::FETCH_OBJ);
//print_r($asistencia);
?>
<div class="container-fluid bg-info">
        <div class="row">
            <div class="col-md">
                <header class="py-3">
                    <h3 class="text-center">Editar datos de asistencia</h3>
                </header>
            </div>
        </div>
    </div>
<div class="container mt-5">
<div class="row">
<div class="col-md-12">

<body class="bg-secondary">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
        <div class="card border border-info">
                <div class="card-header text-center fs-4">
                    Editar asistencia:
                </div>
                <form class="p-4" method="POST" action="editarProceso.php">
                    <div class="mb3">
                        <label class="form-label">Comentarios:</label>
                        <input type="text" class="form-control" name="txtComentarios" required value="<?php echo $asistencia->Comentarios?>">
                    </div>
                    <div class="mb3">
                        <label class="form-label">Contacto:</label>
                        <input type="text" class="form-control" name="txtContacto" required value="<?php echo $asistencia->Contacto?>">
                    </div>
                    <div class="mb3">
                        <label class="form-label">Visita:</label>
                        <input type="Date" class="form-control" name="txtVisita" required value="<?php echo $asistencia->Visita?>">
                    </div>
                    </br>
                   <!--Select-dinamico-->
                   <div>
                     <select class="form-control form-control-md" name="txtId_usuario" class="form-group last mb-2" id="txtId_usuario" required>
                     <option value="">Selecciona usuario</option>
                     <?php
                     $consulta=mysqli_query($mysqli,"SELECT*FROM usuario");
                     while ($usuario = mysqli_fetch_row($consulta)) {
                     ?>
                     <option value="<?php echo $usuario[0] ?>"><?php echo $usuario[2]?></option>
                     <?php
                     } ?>
                     }
                     ?>
                     </select>
                     <!--Fin-select-->
                    </div>
                    </br>
                    <!--Select-dinamico-->
                    <div>
                     <select class="form-control form-control-md" name="txtId_tecnico" class="form-group last mb-2" id="txtId_tecnico" required>
                     <option value="">Selecciona técnico</option>
                     <?php
                     $consulta=mysqli_query($mysqli,"SELECT*FROM tecnico");
                     while ($tecnico = mysqli_fetch_row($consulta)) {
                     ?>
                     <option value="<?php echo $tecnico[0] ?>"><?php echo $tecnico[2]?></option>
                     <?php
                     } ?>
                     }
                     ?>
                     </select>
                     <!--Fin-select-->
                    </div>
                    </br>
                    <div>
                     <select class="form-control form-control-md" name="txtId_administrador" class="form-group last mb-2" id="txtId_administrador" required>
                     <option value="">Selecciona administrador</option>
                     <?php
                     $consulta=mysqli_query($mysqli,"SELECT*FROM administrador");
                     while ($administrador = mysqli_fetch_row($consulta)) {
                     ?>
                     <option value="<?php echo $administrador[0] ?>"><?php echo $administrador[2]?></option>
                     <?php
                     } ?>
                     }
                     ?>
                     </select>
                     <!--Fin-select-->
                    </div>              
                    </br>
                    <div class="d-grid">
                        <input type="hidden" name="Id" value="<?php echo $asistencia->Id?>">
                        <input type="submit" class="bnt btn-primary" value="Hecho">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>

<!--footer-->
</br></br></br>
<div class="container-fluid bg-light">
        <div class="row">
            <div class="col-md">
            <footer class="w-100 d-flex align-items justify-content-center flex-wrap">
            <p class="fs-5 px-3 pt-3">Prueba educativa de proyecto Nabih, SENA-Análisis y desarrollo de sistemas de información Bogotá 2022</p>
            <div id="iconos">
            <a href="https://www.facebook.com/leonardo.moreno.779205"><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-whatsapp"></i></a>
            <a href="https://www.instagram.com/winter_soldier2.0/"><i class="bi bi-instagram"></i></a>
        </div>
            </footer> 
        </div>
        </div>
    </div>
<div class="container mt-5">
<div class="row">
<div class="col-md-12">