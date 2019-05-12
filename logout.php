<?php
session_start();
session_unset();
session_destroy();
setcookie("cookie_usuario_logeado", "", time()-60*3600, "/");
header("Location: index.php");
