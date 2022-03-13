<?php

$file="users.txt";
$contents = file($file);
$usersArray=array();
//$userName="";

foreach($contents as $user)
{
    $userName=explode(":",$user)[0];
    $userEmail=explode(":",$user)[1];
    $userPassword=explode(":",$user)[2];
   array_push($usersArray,array($userEmail,$userPassword,$userName)) ;
}
if(isset($_COOKIE["email"])&&isset($_COOKIE["password"])&&isset($_SESSION["UserName"]))
{
    header("Location: http://localhost:8080/php_files/PhpCourse/Day03/home.php");
}
else
{
    session_start();
    if(isset($_POST["Email"])&&isset($_POST["password"])&&$_POST["password"]!=""&&filter_var($_POST["Email"],FILTER_VALIDATE_EMAIL))
    {
        foreach($usersArray as $user)
        {
            $email=$user[0];
            $passwd=$user[1];
            if($_POST["Email"]==$email&&md5($_POST["password"])==$passwd)
            {
                $_SESSION["UserName"]=$user[2];
                setcookie("email", $email, time()+3600, "/","", 0);
                setcookie("password", $passwd, time()+3600, "/", "", 0);
                header("Location: http://localhost:8080/php_files/PhpCourse/Day03/home.php");
                break;
            }
            
    
        }
    }
    else
                header("Location: http://localhost:8080/php_files/PhpCourse/Day03/loginForm.php");
}