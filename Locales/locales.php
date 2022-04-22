<?php include '../Template/header.php';?>
<?php
require_once('../Conexion/Conexion_1.php');
?>

<?php
    include_once '../Conexion/conexion.php';
    $sentencia = $bd -> query("SELECT * FROM locales");
    $locales = $sentencia->fetchAll(PDO::FETCH_OBJ);
    //print_r($locales);
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
                    <h3 class="text-center text-light p3">Locales y representante</h3>
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
        <strong>Registrado !</strong> Se agrego un local.
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
        <strong>Local-eliminado !</strong> Los registros fueron eliminados.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
            }
    ?>

<!--FIN DE ALERTAS-->

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border border-info">
                <div class="card-header text-center fs-4 text-secondary">
                    Lista de locales y representante
                </div>
                <div class="p-4">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Representante</th>
                                <th scope="col">Local</th>
                                <th scope="col">Telefono</th>
                                <th scope="col">Direccion</th>
								<th scope="col">Id-técnico</th>
                                <th scope="col" colspan="2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php   
                                foreach($locales as $dato){
                                    ?>
                              <tr> 
                               <td scope="row"><?php echo $dato->Id;?></td>
                                <td><?php echo $dato->Representante;?></td>
                                <td><?php echo $dato->Local;?></td>
                                <td><?php echo $dato->Telefono;?></td>
                                <td><?php echo $dato->Direccion;?></td>
								<td class="text-center"><?php echo $dato->Id_tecnico;?></td>
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
                    Ingresar datos del local:
                </div>
                <form class="p-4" method="POST" action="registrar.php">
                    <div class="mb3">
                        <label class="form-label">Representante:</label>
                        <input type="text" class="form-control" name="txtRepresentante" autofocus required> 
                    </div>
                    <div class="mb3">
                        <label class="form-label">Local:</label>
                        <input type="text" class="form-control" name="txtLocal" autofocus required>
                    </div>
                    <div class="mb3">
                        <label class="form-label">Telefono:</label>
                        <input type="number" class="form-control" name="txtTelefono" autofocus required>
                    </div>
                    <div class="mb3">
                        <label class="form-label">Direccion:</label>
                        <input type="text" class="form-control" name="txtDireccion" autofocus required>
                    </div>
                            </br>
					 <!--Select-dinamico-->
                     <div>
                     <select class="form-control form-control-md" name="txtId_tecnico" class="form-group last mb-2" id="txtId_tecnico" required>
                     <option value="">Selecciona Técnico</option>
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