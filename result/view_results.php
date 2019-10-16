<?php include_once("../headers/header_user.php"); ?>

<?php
require_once("../quiz/quiz_model.php");
if(isset($_POST["startQuizBtn"]))
{
    $quizObject = new Quiz();
    $mcq_ids = $quizObject->get_mcq_ids();
    shuffle($mcq_ids);
    $min = 0;
    $max = (count($mcq_ids)-1)-10;
    $random_index = rand($min, $max);
    $mcq_ids = array_slice($mcq_ids, $random_index, 10);
    $mcq_ids = implode(",",$mcq_ids);
    $mcqs = $quizObject->get_mcqs($mcq_ids);
    shuffle($mcqs);

    $_SESSION["quiz"] = $mcqs;
    $_SESSION["current_mcq_no"] = 0; // array index starts from 0;
    header("location: ../quiz/quiz.php");
    exit;
}
require_once("result_model.php");
$resultObject = new Result();
$results = $resultObject->get_results_by_user($_SESSION["mobile_no"]);
?>


<div class="contents">
<br>
<form method="post" action="#">
 <center><input type="submit" name="startQuizBtn" value="Start New Quiz" /></center>
</form>
<table cellpadding='10px' align="center" width="30%" border="1">
    <caption><h1>Results for <?php echo $_SESSION["mobile_no"]; ?></h1></caption>
        <tr>
            <th>Date Submitted</th>
            <th>Marks Obtained</th>
        </tr>
    <?php
    if(isset($results))
    {
        foreach($results as $result)
        {
        ?>
            <tr>
                <td><?php echo $result["date"]; ?></td>
                <td><?php echo $result["marks_obtained"]; ?></td>
            </tr>
        <?php 
        } // end foreach
    } // end if
    ?>
</table>
</div>
        
</body>
</html>