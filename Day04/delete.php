<?php
     $connection = "mysql:dbname=phptask;host=127.0.0.1;port=3306;";
     $dataBaseUser="root";
     $dataBasePassword="";
 
     try
     {   
         $db = new PDO($connection,$dataBaseUser,$dataBasePassword);
             $query="delete from users where id = ? ;";
             $stmt=$db->prepare($query);
             if(isset($_GET["id"])){
                $res=$stmt->execute([$_GET["id"]]);
                if($res)
                    header("Location: http://localhost:8080/php_files/PhpCourse/Day04/home.php");
                else
                    echo "Data Can't be iserted please check where is your Error! ";
             }
               
            else
                exit;
             
             
         }
    
     catch(PDOException $e)
     {
         echo "Sorry Connection Failed Please Check Your Connection <br>".$e->getMessage();
     }