<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css">
    <title>Home Page</title>
    <style>
    body {
        background-image: linear-gradient(to bottom, white, lightblue, white);
    }

    h1 {
        background-image: linear-gradient(to right, white, lightpink, lightblue, lightgrey);
        padding: 10px;
        margin-top: 0;
    }

    #logout {
        background-color: #df4759;
        border: 2px solid white;

    }

    #logout a {
        color: white;
    }

    #logout a:hover {
        color: #df4759;
    }

    #logout:hover {
        background-color: white;
        border: 2px solid #df4759;

    }
    </style>
</head>

<body>
    <div class="nav">
        <div><a href="home.php">Home</a></div>
        <div><a href="#">Products</a></div>
        <div><a href="#">Users</a></div>
        <div><a href="#">Manual Order</a></div>
        <div><a href="#">Checks</a></div>
        <div id="logout"><a href="logout.php">LogOut</a></div>
    </div>
    <?php
        session_start();
        if(!isset($_SESSION["UserName"]))
        {
            header("Location: http://localhost:8080/php_files/PhpCourse/Day03/loginForm.php");
        }
       echo " <h1><center>Welcome , ".$_SESSION["UserName"]."</center></h1> ";
    ?>
</body>

</html>