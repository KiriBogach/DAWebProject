<div class="container">
    <div class="row">
        <div class="col-md-8 offset-2 form-container" id="sign-up-form-container">
            <h2 class="sign-in-heading text-center">Formulario de Registro</h2>
            <?php
            $usuario = auth_user();
            if ($usuario !== null) { ?>
                <h5 class="sign-in-heading alert-warning text-center">Ya estás logeado como '<?=$usuario['nombre']?>'</h5>
            <?php } ?>
            <form method="post" id="signUpForm">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Name" required/>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email address"
                           required/>
                </div>

                <div class="form-group">
                    <label for="username">Usuario</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Username"
                           required/>
                </div>

                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password"
                           required/>
                </div>

                <hr>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="inversor" id="empresario"
                           value="empresario" required>
                    <label class="form-check-label" for="empresario">
                        Empresario
                    </label>
                </div>
                <hr>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="inversor" id="inversor"
                           value="inversor" required>
                    <label class="form-check-label" for="inversor">
                        Inversor
                    </label>
                </div>
                <hr>

                <div class="alert alert-success"></div>
                <div class="alert alert-danger alert-errors"></div>

                <button type="submit" class="btn btn-primary btn-lg btn-block">Registrar</button>
                <hr/>
                <p>Si tienes una cuenta, ingresa con el siguiente enlace.</p>
                <a href="#" id="sign-in-link">Login</a>
                <input type="hidden" name="_token" id="signup_token" class="token-field"
                       value="<?php echo isset($_SESSION["token"]) ? $_SESSION["token"] : ""; ?>"/>
            </form>

        </div>
    </div>
</div>