<?php
     $connection = "mysql:dbname=phptask;host=127.0.0.1;port=3306;";
     $dataBaseUser="root";
     $dataBasePassword="";
     $userName="";
     $userEmail="";
     $roomNumber="";
     $floorNumber=0;
     //////// room Number
     if(isset($_POST["roomNumber"]))
    {
        $roomNumber=$_POST["roomNumber"];
    }
    /////////// floor Number
    if(isset($_POST["floorNumber"])&&$_POST["floorNumber"]!=""&&is_numeric($_POST["floorNumber"]))
    {
        $floorNumber=$_POST["floorNumber"];
    }
    else
        header("Location: http://localhost:8080/php_files/PhpCourse/Day04/editForm.php?id=".$_POST["id"]);
    ////////////// email
    if(isset($_POST["userEmail"])&&filter_var($_POST["userEmail"], FILTER_VALIDATE_EMAIL))
    {
        $userEmail=$_POST["userEmail"];
    }
    else
        header("Location: http://localhost:8080/php_files/PhpCourse/Day04/editForm.php?id=".$_POST["id"]);
    
    // user Name
    if(isset($_POST["userName"])&&$_POST["userName"]!=""&&!is_numeric($_POST["userName"])){
        $userName=$_POST["userName"];
    }
    else
        header("Location: http://localhost:8080/php_files/PhpCourse/Day04/editForm.php?id=".$_POST["id"]);

    
     try
     {   
         $db = new PDO($connection,$dataBaseUser,$dataBasePassword);
             $query="update users set userName = ? , email = ? , roomNumber = ? , floorNumber = ? where id = ? ;";
             $stmt=$db->prepare($query);
             $userUpdatedData=array($userName,$userEmail,$roomNumber,$floorNumber,$_POST["id"]);
             if(isset($_POST["id"]))
             {
                $res=$stmt->execute($userUpdatedData);
                if($res)
                    header("Location: http://localhost:8080/php_files/PhpCourse/Day04/home.php");
                else
                    echo "Data Can't be updated please check where is your Error! ";
             }
               
            else
                exit;
             
             
         }
    
     catch(PDOException $e)
     {
         echo "Sorry Connection Failed Please Check Your Connection <br>".$e->getMessage();
     }