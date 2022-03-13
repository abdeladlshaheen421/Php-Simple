<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Server</title>
    <style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    .container {
        width: 50vw;
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
    </style>
</head>

<body>
    <h1>
        <center>Server Data</center>
    </h1>
    <div class="container">
        <?php 
            if((isset($_POST["userFirstName"])|| isset($_POST["userLastName"])))
            {
                    if((!is_numeric($_POST["userFirstName"])&&!is_numeric($_POST["userLastName"])) && ($_POST["userLastName"]!=""&&$_POST["userFirstName"]!=""))
                        echo "<p><b>User name is :  ".($_POST["userGender"]=="male"?"Mr . ":"Mrs . ")."</b> is \t\t:".$_POST["userFirstName"]."  ".$_POST["userLastName"]."</p>";
                    else
                        header("Location: http://localhost:8080/php_files/PhpCourse/Day01/Form.php");
            }
            // else
            //     header("Form.php");
            if(isset($_POST["userAddress"]))
            {
                if(!is_numeric($_POST["userAddress"])&&$_POST["userAddress"]!="")
                    echo "<p><b>Address</b> is:     ".$_POST["userAddress"]."</p>";
                else
                    header("Location: http://localhost:8080/php_files/PhpCourse/Day01/Form.php");
       
            }
            // else
            //     header("Form.php");
            if(isset($_POST["userCountry"]))
            {
                echo "<p><b>Country</b> is :   ".$_POST["userCountry"]."</p>";

            }
            // else
            //     header("Form.php");
            if(isset($_POST["userGender"]))
                echo "<p><b>Gender</b> is :    ".$_POST["userGender"]."</p>";
            // else
            //     header("Form.php");
            if(!empty($_POST["Skills"])){
                $skills="<p><b>Skills</b> is   :    ";
                foreach ($_POST["Skills"] as  $value) {
                    
                    $skills.=$value;
                    $skills.="   , ";
                }
                $skills.="</p>";
                echo $skills;
            }
            // else
            //     header("Form.php");
            
            if(isset($_POST["userDepartment"]))
            {
                if($_POST["userDepartment"]!=""&&!is_numeric($_POST["userDepartment"]))
                    echo "<p><b>Department</b> is ".$_POST["userDepartment"]."</p>";
                else
                    header("Location: http://localhost:8080/php_files/PhpCourse/Day01/Form.php");
            }
            // else
            //     header("Form.php");
            
            
    
        ?>
    </div>

</body>

</html>