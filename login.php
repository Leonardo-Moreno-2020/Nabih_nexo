<?php
    include_once'./Conexion/Conexion_2.php';

    if(isset($_GET['cerrar_sesion'])){
      session_unset();

      session_destroy();
    }
    if(isset($_SESSION['rol'])){
      switch($_SESSION['rol']){
            case 1:
                header('location:./Inicio/inicio.php');
              break;
            case 2:
                header('location:usuario.php');
              break;
            case 3:
                header('location:usuario.php');
              break;
            default:
      }
    }
    if(isset($_POST['correo'])&& isset($_POST['password'])){

      $correo = $_POST['correo'];
      $password = $_POST['password'];

      $db = new Database();
      $query = $db->connect()->prepare('SELECT*FROM usuarios WHERE correo = :correo AND password = :password');
      $query->execute(['correo'=> $correo, 'password'=>$password]);

      $row = $query->fetch(PDO::FETCH_NUM);
      if($row == true){
        //Validar rol
        $rol = $row[4];
        $_SESSION['rol']=$rol;

        switch($_SESSION['rol']){
          case 1:
              header('location:./Inicio/inicio.php');
            break;
          case 2:
              header('location:usuario.php');
            break;
          case 3:
              header('location:usuario.php');
            break;
          default:
    }

      }else{
        //no existe el usuario
        echo "HA OCURRIDO UN ERROR, INTENTE NUEVAMENTE.";
      }

    }
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

    <title>Login Nabih</title>
  </head>
  <body>

  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('images/workspace.jpg');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <h3>Inicio de sesión<strong class="text-info"> NABIH</strong></h3>
            <p class="mb-4 text-dark">Acceso al sistema de gestión, usuarios y credenciales.</p>
            <form action="" method="POST">
              <div class="form-group first">
                <label class="text-dark" for="username">Correo electrónico</label>
                <input type="text" class="form-control" placeholder="tucorreo@web.com" id="correo" name="correo">
              </div>
              <div class="form-group last mb-3">
                <label class="text-dark" for="password">Contraseña</label>
                <input type="password" class="form-control" placeholder="tu contrasena" id="password" name="password">
              </div>
              
              <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption checkbox-info">Remember me</span>
                  <input type="checkbox" checked="checked"/>
                  <div class="control__indicator"></div>
                </label>
                <span class="ml-auto"><a href="registro.php" class="error">No tienes cuenta?</a></span> 
              </div>

              <button type="submit" name="submit" class="btn btn-block btn-info">Ingresar</
            </form>
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