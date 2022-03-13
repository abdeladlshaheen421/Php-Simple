<?php
    $userName="";
    $userEmail="";
    $userPassword="";
    $roomNumber="";
    $floorNumber=0;
    $profilePic="";
    //============================Name Validation======================================//
    if(isset($_POST["Name"])&&$_POST["Name"]!=""&&!is_numeric($_POST["Name"])){
        $userName=$_POST["Name"];
    }
    else
        header("Location: http://localhost:8080/php_files/PhpCourse/Day04/RegisterForm.php");


    //============================Email Validation======================================//
    //FILTER_VALIDATE_EMAIL
    //or using 
    $pattern="/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix";
    //and check it with function preg_match()
    if(isset($_POST["Email"])&&filter_var($_POST["Email"], FILTER_VALIDATE_EMAIL)&&preg_match($pattern,$_POST["Email"]))
    {
        $userEmail=$_POST["Email"];
    }
    else
        header("Location: http://localhost:8080/php_files/PhpCourse/Day04/RegisterForm.php");
    
    //============================Password Validation======================================//
    if(isset($_POST["password"])&&isset($_POST["confirmPassword"])&&($_POST["password"]==$_POST["confirmPassword"])!="")
    {
        $userPassword=$_POST["password"];
    }
    else
        header("Location: http://localhost:8080/php_files/PhpCourse/Day04/RegisterForm.php");

    //============================floor Number Validation======================================//
    if(isset($_POST["floorNumber"])&&$_POST["floorNumber"]!=""&&is_numeric($_POST["floorNumber"]))
    {
        $floorNumber=$_POST["floorNumber"];
    }
    else
        header("Location: http://localhost:8080/php_files/PhpCourse/Day04/RegisterForm.php");
    
    //============================picture Validation======================================//

    if(isset($_FILES['profilePicture']))
    {
        $errors= array();
        $file_name =  $_FILES['profilePicture']['name'];
        $file_size =  $_FILES['profilePicture']['size'];
        $file_tmp  =  $_FILES['profilePicture']['tmp_name'];
        $file_type =  $_FILES['profilePicture']['type'];
        // get file name and extension
        $ext=explode('.',$file_name);
        $file_ext= pathinfo($file_name)["extension"];
        $extensions= array("jpeg","jpg","png");
        if(in_array($file_ext,$extensions)=== false)
        {
            header("Location: http://localhost:8080/php_files/PhpCourse/Day04/RegisterForm.php");
            exit;
        }
        else
        {
            // this function take 2 param  (from , to)
            move_uploaded_file($file_tmp,"images/".$file_name);
            $profilePic="images/".$file_name;
        }
        
    }
    else
    {
        header("Location: http://localhost:8080/php_files/PhpCourse/Day04/RegisterForm.php");
    }
    //============================ room Number ===============================================//
    if(isset($_POST["roomNumber"]))
    {
        $roomNumber=$_POST["roomNumber"];
    }

    //================================ add new User ==========================================//
    $connection = "mysql:dbname=phptask;host=127.0.0.1;port=3306;";
    $dataBaseUser="root";
    $dataBasePassword="";

    try
    {   
        $db = new PDO($connection,$dataBaseUser,$dataBasePassword);
        if($userName!=""&&$userEmail!=""&&$userPassword!=""&&$floorNumber!=0&&$profilePic!=""&&$roomNumber!="")
        {
            $query="insert into users (userName,email,userPassword,roomNumber,floorNumber,profilePicture) values (?,?,?,?,?,?)";
            $stmt=$db->prepare($query);
            $newUser=array($userName,$userEmail,md5($userPassword),$roomNumber,$floorNumber,$profilePic);
            $stmt->execute($newUser);
            echo "hiiiiiiiiiiiiiiiii";
            $result=$stmt->rowCount();
            if($result>0)
                header("Location: http://localhost:8080/php_files/PhpCourse/Day04/home.php");
            else
                echo "Data Can't be iserted please check where is your Error! ";
        }
    }
    catch(PDOException $e)
    {
        echo "Sorry Connection Failed Please Check Your Connection <br>".$e->getMessage();
    }
    
    
    