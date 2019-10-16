<?php
require_once("mcq_model.php");
if(isset($_POST["addmcq"])){
    $mcqObject = new MCQ();
    $mcqObject->add_mcq();
}
?>

<?php include_once("../headers/header_admin.php"); ?>

<div class="contents">
<h1>Add MCQ Form</h1>
<form action="#" method="post">
    <label for="statement">Statement:</label>
    <br/>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <textarea name="statement" cols="100" rows="5"><?php echo isset($_POST["statement"]) ? $_POST["statement"] : ""; ?></textarea>
    <br/>
    <br/>
    <label for="answer1">Answer1: </label><input type="text" name="answer1" size="50"/>
    IsCorrect? <input type="radio" name="correctanswer" value="1" />
    <br/>
    <br/>
    <label for="answer2">Answer2: </label><input type="text" name="answer2" size="50"/>
    IsCorrect? <input type="radio" name="correctanswer" value="2"/>
    <br/>
    <br/>
    <label for="answer3">Answer3: </label><input type="text" name="answer3" size="50"/>
    IsCorrect? <input type="radio" name="correctanswer" value="3"/>
    <br/>
    <br/>
    <label for="answer4">Answer4: </label><input type="text" name="answer4" size="50"/>
    IsCorrect? <input type="radio" name="correctanswer" value="4"/>
    <br/>
    <br/>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="submit" name="addmcq" value="    Add MCQ    " />
</form>
</div>

</body>
</html>