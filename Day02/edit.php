<?php
 $file="dbFile.txt";
 $contents = file($file);
 $line=$contents[$_POST["id"]];
 $updatedLine=$_POST["userFirstName"].":".$_POST["userLastName"].":".$_POST["userEmail"].":".$_POST["userGender"].PHP_EOL;
 $contents = str_replace($line,$updatedLine,$contents);
 file_put_contents($file, $contents);
 header("Location: http://localhost:8080/php_files/PhpCourse/Day02/server.php");