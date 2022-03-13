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
    <link rel="stylesheet" href="register.css">
    <title>Document</title>
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
            var_dump($err);
        }
    ?>
    <div class="container">
        <h2>
            <center>Registration Form</center>
        </h2>
        <form action="userController.php" method="post" enctype="multipart/form-data">
            <div class="formElement">
                <p>Name :</p>
                <input type="text" name="Name"><?php ?>
            </div>
            <div class="formElement">
                <p>Email :</p>
                <input type="email" name="Email">
            </div>
            <div class="formElement">
                <p>Password :</p>
                <input type="password" name="password">
            </div>
            <div class="formElement">
                <p>Confirm Password :</p>
                <input type="password" name="confirmPassword">
            </div>
            <div class="formElement">

                <p>Room Number :</p>
                <select name="roomNumber">
                    <option value="Application1">Application1</option>
                    <option value="Application2">Application2</option>
                    <option value="cloud">Cloud</option>
                </select>
                <!-- <input type="text" name="roomNumber"> -->
            </div>
            <div class="formElement">
                <p>Floor Number :</p>
                <input type="text" name="floorNumber">
            </div>
            <div class="formElement">
                <p>Profile Picture :</p>
                <input type="file" accept="image/*" name="profilePicture">
            </div>
            <div class="formElement">
                <input type="submit" name="insertNewUser" value="Save">
                <input type="reset" value="Reset">
            </div>
        </form>
    </div>
</body>

</html>