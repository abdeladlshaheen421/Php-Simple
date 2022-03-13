<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Formstyles.css" />
    <title>Document</title>
    <style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    body {
        background-image: radial-gradient(white, #124, white, #124, white);
    }

    .formContainer {
        width: 60vw;
        margin: 30vh auto;
        border: 2px solid grey;
        background-image: linear-gradient(to bottom, #fff, #fff, #fff);
        border-radius: 10px;
    }

    input {

        height: 30px;
    }

    h2 {
        text-align: center;
        font-family: monospace;
        font-size: 36px;
        background-color: #d498d4;
        color: white;
    }

    label {
        text-transform: capitalize;
    }

    .formTable {
        width: 100%;
    }

    .formTable tr td {
        padding: 10px;
        text-align: center;
    }

    textarea {
        width: 550px;
    }

    .formTable tr:nth-child(even) {
        background-color: #cf8ccf;
        margin: 0;
    }

    .formTable tr:nth-child(odd) {
        background-color: #eee0ee;
    }

    .buttons {
        text-align: center;
    }

    .buttons input {
        padding: 10px 20px;
        margin: 10px;
        margin-bottom: 0;
    }

    .formTable tr td input[type="text"],
    .formTable tr td input[type="password"] {
        width: 50%;
        border-radius: 5px;
        height: 25px;
    }

    table {
        width: 100%;
        border-radius: 5px;
        padding: 20px;
    }

    .edit {
        color: white;
        padding: 5px;
        width: 30%;
        font-size: 18px;
        font-weight: bold;
        border-radius: 10px;
        text-decoration: none;
        transition: all 1s;

    }

    .edit:hover {
        cursor: pointer;
        background-color: white;
        color: black;
    }

    .edit {
        background-color: blue;
    }

    .submit {
        width: 100%;
        margin-top: 6px;
        text-align: center;

    }
    </style>
</head>

<body>
    <?php
            if(isset($_GET['id']))
            {
                try
                {
                    $connection = new pdo("mysql:dbname=phptask;host=127.0.0.1;port=3306;","root","");
                    $dataOFUserObject=$connection->query("select * from users where id={$_GET['id']}");
                    $rowOfUserData=$dataOFUserObject->fetch(PDO::FETCH_ASSOC);
                    
                }
                catch(PDOException $e)
                {
                    $e->printMessage();
                }
                

            }
        ?>
    <div class="formContainer">
        <form action="edit.php" method="post">
            <table>

                <tr style="display:none;">
                    <td colspan="3"><input type="hidden" name="id" value='<?php echo $_GET["id"] ?>'></td>
                </tr>
                <!-- first Name of User -->
                <tr>
                    <th>
                        <label for="userName">first name :</label>
                    </th>
                    <td colspan="2">
                        <input type="text" name="userName" value="<?php echo $rowOfUserData["userName"]?>">
                    </td>
                </tr>
                <!-- email Name of User -->
                <tr>
                    <th>
                        <label for="userEmail">Email :</label>
                    </th>
                    <td colspan="2">
                        <input type="email" name="userEmail" value="<?php echo $rowOfUserData["email"]?>">
                    </td>
                </tr>
                <!-- room Number of User -->
                <tr>
                    <th>
                        <label for="roomNumber">room Number :</label>
                    </th>
                    <td colspan="2">
                        <select name="roomNumber">
                            <option value="Application1"
                                <?php  echo $rowOfUserData["roomNumber"]=="Application1" ?  " selected":"" ?>>
                                Application1</option>
                            <option value="Application2"
                                <?php  echo $rowOfUserData["roomNumber"]=="Application2" ?  " selected":"" ?>>
                                Application2
                            </option>
                            <option value="cloud"
                                <?php echo $rowOfUserData["roomNumber"]=="cloud" ?   " selected" : "" ?>>
                                Cloud</option>
                        </select>
                    </td>
                    <!-- floor Number of User -->
                <tr>
                    <th>
                        <label for="floorNumber">floor Number :</label>
                    </th>
                    <td colspan="2">
                        <input type="text" name="floorNumber" value="<?php echo $rowOfUserData["floorNumber"]?>">
                    </td>
                </tr>



                </tr>


                <tr>

                    <td colspan="3">
                        <div class="submit"><input class="edit" type="submit" value="Submit"></div>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>