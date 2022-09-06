<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rústico Garcia's Pizzería</title>
    <link rel="icon" href="./assets/logo_rustico.jpg">
    <link rel="stylesheet" href="./css/style1.css">
</head>

<body>
    <div class="login" align="center">
        <div class="into">
            <img width="350px" src="./assets/logo_rustico1.jpg" alt="logo_rustico">
            <form method="POST" action="./db_conexion/login.php" enctype="multipart/form-data">
                <h2>Iniciar Sesión</h2>
                <input type="text" name="nombre_usuario" value="" placeholder="Nombre de Usuario" require><br>
                <input type="password" name="password" value="" placeholder="Contraseña" require><br>
                <button type="submit" name="inicio">Ingresar</button>
            </form>
        </div>
    </div>
</body>

</html>