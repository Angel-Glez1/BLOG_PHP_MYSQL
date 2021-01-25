<form action="acciones/login/login.php" method="post">

    <h3>Credenciales requeridas</h3>
    <?php 
    if (isset($_SESSION['error'])) {
        echo "<p class='error'>$_SESSION[error]</p>";
        unset($_SESSION['error']);
    }
    ?>
    <div>
        <span>Usuario</span>
        <input type="email" name="email" placeholder="Email..." />
    </div>
    <div>
        <span>Contraseña</span>
        <input type="password" name="clave" placeholder="Password...">
    </div>
    <div>
        <input type="submit" class="left" value="Ingresar">
    </div>
</form>