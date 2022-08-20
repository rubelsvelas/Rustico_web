<?php
include('conexion.php');
session_start();

if (isset($_POST['registro'])) {
   date_default_timezone_set('America/Guatemala');
    $fecha_actual=date("Y-m-d H:i:s"); 

    $nombre_usuario = $_POST['nombre_usuario'];
    $cargo = $_POST['cargo'];
    $password = $_POST['contraseña'];
    $password_confir = $_POST['confirmacion'];
    $password_hash = password_hash($password, PASSWORD_BCRYPT);
    $query = $connection->prepare("SELECT * FROM usuario WHERE nombre_usuario=:nombre_usuario");
    $query->bindParam("nombre_usuario", $nombre_usuario, PDO::PARAM_STR);
    $query->execute();

    if (empty($_POST['nombre_usuario']) && empty($_POST['contraseña'] && empty($_POST['confirmacion']))) {
      
        echo '<script>
              alert("Debe de llenar todos los campos"); 
              window.location = "../index"
              </script>';

    } elseif ($query->rowCount() > 0) {
       
        echo '<script>
              alert("Usuario Existente"); 
              window.location = "../vista_admin/g_user.php"
              </script>';

    } elseif ($_POST['contraseña'] == $_POST['confirmacion']) {

        if ($query->rowCount() == 0) {

          
            if($cargo=='Admin'){
             
                
            $query = $connection->prepare("INSERT INTO usuario (nombre_usuario, password, ss_date, id_rol) 
            VALUES ('$nombre_usuario', '$password_hash', '$fecha_actual', '1')");

            $result = $query->execute();

            if ($result) {
               
                echo '<script>
                      alert("Registro Existoso"); 
                      window.location = "../vista_secre/crear_ususario.php"
                      </script>';

            } else {
              
                echo '<script>
                      alert("Error al registrar"); 
                      window.location = "../vista_secre/crear_ususario.php"
                      </script>';
            }
        }elseif($cargo=='Restaurant'){
         
            $query = $connection->prepare("INSERT INTO usuario (nombre_usuario, password, ss_date, id_rol) 
            VALUES ('$nombre_usuario', '$password_hash', '$fecha_actual', '2')");
         $result = $query->execute();

            if ($result) {
               
                echo '<script>
                      alert("Registro Exitoso"); 
                      window.location = "../vista_secre/crear_ususario.php"
                      </script>';

            } else {
              
                echo '<script>
                      alert("Error al registrar"); 
                      window.location = "../vista_secre/crear_ususario.php"
                      </script>';
            }
        }

        }
         
        
     }else{
        echo '<script>
              alert("Contraseñas no coinciden"); 
              window.location = "../vista_secre/crear_ususario.php"
              </script>';
    }
}



?>