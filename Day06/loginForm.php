<?php
    if((isset($_COOKIE["email"])&&isset($_COOKIE["password"])))
    {   
        header("Location: home.php");
    }
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="login.css"> -->
    <link rel="stylesheet" href="register.css">
    <style>
    .container {
        width: 50%;
        margin: 50px auto;
    }

    .formElement {
        padding: 10px;
    }

    .container div:last-child {
        background-color: lightblue;

    }

    .formElement input[type="submit"] {
        background-color: #4BB543;

    }

    .formElement input[type="submit"]:hover {
        color: #4BB543;
        border: 2px solid #4BB543;
    }

    h3 {
        color: tomato;
        background-color: white;
        padding: 10px;
    }
    </style>
    <title>Sign In</title>
</head>

<body>
    <div class="nav">
        <div><a href="#">Home</a></div>
        <div><a href="#">Products</a></div>
        <div><a href="#">Users</a></div>
        <div><a href="#">Manual Order</a></div>
        <div><a href="#">Checks</a></div>
    </div>
    <div class="container">
        <h2>
            <center>Sign in</center>
        </h2>
        <?php 
            
                if(isset($_GET["error"]))
                {
                    echo "<h3 ><center>{$_GET["error"]}</center></h3>";
                }
                if(isset($_GET["reg"]))
                {
                    echo "<h3 style='color:green;'><center>You are Registered Successfully</center></h3>";
                }
            ?>

        <form action="userController.php" method="Post">

            <div class="formElement">
                <p>Email :</p>
                <input type="email" name="Email">
            </div>
            <div class="formElement">
                <p>Password :</p>
                <input type="password" name="password">
            </div>
            <div class="formElement">
                <input type="submit" name="SignIn" value="Login">
            </div>
        </form>
    </div>
</body>

</html>