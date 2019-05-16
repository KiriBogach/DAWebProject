<?php
session_start();
session_unset();
session_destroy();
setcookie(COOKIE_USUARIO, "", time()-60*3600, "/");
header("Location: index.php");
