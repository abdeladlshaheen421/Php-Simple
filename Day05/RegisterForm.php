<?php

    session_start();
    if(isset($_COOKIE["name"])&&isset($_SESSION["email"])&&isset($_SESSION["password"]))
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
    <link rel="stylesheet" href="register.css">
    <title>Document</title>
    <style>
    span {
        /* color: tomato; */
        font-weight: bold;
        font-size: 14px;
    }
    </style>
</head>

<body>
    <div class="nav">
        <div><a href="#">Home</a></div>
        <div><a href="#">Products</a></div>
        <div><a href="#">Users</a></div>
        <div><a href="#">Manual Order</a></div>
        <div><a href="#">Checks</a></div>
    </div>
    <?php 
        if(isset($_GET["error"]))
        {
            $err=json_decode($_GET["error"],true);
            // echo "error is found";
        }
    ?>
    <div class="container">
        <h2>
            <center>Registration Form</center>
        </h2>
        <form action="userController.php" method="post" enctype="multipart/form-data">
            <div class="formElement">
                <p>Name :</p>
                <input type="text" name="Name"><span><?php echo isset($err["name"])? $err["name"] : ""?></span>
            </div>
            <div class="formElement">
                <p>Email :</p>
                <input type="email" name="Email"><span><?php echo isset($err["email"])? $err["email"] : ""?></span>
            </div>
            <div class="formElement">
                <p>Password :</p>
                <input type="password" name="password">
            </div>
            <div class="formElement">
                <p>Confirm Password :</p>
                <input type="password"
                    name="confirmPassword"><span><?php echo isset($err["password"])? $err["password"] : ""?></span>
            </div>
            <div class="formElement">

                <p>Room Number :</p>
                <select name="roomNumber">
                    <option value="Application1">Application1</option>
                    <option value="Application2">Application2</option>
                    <option value="cloud">Cloud</option>
                </select><span><?php echo isset($err["roomNumber"])? $err["roomNumber"] : ""?></span>
                <!-- <input type="text" name="roomNumber"> -->
            </div>
            <div class="formElement">
                <p>Floor Number :</p>
                <input type="text"
                    name="floorNumber"><span><?php echo isset($err["floorNumber"])? $err["floorNumber"] : ""?></span>
            </div>
            <div class="formElement">
                <p>Profile Picture :</p>
                <input type="file" accept="image/*"
                    name="profilePicture"><span><?php echo isset($err["profilePic"])? $err["profilePic"] : "" ?></span>
            </div>
            <div class="formElement">
                <input type="submit" name="insertNewUser" value="Save">
                <input type="reset" value="Reset">
            </div>
        </form>
    </div>
</body>

</html>