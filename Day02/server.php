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
        width: 100%;
        padding: 5px;
        font-size: 22px;
        font-family: monospace;
        border: 2px solid grey;
        border-radius: 25px;
        box-shadow: 4px 6px 15px lightblue, -4px -6px 15px lightblue;
    }

    table tr td:nth-child(5),
    table tr td:nth-child(6) {
        border: 0;
    }

    .edit,
    .delete {
        color: white;
        padding: 3px;
        width: 100%;
        font-size: 18px;
        font-weight: bold;
        border-radius: 10px;
        text-decoration: none;
        transition: all 1s;
    }

    .edit:hover,
    .delete:hover {
        cursor: pointer;
        background-color: white;
        color: black;
    }



    .edit {

        background-color: blue;
    }

    .delete {
        background-color: red;
    }

    table td {
        border: 2px solid grey;
        margin: 10px;
    }
    </style>
</head>

<body>
    <h1>
        <center>Server Data</center>
    </h1>
    <div class="container">
        <?php 
            //firstName Validation
            $file="dbFile.txt";
            $datbaseFile=fopen($file,"a");
            if((isset($_POST["userFirstName"])&& isset($_POST["userLastName"])&&isset($_POST["userEmail"])&&isset($_POST["userGender"])))
            {
                    if((!is_numeric($_POST["userFirstName"])&&!is_numeric($_POST["userLastName"])) && ($_POST["userLastName"]!=""&&$_POST["userFirstName"]!=""))
                    {
                        $row=$_POST["userFirstName"].":".$_POST["userLastName"].":".$_POST["userEmail"].":".$_POST["userGender"].PHP_EOL;
                        fwrite($datbaseFile,$row);
                    }
                    else
                        header("Location: http://localhost:8080/php_files/PhpCourse/Day02/Form.php");
            }
            $datbaseFile=fopen($file,"r");
            $fileSize=filesize($file);
            $usersArray=[];
            while(!feof($datbaseFile))
            {
                array_push($usersArray,fgetcsv($datbaseFile,$fileSize,":"));
                
            }
            //$editButton="<button class='edit'>Edit</button>";
            //$deleteButton="<button class='delete' href='delete.php?id=""'>Delete</button>";
            $tableOfUsers="<table>";
            $tableOfUsers.="<tr><th>First Name</th><th>Last Name</th><th>Email</th><th>Gender</th></tr>";
            for($user=0;$user<count($usersArray)-1;$user++)
            {
                $tableOfUsers.="<tr>";
                for($j=0;$j<4;$j++)
                {
                    $tableOfUsers.="<td>";
                    $tableOfUsers.=$usersArray[$user][$j];
                    $tableOfUsers.="</td>";
                }
                //$tableOfUsers.="<td>".$editButton."</td>";
                //$tableOfUsers.="<td>".$deleteButton."</td>";
                $tableOfUsers.="<td><a class='edit' href='editForm.php?id=".$user."'>Edit</a></td>";
                $tableOfUsers.="<td><a class='delete' href='delete.php?id=".$user."'>Delete</a></td>";
                $tableOfUsers.="</tr>";
            }
            




            $tableOfUsers.="</table>";
            echo $tableOfUsers;
            fclose($datbaseFile);
            
            
    
        ?>
    </div>

</body>

</html>