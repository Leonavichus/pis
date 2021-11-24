<?php
setcookie("login", $_POST["login"], time() - 3600, "/");
header('Location: /login.php');
