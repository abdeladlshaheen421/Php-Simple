<?php 
    session_start();
    if((!isset($_COOKIE["name"]))&&!isset($_SESSION["email"])&&!isset($_SESSION["password"]))
    {
        header("Location: loginForm.php");
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css">
    <title>Home Page</title>
    <style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    .container {
        width: 80vw;
        background-color: lightblue;
        border-radius: 20px;
        text-align: center;
        margin: 50px auto;
    }

    .container p {
        padding: 10px;
        background-color: white;
        margin: 3px;
    }

    b {
        color: tomato;
    }

    table {
        width: 80%;
        margin: 50px auto;
        padding: 20px;
        font-size: 22px;
        font-family: monospace;
        border: 2px solid grey;
        border-radius: 25px;
        box-shadow: 4px 6px 15px lightblue, -4px -6px 15px lightblue;

    }



    table tr td:nth-child(5),
    table tr td:nth-child(6),
    table tr td:nth-child(7) {
        border: 0;
    }

    .edit,
    .delete,
    .show {
        color: white;
        padding: 2px;
        width: 100%;
        font-size: 18px;
        font-weight: bold;
        border-radius: 10px;
        text-decoration: none;
        transition: all 1s;
    }

    .edit:hover,
    .delete:hover,
    .show:hover {
        cursor: pointer;
        background-color: white;
        color: black;
    }


    .show {

        background-color: green;

    }

    .edit {

        background-color: blue;

    }

    .delete {
        background-color: red;
    }



    table td {
        border: 2px solid grey;
        text-align: center;
    }

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
        <div id="logout"><a href="userController.php">LogOut</a></div>
    </div>
    <?php
       echo " <h1><center>Welcome To Admin DashBoard </center></h1> ";
       $connection = "mysql:dbname=phptask;host=127.0.0.1;port=3306;";
        $dataBaseUser="root";
        $dataBasePassword="";
        try
        {
            $db = new PDO($connection,$dataBaseUser,$dataBasePassword);
            $query="select * from users;";
            $stat=$db->prepare($query);
            $res=$stat->execute();
            $allUsers=$stat->fetchAll();
            $tableOfUsers="<table >";
            $tableOfUsers.="<tr><th>user Name</th><th>Email</th><th>room Number</th><th>floor Number</th></tr>";
            foreach ($allUsers as $key) {
                $tableOfUsers.="<tr>";
                //$tableOfUsers.="<td><img src ' ".$key["profilePicture"]." ' /></td>";
                $tableOfUsers.="<td>".$key["userName"]."</td>";
                $tableOfUsers.="<td>".$key["email"]."</td>";
                $tableOfUsers.="<td>".$key["roomNumber"]."</td>";
                $tableOfUsers.="<td>".$key["floorNumber"]."</td>";

                $tableOfUsers.="<td><a class='show' href='userController.php?show_id=".$key["id"]."'>Show</a></td>";
                $tableOfUsers.="<td><a class='edit' href='userController.php?edit_id=".$key["id"]."'>Edit</a></td>";
                $tableOfUsers.="<td><a class='delete' href='userController.php?delete_id=".$key["id"]."'>Delete</a></td>";
                $tableOfUsers.="</tr>";
            }
            $tableOfUsers.="</table>";
            echo $tableOfUsers;
        }
        catch(PDOException $e)
        {
            echo "Sorry Connection Failed Please Check Your Connection <br>".$e->getMessage();
        }
    ?>
</body>

</html>