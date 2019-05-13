<nav class="navbar navbar-expand-lg navbar-light static-top" style="background-color: rgba(165,165,165,0.5)">
        <a class="navbar-brand" href="index.php">
            <img src="resources/img/canvas.png" width="165" height="100" alt="">
        </a>
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav justify-content-center">
            <li class="nav-item btn-outline-secondary">
                <a class="nav-link" href="proyectos.php">Proyectos</a>
            </li>
            <li class="nav-item btn-outline-secondary">
                <a class="nav-link" href="inversores.php">Inversores</a>
            </li>
            <li class="nav-item btn-outline-secondary">
                <a class="nav-link" href="empresas.php">Empresarios</a>
            </li>
            <li class="nav-item btn-outline-secondary">
                <a class="nav-link" href="#">Servicios</a>
            </li>
            <li class="nav-item btn-outline-secondary">
                <a class="nav-link" href="#">Contacto</a>
            </li>
        </ul>
            <?php
                $usuarioLogeado = auth_user();
                // Si no estoy logeado, muestro los botones
                if (is_null($usuarioLogeado)) {
            ?>
        <ul class="navbar-nav flex-row ml-auto" style="align-items: center;">
            <li class="nav-item">
                <button type="button" class="btn btn-outline-dark btn-sm mr-2" onclick="location.href='login.php'">Login</button>
            </li>
            <li class="nav-item">
                <button type="button" class="btn btn-outline-dark btn-sm mr-2" onclick="location.href='registro.php'">Regístrate</button>
            </li>
            <?php
                } else {
            ?>
        <ul class="navbar-nav flex-column ml-auto" style="align-items: center;">
            <li class="nav-item">
                <h5>Bienvenido Sr/Sra '<?=$usuarioLogeado['nombre']?>'</h5>
            </li>
            <?php
                    if ($usuarioLogeado['inversor'] === 'empresario') {
                        ?>
                            <li class="nav-item">
                                <button type="button" class="btn btn-outline-dark btn-sm mr-2 ml-2" onclick="location.href='registroProyecto.php'">Registrar Proyecto</button>
                            </li>
            <?php
                    }
                }
            ?>
        </ul>
    </div>
</nav>
