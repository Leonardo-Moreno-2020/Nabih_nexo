<?php include '../Template/header.php';?>

<?php
    include_once '../Conexion/conexion.php';
    $sentencia = $bd -> query("SELECT * FROM administrador");
    $administrador = $sentencia->fetchAll(PDO::FETCH_OBJ);
    //print_r($administrador);
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
                    <h3 class="text-center text-light bg-5">Administradores del sitio Web</h3>
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
        <strong>Registrado !</strong> Se agrego un administrador.
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
        <strong>Administrador-eliminado !</strong> Los registros fueron eliminados.
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
                    Lista de administradores
                </div>
                <div class="p-4">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Cedula</th>
                                <th scope="col">Nombres</th>
                                <th scope="col">Direccion</th>
                                <th scope="col">Telefono</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Profesion</th>
                                <th scope="col">Contraseña</th>
                                <th scope="col" colspan="2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php   
                                foreach($administrador as $dato){
                                    ?>
                              <tr> 
                               <td scope="row"><?php echo $dato->Id;?></td>
                                <td><?php echo $dato->Cedula;?></td>
                                <td><?php echo $dato->Nombres;?></td>
                                <td><?php echo $dato->Direccion;?></td>
                                <td><?php echo $dato->Telefono;?></td>
                                <td><?php echo $dato->Correo;?></td>
                                <td><?php echo $dato->Profesion;?></td>
                                <td><?php echo $dato->Contraseña;?></td>
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
                    Ingresar datos de administrador:
                </div>
                <form class="p-4" method="POST" action="registrar.php">
                    <div class="mb3">
                        <label class="form-label">Cedula:</label>
                        <input type="number" class="form-control" name="txtCedula" autofocus required> 
                    </div>
                    <div class="mb3">
                        <label class="form-label">Nombres:</label>
                        <input type="text" class="form-control" name="txtNombres" autofocus required>
                    </div>
                    <div class="mb3">
                        <label class="form-label">Direccion:</label>
                        <input type="text" class="form-control" name="txtDireccion" autofocus required>
                    </div>
                    <div class="mb3">
                        <label class="form-label">Telefono:</label>
                        <input type="number" class="form-control" name="txtTelefono" autofocus required>
                    </div>
                    <div class="mb3">
                        <label class="form-label">Correo:</label>
                        <input type="email" class="form-control" name="txtCorreo" autofocus required>
                    </div>
                    <div class="mb3">
                        <label class="form-label">Profesion:</label>
                        <input type="text" class="form-control" name="txtProfesion" autofocus required> 
                    </div>
                    <div class="mb3">
                        <label class="form-label">Contraseña:</label>
                        <input type="password" class="form-control" name="txtContraseña" autofocus required>
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