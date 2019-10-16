<?php

require_once("dbconnection/dbconnection.php");

class Registration {
    
public function register_user()
{
    $user["mobile_no"] = $_POST["mobile_no"];        
    $user["password"] = $_POST["password"];        
    $user["full_name"] = $_POST["full_name"];        
    $user["email"] = $_POST["email"];        
    $user["role"] = "user";        

    try
    {
        $conn = new Connection();
        $dbconn = $conn->getConnection();

        $insertQuery = "INSERT INTO `users` ";
        $insertQuery .= "(`mobile_no`,`password`,`full_name`,`email`,`role`) ";
        $insertQuery .= " VALUES ";
        $insertQuery .= "(:mobile_no,:password,:full_name,:email,:role);";
        
        $preparedQuery = $dbconn->prepare($insertQuery);
        $result = $preparedQuery->execute($user);
        
        if ($result == 1)
        {
            echo "<script>alert('User has been registered successfully.');</script>";
        }
        
        $dbconn = NULL;
    }
    catch (PDOException $e)
    {
        echo "<script>alert(".$e->getMessage().");</script>";
    }
    catch (Exception $e)
    {
        echo "<script>alert(".$e->getMessage().");</script>";
    }
}
    
public function signin_user($mobile_no, $password)
{
    try
    {
        $conn = new Connection();
        $dbconn = $conn->getConnection();

        $selectQuery = "SELECT `mobile_no`, `role` FROM `users` WHERE `mobile_no`= '{$mobile_no}' AND `password`= '{$password}' LIMIT 1;";
        
        $user = NULL;
        foreach( $dbconn->query($selectQuery, PDO::FETCH_ASSOC) as $userr)
        {
            $user[0] = $userr;
        }
        
        if ($user[0]["role"] == "admin"){
            session_start();
            $_SESSION['mobile_no'] = $user[0]["mobile_no"];
            $_SESSION['role'] = "admin";
            header("location: mcq/add_mcq.php ");
            exit;
        } elseif ($user[0]["role"] == "user"){
            session_start();
            $_SESSION['mobile_no'] = $user[0]["mobile_no"];
            $_SESSION['role'] = "user";
            header("location: result/view_results.php ");
            exit;
        } else {
            echo "<script>alert('mobile no or password is wrong')</script>";
        }
    }
    catch (PDOException $e)
    {
        echo "<script>alert(".$e->getMessage().");</script>";
    }
    catch (Exception $e)
    {
        echo "<script>alert(".$e->getMessage().");</script>";
    }
}
        
    
} //end Registration class

?>