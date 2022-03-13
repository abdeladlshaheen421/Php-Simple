<?php
function validateChecker($str)
{
    $str=trim($str);
    $str=stripslashes($str);
    $str=htmlspecialchars($str);
    return $str;
}
$errors= array();
try{
    $connection=new pdo("mysql:dbname=phptask;host=localhost;","root","");
}
catch(PDOException $e)
{
    $e->printMessage();
}
if(isset($_POST["insertNewUser"]))
{
    //============================Name Validation======================================//
    if(isset($_POST["Name"])&&$_POST["Name"]!=""&&!is_numeric($_POST["Name"])){
        $userName=validateChecker($_POST["Name"]);
    }
    else
        $errors["name"]=" required  Must n't a Number ";
    
    //============================Email Validation======================================//
    //FILTER_VALIDATE_EMAIL
    //or using 
    $pattern="/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix";
    //and check it with function preg_match()
    if(isset($_POST["Email"])&&filter_var($_POST["Email"], FILTER_VALIDATE_EMAIL)&&preg_match($pattern,$_POST["Email"]))
    {
        $userEmail=validateChecker($_POST["Email"]);
    }
    else
        $errors["email"]="required Email Must a Valid Email";
    
    //============================Password Validation======================================//
    if(isset($_POST["password"])&&isset($_POST["confirmPassword"])&&($_POST["password"]==$_POST["confirmPassword"])!="")
    {
        $userPassword=md5(validateChecker($_POST["password"]));
    }
    else
        $errors["password"]="password doesn't match ";

    //============================floor Number Validation======================================//
    if(isset($_POST["floorNumber"])&&$_POST["floorNumber"]!=""&&is_numeric($_POST["floorNumber"]))
    {
        $floorNumber=validateChecker($_POST["floorNumber"]);
    }
    else
        $errors["floorNumber"]="required  must be a Number";
    //======================================= room Number=======================================//
    if($_POST["roomNumber"]!="")
    {
        $roomNumber=$_POST["roomNumber"];
    }
    else
        $errors["floorNumber"]="required";

    //============================picture Validation======================================//

    if(isset($_FILES['profilePicture']))
    {
        $file_name = $_FILES['profilePicture']['name'];
        $file_tmp =$_FILES['profilePicture']['tmp_name'];
        // get file name and extension
        $file_ext=strtolower(pathinfo($file_name)["extension"]);
        $extensions= array("jpeg","jpg","png");
        if(in_array($file_ext,$extensions)=== false)
        {
            $errors["profilePic"]="required  ext should be jpg , png and jpeg ";
        }
        else
            move_uploaded_file($file_tmp,"images/".$file_name);
        
    }
    if(count($errors)>0)
    {
        //var_dump($errors);
        header("Location: RegisterForm.php?error=".json_encode($errors));
    }
    else
    {
        $stmt=$connection->prepare("insert into users (userName,email,userPassword,roomNumber,floorNumber,profilePicture) values(?,?,?,?,?,?)");
        $data=$stmt->execute([$userName,$userEmail,$userPassword,$roomNumber,$floorNumber,"images/".$file_name]);
        if($stmt->rowCount()>0)
        {
            setcookie("name",$userName);
            session_start();
            $_SESSION["email"]=$userEmail;
            $_SESSION["password"]=$userPassword;
            header("Location: home.php");
        }
        else
            echo "error in sql coode";
            
    }

}
else if(isset($_POST["SignIn"]))
{
    
    $stm=$connection->prepare("select * from users where email = ? and userPassword = ?");
    $data=$stm->execute([$_POST["Email"],md5($_POST['password'])]);
    
    $dataOfUser=$stm->fetch(PDO::FETCH_ASSOC);
    var_dump($dataOfUser);
    if($dataOfUser)
    {
        
        setcookie("name",$dataOfUser["userName"]);
            session_start();
            $_SESSION["email"]=$dataOfUser["email"];
            $_SESSION["password"]=$dataOfUser["userPassword"];
            header("Location: home.php");
    }
    else
    {
        $errors["auth"]="please enter a valid email or Password";
        var_dump($errors);
        header("Location: loginForm.php?error=".json_encode($errors));
    }
    
    
    

}
else if(isset($_GET["show_id"]))
{
    $dataOFUserObject=$connection->query("select * from users where id={$_GET['show_id']}");
    $rowOfUserData=$dataOFUserObject->fetch(PDO::FETCH_ASSOC);
    header("Location: show.php?userData=".json_encode($rowOfUserData));
}
else if(isset($_GET["edit_id"]))
{
    header("Location: editForm.php?id={$_GET['edit_id']}");
}
else if(isset($_POST["edit"]))
{
    $query="update users set userName = ? , email = ? , roomNumber = ? , floorNumber = ? where id = ? ;";
             $stmt=$connection->prepare($query);
             $userUpdatedData=array($_POST["userName"],$_POST["userEmail"],$_POST["roomNumber"],$_POST["floorNumber"],$_POST["id"]);
             if(isset($_POST["id"]))
             {
                $res=$stmt->execute($userUpdatedData);
                if($res)
                    header("Location: home.php");
                else
                    echo "Data Can't be updated please check where is your Error! ";
             }
}
else if(isset($_GET["delete_id"]))
{
            $query="delete from users where id = ? ;";
             $stmt=$connection->prepare($query);
             if(isset($_GET["delete_id"])){
                $res=$stmt->execute([$_GET["delete_id"]]);
                if($res)
                    header("Location: home.php");
                else
                    echo "Data Can't be iserted please check where is your Error! ";
             }
}
else{

    session_start();
    session_unset();
    $_SESSION=NULL;
    unset($_SESSION["email"]);
    unset($_SESSION["password"]);
    unset($_COOKIE["name"]);
    session_destroy();
    // echo $_SESSION["email"];
    // var_dump($_SESSION);

    header("Location: loginForm.php");
}