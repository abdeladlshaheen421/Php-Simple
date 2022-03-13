<?php
session_start();
unset($_SESSION["UserName"]);
session_destroy();
header("Location: http://localhost:8080/php_files/PhpCourse/Day03/loginForm.php");