<?php require_once 'app/config.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AJAX Login</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <?php if (auth_user() !== null) { ?>
        <link href="css/dashboard.css" rel="stylesheet">
    <?php } ?>
</head>
<body>
<?php
if (auth_user() !== null) {
    require_once 'inc/dashboard.php';
} else { ?>
    <div class="form-container-wrapper">
        <?php require_once 'inc/componenteLogin.php'; ?>
        <?php require_once 'inc/componenteRegistro.php'; ?>
    </div>
<?php } ?>

<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="js/authentication.js"></script>

</body>
</html>