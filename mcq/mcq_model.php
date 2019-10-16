<?php

require_once("../dbconnection/dbconnection.php");

class MCQ {
    
public function add_mcq()
{
    $mcq["statement"] = $_POST["statement"];        
    $mcq["answer1"] = $_POST["answer1"];        
    $mcq["answer2"] = $_POST["answer2"];        
    $mcq["answer3"] = $_POST["answer3"];        
    $mcq["answer4"] = $_POST["answer4"];        
    $mcq["correctanswer"] = $_POST["correctanswer"];

    try
    {
        $conn = new Connection();
        $dbconn = $conn->getConnection();

        $insertQuery = "INSERT INTO `mcqs` ";
        $insertQuery .= "(`statement`,`answer1`,`answer2`,`answer3`,`answer4`,`correctanswer`) ";
        $insertQuery .= " VALUES ";
        $insertQuery .= "(:statement,:answer1,:answer2,:answer3,:answer4,:correctanswer);";
        
        $preparedQuery = $dbconn->prepare($insertQuery);
        $result = $preparedQuery->execute($mcq);
        
        if ($result == 1)
        {
            echo "<script>alert('MCQ has been added successfully.');</script>";
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
    
public function update_mcq()
{
    $mcq["statement"] = $_POST["statement"];        
    $mcq["answer1"] = $_POST["answer1"];        
    $mcq["answer2"] = $_POST["answer2"];        
    $mcq["answer3"] = $_POST["answer3"];        
    $mcq["answer4"] = $_POST["answer4"];        
    $mcq["correctanswer"] = $_POST["correctanswer"];
    $mcq["mcqid"] = $_POST["mcqid"];
    

    try
    {
        $conn = new Connection();
        $dbconn = $conn->getConnection();

        $updateQuery = "UPDATE `mcqs` SET ";
        $updateQuery .= " `statement` = :statement , `answer1`= :answer1,`answer2` = :answer2, `answer3` = :answer3 ,`answer4` = :answer4,`correctanswer` = :correctanswer ";
        $updateQuery .= " WHERE `mcqid` = :mcqid ; ";
        
        $preparedQuery = $dbconn->prepare($updateQuery);
        $result = $preparedQuery->execute($mcq);
        
        if ($result == 1)
        {
            header("location: view_mcqs.php");
            exit;
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
    
public function get_mcqs()
{
    try
    {
        $conn = new Connection();
        $dbconn = $conn->getConnection();

        $selectQuery = "SELECT * FROM `mcqs` ORDER BY mcqid DESC ;";
        
        $mcqs = NULL;
        foreach( $dbconn->query($selectQuery, PDO::FETCH_ASSOC) as $mcq)
        {
            $mcqs[] = $mcq;
        }
        return $mcqs;
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
    
public function get_mcq($mcqid)
{
    try
    {
        $conn = new Connection();
        $dbconn = $conn->getConnection();

        $selectQuery = "SELECT * FROM `mcqs` WHERE `mcqid`= '{$mcqid}' LIMIT 1;";
        
        $mcq = NULL;
        foreach( $dbconn->query($selectQuery, PDO::FETCH_ASSOC) as $mcqq)
        {
            $mcq = $mcqq;
        }
        return $mcq;
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
    
public function delete_mcq()
{
    $mcq["mcqid"] = $_GET["mcqid"];
    
    try
    {
        $conn = new Connection();
        $dbconn = $conn->getConnection();

        $deleteQuery = "DELETE FROM `mcqs` WHERE `mcqid` = :mcqid ; ";
        
        $preparedQuery = $dbconn->prepare($deleteQuery);
        $result = $preparedQuery->execute($mcq);
        
        if ($result == 1)
        {
            echo "<script>alert('MCQ has been deleted successfully.');</script>";
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
    
    
} //end MCQ class

?>