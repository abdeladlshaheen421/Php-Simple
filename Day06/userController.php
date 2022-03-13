<?php
    require("users.php");
    require("dataBaseController.php");
    
    dataBaseController::connectDataBase("phptask");
    $errors= array();

if(isset($_POST["insertNewUser"]))
{
    $newUser=new user();
    //============================Name Validation======================================//
    if(isset($_POST["Name"])&&$_POST["Name"]!=""&&!is_numeric($_POST["Name"])){
        $newUser->setUserName($_POST["Name"]);
    }
    else
        $errors["name"]="required and Must n't a Number ";

    //============================Email Validation======================================//
    //FILTER_VALIDATE_EMAIL
    //or using 
    $pattern="/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix";
    //and check it with function preg_match()
    if(isset($_POST["Email"])&&filter_var($_POST["Email"], FILTER_VALIDATE_EMAIL)&&preg_match($pattern,$_POST["Email"]))
    {
        $newUser->setUserEmail($_POST["Email"]);
    }
    else
        $errors["email"]="required Email Must a Valid Email";
    
    //============================Password Validation======================================//
    if(isset($_POST["password"])&&isset($_POST["confirmPassword"])&&($_POST["password"]==$_POST["confirmPassword"])!="")
    {
        $newUser->setUserPassword(md5($_POST["password"]));
    }
    else
        $errors["password"]="password doesn't match ";
    //============================floor Number Validation======================================//
    if(isset($_POST["floorNumber"])&&$_POST["floorNumber"]!=""&&is_numeric($_POST["floorNumber"]))
    {
        $newUser->setUserFloorNumber($_POST["floorNumber"]);
    }
    else
        $errors["floorNumber"]="required must be a Number";
    //======================================= room Number=======================================//
    if($_POST["roomNumber"]!="")
    {
        $newUser->setUserRoomNumber($_POST["roomNumber"]);
    }
    else
        $errors["floorNumber"]="required";

    //============================picture Validation======================================//

    if(isset($_FILES['profilePicture']))
    {
        $file_name = $_FILES['profilePicture']['name'];
        $file_tmp =$_FILES['profilePicture']['tmp_name'];
        if(isset($file_name)&&$file_name!="")
        {
            $file_ext=strtolower(pathinfo($file_name)["extension"]);
            $extensions= array("jpeg","jpg","png");
            if(in_array($file_ext,$extensions)=== false)
            {
                $errors["profilePic"]="required and ext should be jpg , png and jpeg ";
            }
            else
            {
                move_uploaded_file($file_tmp,"images/".$file_name);
                $newUser->setUserProfilePic("images/".$file_name);
            }
        }
        else
        {
            $errors["profilePic"]="required and ext should be jpg , png and jpeg ";
        }
    }
    if(count($errors)>0)
    {
        header("Location: RegisterForm.php?error=".json_encode($errors));
    }
    else
    {
        $newUser->validateCheckerAll();
        dataBaseController::insertToDataBase("users",["userName","email","userPassword","roomNumber","floorNumber","profilePicture"],$newUser->getRegisterData());
            
    }

}
else if(isset($_POST["SignIn"]))
{
    $newUser = new user();
    $newUser->setUserEmail($_POST["Email"]);
    $newUser->setUserPassword(md5($_POST["password"]));
    
    $dataOfUser=dataBaseController::login($newUser->getLoginData());
    
    if($dataOfUser)
    {      
        
        
        header("Location: home.php");
    }
    else
    {
        header("Location: loginForm.php?error=please enter valid name or password");
    }
}
else if(isset($_GET["show_id"]))
{
    if(isset($_COOKIE["email"])&&isset($_COOKIE["password"]))
    {       
        $userData=dataBaseController::fetchMyData($_GET['show_id']);  
        header("Location: show.php?userData=".json_encode($userData));
    }
    else
        header("Location: loginForm.php");
}
else if(isset($_GET["edit_id"]))
{
    if(isset($_COOKIE["email"])&&isset($_COOKIE["password"]))
    {       
        header("Location: editForm.php?id={$_GET['edit_id']}");
    }
    else
        header("Location: loginForm.php");
    
}
else if(isset($_POST["edit"]))
{
    $res=dataBaseController::updateMyData($_POST);
    if($res)
        header("Location: home.php");
    else
        echo "Data Can't be updated please check where is your Error! ";
             
}
else if(isset($_GET["delete_id"]))
{
    if(isset($_COOKIE["email"])&&isset($_COOKIE["password"]))
    { 
        $stmt=dataBaseController::deleteMyData($_GET["delete_id"]);
        if($stmt)
            header("Location: home.php");
        else
            echo "Data Can't be deleted please check where is your Error! ";
    }
    else
        header("Location: loginForm.php");
}
else{

    setcookie("email",$email,time()-3600);
    setcookie("password",$password,time()-3600);
    // unset($_COOKIE["email"]);
    // unset($_COOKIE["password"]);
    header("Location: loginForm.php");
}