<?php include_once("../headers/header_user.php"); ?>
<?php
require_once("../result/result_model.php");
$answers = $_SESSION["answers"];
$marks_obtained = NULL;
foreach($answers as $answer) {
    if($answer == 1){
        $marks_obtained += 1;
    }
}
if(isset($_POST["saveResultBtn"])){
    $resultObj = new Result();
    $mobile_no = $_SESSION["mobile_no"];
    $resultObj->add_result($marks_obtained, $mobile_no);
}
?>

<div class="contents">
<h1>You have got <?php echo $marks_obtained*10 ;?>% marks...</h1>
<form action="#" method="post">
    <input type="submit" name="saveResultBtn" value="    Save Result    " />
</form>
    <a href="../result/view_results.php">View All Results</a>
</div>

</body>
</html>