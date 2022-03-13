<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="CssFiles/Formstyles.css" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Php Task 1</title>
</head>

<body>
    <div class="formContainer">
        <h2>Form With Php</h2>
        <hr>
        <form method="post" action="server.php">
            <table class="formTable">
                <!-- first Name of User -->
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
              
                <!-- address of User -->
                <tr>
                    <th>
                        <label for="userAddress">Address</label>
                    </th>
                    <td colspan="2">
                        <textarea name="userAddress" id="address" cols="30" rows="10"></textarea>
                    </td>
                </tr>
                <!-- country of User -->
                <tr>
                    <th>
                        <label for="userCountry">Country :</label>
                    </th>
                    <td colspan="2">
                        <select name="userCountry">
                            <option disabled selected>Select a Country</option>
                            <option value="Egypt">Egypt</option>
                            <option value="Egypt">Jordan</option>
                            <option value="Egypt">Palestine</option>
                            <option value="Egypt">Saudi-arbia</option>
                            <option value="Egypt">Kuwait</option>
                            <option value="Egypt">Moroco</option>
                        </select>
                    </td>
                </tr>
                <!-- Gender of User -->
                <tr>
                    <th><label>gender :</label></th>
                    <td colspan="2">
                        <input type="radio" name="userGender" value="male" checked>
                        <label>male</label>
                        <input type="radio" name="userGender" value="female">
                        <label>female</label>
                    </td>
                </tr>
                <!-- Skills of User -->
                <tr>
                    <th><label>skills</label></th>
                    <td colspan="2">
                        <input type="checkbox" name="Skills[]" value="Php" id="">
                        <label>php</label>
                        <input type="checkbox" name="Skills[]" value="J2SE" id="" checked>
                        <label>J2SE</label>
                        <br>
                        <input type="checkbox" name="Skills[]" value="MySql" id="" checked>
                        <label>mySql</label>
                        <input type="checkbox" name="Skills[]" value="PostgreeSql" id="">
                        <label>postgreeSql</label>
                    </td>
                </tr>
                <!-- userName of User -->
                <tr>
                    <th><label for="userName">user name :</label></th>
                    <td colspan="2"><input type="text" name="userName"></td>
                </tr>
                <!-- passWord of User -->
                <tr>
                    <th><label for="userPassword">user password :</label></th>
                    <td colspan="2"><input type="password" name="userPassword"></td>
                </tr>
                <!-- Department of User -->
                <tr>
                    <th><label for="userDepartment">user department :</label></th>
                    <td colspan="2"><input type="text" name="userDepartment"></td>
                </tr>
                <!-- Code of User -->
                <tr>
                    <th>Code :</th>
                    <td><label id="code">67BC54</label></td>
                    <td rowspan="2"><label>Please Could you insert this Code inside below Input</label></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="text" name="code"></td>
                </tr>
                <!-- Buttons of User -->
                <tr>
                    <td colspan="3">
                        <div class="buttons">
                            <input type="submit" value="Submit">
                            <input type="reset" value="Reset">
                        </div>

                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>