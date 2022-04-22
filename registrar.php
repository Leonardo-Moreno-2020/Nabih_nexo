<?php
 include("./Conexion/Conexion_1.php");

if (isset($_POST['submit'])) {
    if (strlen($_POST['correo'])>=1 &&
    strlen($_POST['password'])>=1 &&
    strlen($_POST['movil'])>=1 &&
    strlen($_POST['rol_id'])>=1) {
        $correo = trim($_POST['correo']);
        $password = trim($_POST['password']);
        $movil = trim($_POST['movil']);
        $rol_id = trim($_POST['rol_id']);

        $pass_fuerte = password_hash($password,PASSWORD_DEFAULT);
        $consulta = "INSERT INTO usuarios(correo,password, movil, rol_id) VALUES ('$correo','$password','$movil','$rol_id')";
        $resultado = mysqli_query($mysqli, $consulta);
        
        if ($resultado) {
            ?>
            <div class="alert alert-primary" role="alert">
                Se ha registrado correctamente.
            </div>
            <?php
        } else {
            ?>
            <div class="alert alert-danger" role="alert">
                No se genero el registro intente de nuevo.
            </div>
            <?php
        }
    }else{
        ?>
            <div class="alert alert-warning" role="alert">
            Por favor complete los campos. 
            </div>
            <?php
    }
}
?>