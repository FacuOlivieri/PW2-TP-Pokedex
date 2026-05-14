
<div class="ms-auto d-flex flex-column align-items-end gap-2">
    <form action="validarAdmin.php" class="d-flex gap-2" method="post">
        <input type="text" class="form-control" placeholder="Usuario" name="username">
        <input type="password" class="form-control" placeholder="Password" name="password">
        <input class="btn btn-danger" type="submit" value="Ingresar">
    </form>

    <?php
    if (isset($_GET["campoVacio"])) {
        echo "<p class='login-warning'>
            <i class='bi bi-exclamation-circle'> </i>
            Ningun campo debe quedar vacio
        </p>";
    }

    if (isset($_GET["credencialesIncorrectas"])) {
        echo "<p class='login-warning'>
            <i class='bi bi-exclamation-circle'> </i>
            Usuario o contrase&ntilde;a incorrectos
        </p>";
    }
    ?>
</div>
</div>
</nav>
