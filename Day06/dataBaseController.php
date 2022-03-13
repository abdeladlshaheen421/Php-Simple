<?php
    class dataBaseController{
        public static $connection;

        public static function connectDataBase($dataBaseName)
        {
            try
            {
                dataBaseController::$connection=new mysqli("localhost","root","",$dataBaseName);
            }
            catch(PDOException $e)
            {
                $e->printMessage();
            }
        }
        public static function convertColumnToString($ArrayOfValues)
        {
            return implode(",",$ArrayOfValues);
        }
        public static function convertValuesToString($ArrayOfValues)
        {
            for ($i=0;$i<count($ArrayOfValues);$i++) 
            {
                if(!is_numeric($ArrayOfValues[$i]))
                $ArrayOfValues[$i]="'".$ArrayOfValues[$i]."'";
            }
            return implode(",",$ArrayOfValues);
        }
        public static function insertToDataBase($tableName,$columnsNames,$values)
        {
            $stringOfColumns=dataBaseController::convertColumnToString($columnsNames);
            $stringOfValues=dataBaseController::convertValuesToString($values);
            
            $query="insert into {$tableName} ({$stringOfColumns}) values ({$stringOfValues})";
           
            $statment=dataBaseController::$connection->query($query);
           
            $statment ? header("Location: loginForm.php?reg=".true): "Error";
        }
        public static function login($userData)
        { 
            $email=$userData[0];
            $password=$userData[1];
            $query="select * from users where email = '{$email}' and userPassword = '{$password}'";

            dataBaseController::$connection->query($query);
            if(dataBaseController::$connection->affected_rows>0)
            {
                setcookie("email",$email,time()+3600);
                setcookie("password",$password,time()+3600);
                return true;
            }else
            {
                return false;
            }
        }
        public static function fetchMyData($id)
        {
            $query="select * from users where id = {$id} ";
            $dataOFUserObject=dataBaseController::$connection->query($query);
            $rowOfUserData=$dataOFUserObject->fetch_assoc();
            return $rowOfUserData;
        }
        public static function deleteMyData($id)
        {
            $query="delete from users where id = {$id} ";
            $stmt=dataBaseController::$connection->query($query);
    
            if($stmt)
                return true;
            else
                return false;
            
        }
        public static function updateMyData($userNewData)
        {
            $query="update users set userName = '{$userNewData["userName"]}' , email = '{$userNewData["userEmail"]}' , roomNumber = '{$userNewData["roomNumber"]}' , floorNumber = {$userNewData["floorNumber"]} where id = {$userNewData["id"]} ";
            $stmt=dataBaseController::$connection->query($query);
            if($stmt)
                return true;
            else
                return false;
        }

    }