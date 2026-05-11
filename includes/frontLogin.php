<h1 class="title m-0">Pokedex</h1>
</div>

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
            NingÃºn campo debe quedar vacÃ­o
        </p>";
    }

    if (isset($_GET["credencialesIncorrectas"])) {
        echo "<p class='login-warning'>
            <i class='bi bi-exclamation-circle'> </i>
            Usuario o contraseÃ±a incorrectos
        </p>";
    }
    ?>
</div>
</div>
</nav>
