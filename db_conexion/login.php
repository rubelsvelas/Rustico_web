<?php

use LDAP\Result;

include('conexion.php');
session_start();

if (isset($_POST['inicio'])) {

    date_default_timezone_set('America/Guatemala');
    $fecha_actual = date("Y-m-d H:i:s");
    $nombre_usuario = $_POST['nombre_usuario'];
    $password = $_POST['password'];

    $query = $connection->prepare("SELECT * FROM usuario WHERE nombre_usuario='$nombre_usuario'");
    $query->execute();

    $result = $query->fetch(PDO::FETCH_ASSOC);

    if (!$result) {
        echo '<script>
              alert("Usuario Incorrecto");
              window.location = "../index.php";
              </script>';
    } else {
        if (password_verify($password, $result['password'])) {
            $_SESSION['rol'] = $result['id_rol'];
            if ($_SESSION['rol'] == 1) {
                $id = urldecode($result['id_usuario']);
                echo '<script>
                      window.location = "../view_admin/inicio.php"
                      </script>';
                $query = $connection->prepare("UPDATE usuario SET ss_date='$fecha_actual' WHERE id_usuario='$id'");
                $query->execute();
            } elseif ($_SESSION['rol'] == 2) {
                $id = urldecode($result['id_usuario']);
                echo '<script>
                      window.location = "../view_restaurant/inicio_r.php"
                      </script>';
                $query = $connection->prepare("UPDATE usuario SET fecha_sesion='$fecha_actual' WHERE id_usuario='$id'");
                $query->execute();
            }
        } else {
            echo '<script>
            alert("Contraseña Incorrecta"); 
            window.location = "../index.php"
            </script>';
        }
    }
}
