<?php include '../Template/header.php';?>
<?php
require_once('../Conexion/Conexion_1.php');
?>

<?php
    include_once '../Conexion/conexion.php';
    $sentencia = $bd -> query("SELECT * FROM asistencia");
    $asistencia = $sentencia->fetchAll(PDO::FETCH_OBJ);
    //print_r($asistencia);
?>
 <style>
      body{
        background-color: #69c5cf;
      }
      </style>
<div class="container-fluid bg-secondary">
        <div class="row">
            <div class="col-md">
                <header class="py-3">
                    <h3 class="text-center text-light bg-5">Asistencias, asignación y fecha de la visita, usuario, administrador y técnico.</h3>
                </header>
            </div>
        </div>
    </div>
<div class="container mt-5">
<div class="row">
<div class="col-md-12">

<!--INICIO DE ALERTAS-->
<?php
            if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta'){
                ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong>Debes diligenciar la totalidad de los campos.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
            }
    ?>   
    <?php
            if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado'){
                ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Registrado !</strong> Se agrego una asistencia.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
            }
    ?>
         <?php
            if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error'){
                ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Vuelve a intentarlo.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
            }
    ?>
           <?php
            if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado'){
                ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Cambio generado !</strong> Datos actualizados correctamente.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
            }
    ?>
       <?php
            if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado'){
                ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Asistencia-eliminada !</strong> Los registros fueron eliminados.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
            }
    ?>

<!--FIN DE ALERTAS-->

<a class="btn btn-danger" href="../reportes/reporte_asistencias.php" role="button">Reporte PDF</a>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border border-info">
                <div class="card-header text-center fs-4 text-secondary">
                    Lista de asistencias
                </div>
                <div class="p-4">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Comentarios</th>
                                <th scope="col">Contacto</th>
                                <th scope="col">Visita</th>
                                <th scope="col">Usuario</th>
                                <th scope="col">Técnico</th>
                                <th scope="col">Administrador</th>
                                <th scope="col" colspan="2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php   
                                foreach($asistencia as $dato){
                                    ?>
                              <tr> 
                               <td scope="row"><?php echo $dato->Id;?></td>
                                <td><?php echo $dato->Comentarios;?></td>
                                <td class="text-center"><?php echo $dato->Contacto;?></td>
                                <td><?php echo $dato->Visita;?></td>
                                <td class="text-center"><?php echo $dato->Id_usuario;?></td>
                                <td class="text-center"><?php echo $dato->Id_tecnico;?></td>
                                <td class="text-center"><?php echo $dato->Id_administrador;?></td>
                                <td><a class="text-success" href="editar.php?Id=<?php echo $dato->Id;?>"><i class="bi bi-pencil-square"></i></a></td>
                                <td><a onclick="return confirm('Estas seguro de eliminar?');" class="text-danger" href="eliminar.php?Id=<?php echo $dato->Id;?>"><i class="bi bi-trash-fill"></i></a></td>
                            </tr>
                            <?php
                                }   
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-0">
            <div class="card border border-info">
                <div class="card-header text-center fs-4 text-secondary">
                    Ingresar datos de asistencia:
                </div>
                <form class="p-4" method="POST" action="registrar.php">
                    <div class="mb3">
                        <label class="form-label">Comentarios:</label>
                        <input type="text" class="form-control" name="txtComentarios" autofocus required> 
                    </div>
                    <div class="mb3">
                        <label class="form-label">Contacto:</label>
                        <input type="text" class="form-control" name="txtContacto" autofocus required>
                    </div>
                    <div class="mb3">
                        <label class="form-label">Visita:</label>
                        <input type="Date" class="form-control" name="txtVisita" autofocus required>
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
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="bnt btn-primary" value="Registrar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!footer>

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