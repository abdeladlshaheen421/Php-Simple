<?php 
    
    if((isset($_COOKIE["email"])&&isset($_COOKIE["password"])))
        echo "";
    else
        header("Location: loginForm.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    table {
        width: 600px;
        height: 400px;
        margin: 30px auto;
        background-color: tomato;
        padding: 10px;
    }

    table td,
    table th {
        width: 50%;
        text-align: center;
    }

    table tr:nth-child(even) {
        background-color: lightyellow;
    }

    table tr:nth-child(odd) {
        background-color: lightpink;
    }

    table tr:nth-child(1) {
        background-color: lightgreen;
        font-size: 32px;
    }

    #logout button {
        width: 150px;
        border: 2px solid #fff;
        padding: 10px;
        border-radius: 10px;
        color: white;
        background-color: red;
        text-decoration: none;
        transition: all 0.3s ease-in-out;
        font-weight: bold;
        font-size: 24px;
    }

    /* #logout button:hover {
        color: red;
    } */

    #logout :hover {
        background-color: white;
        border: 2px solid red;
        color: red;
        cursor: pointer;

    }
    </style>
</head>

<body>
    <table>
        <tr>
            <th colspan="2">User Data</th>
        </tr>
        <?php
                    if(isset($_GET["userData"]))
                    {
                        $rowOfUserData=json_decode($_GET["userData"],true);
                        
                        foreach($rowOfUserData as $key=>$value)
                        {
                            echo "<tr><th>{$key}</th><td>{$value}</td></tr>";
                        }
                    }
        ?>
        <tr>
            <form action="home.php">
                <th colspan="2" id="logout"><button type="submit">Back</button></th>
            </form>
        </tr>
    </table>
</body>

</html>