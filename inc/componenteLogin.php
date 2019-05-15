<div class="container">
    <div class="row">
        <div class="col-md-8 offset-2 form-container" id="sign-in-form-container">
            <h2 class="sign-in-heading text-center">Formulario de Autentificación</h2>
            <?php
            $usuario = auth_user();
            if ($usuario !== null) { ?>
                <h5 class="sign-in-heading alert-warning text-center">Ya estás logeado como '<?=$usuario['nombre']?>'</h5>
            <?php } ?>
            <form method="post" id="signInForm">
                <div class="form-group">
                    <label for="username">Identificador</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Usuario o Email" required />
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña" required />
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember_me"> Recuérdame
                    </label>
                </div>
                <div class="alert alert-danger alert-errors"></div>
                <button type="submit" class="btn btn-primary btn-lg btn-block">Sign In</button><hr />
                <p>Si no tienes cuenta, puedes registrar con el siguiente enlace.</p>
                <a href="#" id="sign-up-link">Formulario de Registro</a>
                <input type="hidden" name="_token" class="token-field" value="<?php echo isset($_SESSION["token"]) ? $_SESSION["token"] : ""; ?>" />
            </form>
        </div>
    </div>
</div>