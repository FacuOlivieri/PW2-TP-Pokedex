<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-custom py-3">

    <div class="container d-flex align-items-center">

        <!-- LOGO -->
        <div class="d-flex align-items-center gap-3">

            <div class="logo-box">
                Logo
            </div>

            <h1 class="title m-0">
                Pokedex
            </h1>

        </div>

        <?php
        if (isset($_SESSION['Admin_Pokedex'])) {
            include("includes/frontLogout.php");
        } else {
            include("includes/frontLogin.php");
        }
        ?>

    </div>

</nav>
