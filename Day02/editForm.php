<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CssFiles/Formstyles.css" />
    <title>Document</title>
    <style>
    table {
        width: 100%;
        border-radius: 5px;
        padding: 10px;
    }
    </style>
</head>

<body>
    <div class="formContainer">
        <form action="edit.php" method="post">
            <table>
                <!-- first Name of User -->
                <tr style="display:none;">
                    <td colspan="3"><input type="hidden" name="id" value='<?php echo $_GET["id"] ?>'></td>
                </tr>
                <tr>
                    <th>
                        <label for="userFirstName">first name :</label>
                    </th>
                    <td colspan="2">
                        <input type="text" name="userFirstName">
                    </td>
                </tr>

                <!-- last Name of User -->
                <tr>
                    <th>
                        <label for="Name">last name :</label>
                    </th>
                    <td colspan="2">
                        <input type="text" name="userLastName">
                    </td>
                </tr>
                <!-- email Name of User -->
                <tr>
                    <th>
                        <label for="userEmail">Email :</label>
                    </th>
                    <td colspan="2">
                        <input type="email" name="userEmail">
                    </td>
                </tr>
                <tr>
                    <th><label>gender :</label></th>
                    <td colspan="2">
                        <input type="radio" name="userGender" value="male" checked>
                        <label>male</label>
                        <input type="radio" name="userGender" value="female">
                        <label>female</label>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="text-align:center;padding:10px;"><input type="submit" value="Submit"></td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>