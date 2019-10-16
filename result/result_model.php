<?php

require_once("../dbconnection/dbconnection.php");

class Result {
    
public function add_result($marks_obtained, $mobile_no)
{
    try
    {
        $reslt["marks_obtained"] = $marks_obtained;
        $reslt["mobile_no"] = $mobile_no;
        
        $conn = new Connection();
        $dbconn = $conn->getConnection();

        $insertQuery = "INSERT INTO `results` ";
        $insertQuery .= "(`marks_obtained`,`mobile_no`) ";
        $insertQuery .= " VALUES ";
        $insertQuery .= "(:marks_obtained,:mobile_no);";
        
        $preparedQuery = $dbconn->prepare($insertQuery);
        $result = $preparedQuery->execute($reslt);
        
        if ($result == 1)
            echo "<script>alert('Result has been saved successfully')</script>";
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
    
public function get_results_by_user($mobile_no)
{
    try
    {
        $conn = new Connection();
        $dbconn = $conn->getConnection();

        $selectQuery = "SELECT * FROM `results` WHERE `mobile_no` = '{$mobile_no}' ORDER BY `resultid` DESC ;";
        
        $reslts = NULL;
        foreach( $dbconn->query($selectQuery, PDO::FETCH_ASSOC) as $rslt)
        {
            $reslts[] = $rslt;
        }
        return $reslts;
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
    
} //end MCQ class

?>