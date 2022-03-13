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
        header("Location: http://localhost:8080/php_files/PhpCourse/Day03/RegisterForm.php");


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
        header("Location: http://localhost:8080/php_files/PhpCourse/Day03/RegisterForm.php");
    
    //============================Password Validation======================================//
    if(isset($_POST["password"])&&isset($_POST["confirmPassword"])&&($_POST["password"]==$_POST["confirmPassword"])!="")
    {
        $userPassword=$_POST["password"];
    }
    else
        header("Location: http://localhost:8080/php_files/PhpCourse/Day03/RegisterForm.php");

    //============================floor Number Validation======================================//
    if(isset($_POST["floorNumber"])&&$_POST["floorNumber"]!=""&&is_numeric($_POST["floorNumber"]))
    {
        $floorNumber=$_POST["floorNumber"];
    }
    else
        header("Location: http://localhost:8080/php_files/PhpCourse/Day03/RegisterForm.php");
    
    //============================picture Validation======================================//

    if(isset($_FILES['profilePicture']))
    {
        $errors= array();
        $file_name = $_FILES['profilePicture']['name'];
        $file_size =$_FILES['profilePicture']['size'];
        $file_tmp =$_FILES['profilePicture']['tmp_name'];
        $file_type=$_FILES['profilePicture']['type'];
        // get file name and extension
        $ext=explode('.',$file_name);
        $file_ext= pathinfo($file_name)["extension"];
        $extensions= array("jpeg","jpg","png");
        if(in_array($file_ext,$extensions)=== false)
        {
            header("Location: http://localhost:8080/php_files/PhpCourse/Day03/RegisterForm.php");
            exit;
        }
        else
            move_uploaded_file($file_tmp,"images/".$file_name);
        
    }
    else
    {
        header("Location: http://localhost:8080/php_files/PhpCourse/Day03/RegisterForm.php");
    }


    //================================ add new User ==========================================//
    $file="users.txt";
    $datbaseFile=fopen($file,"a");
    if($userName!=""&&$userEmail!=""&&$userPassword!=""&&$floorNumber!=0)
    {
        $row=$userName.":".$userEmail.":".md5($userPassword).":".$_POST["roomNumber"].":".$floorNumber.PHP_EOL;
        fwrite($datbaseFile,$row);
        echo "<h1><center>You are Regitered SucessFully <a href='loginForm.php'>Login</a></center></h1>";
    }
    fclose($datbaseFile);
    