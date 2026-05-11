
<!-- CONTENEDOR LOGIN -->
        <div class="d-flex flex-column align-items-end ms-auto">
        </div>
        <h1 class="title m-0">Pokedex</h1>
        </div>
            <!-- FORM -->
            <form action="../validarAdmin.php" class="d-flex gap-2" method="post">
                <input type="text" class="form-control" placeholder="Usuario" name="username">
                <input type="password" class="form-control" placeholder="Password" name="password">
                <input class="btn btn-danger" type="submit" value="Ingresar">
            </form>

            <?php
            //$userid = uniqid("user_",true);

            //setcookie("adminPokemon",$userid,time()+3600);

            if (isset($_GET["campoVacio"])) {

                echo "<p class='login-warning'>
                    <i class='bi bi-exclamation-circle'> </i>
                    Ningún campo debe quedar vacío
                </p>";
            }
            if (isset($_GET["credencialesIncorrectas"])) {

                echo "<p class='login-warning'>
                    <i class='bi bi-exclamation-circle'> </i>
                    Usuario o contraseña incorrectos
                </p>";
            }
            ?>
        </div>
    </div>
</nav>
