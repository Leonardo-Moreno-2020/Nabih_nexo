<?php
require_once('./Conexion/Conexion_1.php');
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">

    <title>Registro Nabih</title>
  </head>
  <body>

  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('images/workspace.jpg');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <h3>Registro -<strong class="text-info"> NABIH</strong></h3>
            <p class="mb-4 text-dark">Creación de usuarios y credenciales de acceso</p>
            <form action="" method="POST">
              <div class="form-group first">
                <label class="text-dark" for="correo">Correo electrónico</label>
                <input type="text" class="form-control" placeholder="Escribe tucorreo@web.com" id="correo" name="correo">
              </div>
              <div class="form-group last mb-3">
                <label class="text-dark" for="contrasena">Contraseña</label>
                <input type="password" class="form-control" placeholder="Escribe tu contraseña" id="password" name="password">
              </div>
              <div class="form-group last mb-3">
                <label class="text-dark" for="celular">Celular</label>
                <input type="text" class="form-control" placeholder="Escribe tu numero de celular" id="movil" name="movil">
                <!--Select-dinamico-->
              </div>
              <select name="rol_id" class="form-group last mb-3 form-control form-control-md" id="rol_id" required>
              <option value="">Selecciona perfil de usuario</option>
              <?php
              $consulta=mysqli_query($mysqli,"SELECT*FROM roles");
              while ($perfiles = mysqli_fetch_row($consulta)) {
                  ?>
              <option value="<?php echo $perfiles[0] ?>"><?php echo $perfiles[1]?></option>
              <?php
              } ?>
              }
              ?>
              </select>
                <!--Fin-select-->
              <div class="d-flex mb-3 align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                  <input type="checkbox" checked="checked"/>
                  <div class="control__indicator"></div>
                </label>
                <span class="ml-auto"><a href="login.php" class="error">Inicia sesión</a></span> 
              </div>
               
              <input type="submit" name="submit" value="Enviar" class="btn btn-block btn-info">
            </form>
            <?php
              include("registrar.php");
            ?>
          </div>
        </div>
      </div>
    </div>  
  </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>