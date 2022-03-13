<?php
    if(isset($_GET["id"])&&$_GET["id"]!=""){

        $file="dbFile.txt";
        $contents = file($file);
        $line=$contents[$_GET["id"]];
        $contents = str_replace($line,"",$contents);
        file_put_contents($file, $contents);
    }
    header("Location: http://localhost:8080/php_files/PhpCourse/Day02/server.php");