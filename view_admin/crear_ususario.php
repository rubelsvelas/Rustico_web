<?php include('../templates/admin_header.php'); ?>
<title>Crear Usuario</title>
<?php include('../templates/dashboard_menu.php'); ?>
<!---------------------------------------------------------------------------------------------!-->

<div class="div_gen">
    <form class="frm_crear_u" method="POST" action="../db_conexion/usuario.php" enctype="multipart/form-data">
        <img src="../assets/images/OIP.png" alt="">
        <div class="alinear">
            <h2> Nombre de Usuario: </h2>
            <input type="text" name="nombre_usuario" value="" placeholder="Nombre de Usuario" required><br>
        </div>

        <div class="alinear">
        <h2>Cargo: </h2>
        <select name="cargo" required>
            <option>Admin</option>
            <option>Restaurant</option>
        </select>
        </div>
        <div class="alinear">
        <h2>Contraseña: </h2>
        <input type="password" name="contraseña" value="" placeholder="Contraseña" required><br>
        </div>
        <div class="alinear">
        <h2>Confirmación de contraseña: </h2>
        <input type="password" name="confirmacion" value="" placeholder="Confirmación de Contraseña" required><br><br>
        </div>

        <button type="submit" value="Registrar" name="registro">Registrar</button><br><br>
    </form>

</div>

<?php include('../templates/footer.php'); ?>
