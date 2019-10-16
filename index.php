<?php
require_once("registration_model.php");
if(isset($_POST["loginuser"])){
    $mobile_no = $_POST["mobile_no"];
    $password = $_POST["password"];
    $registrationObject = new Registration();
    $registrationObject->signin_user($mobile_no, $password);
}
?>


<?php include_once("headers/header_public.php"); ?>


<div class="contents">

    <form action="index.php" method="post">
        <table >
            <caption><h1>Login Form</h1></caption>
            <tr>
                <td><label for="mobile_no">Mobile No: </label></td>
                <td><input type="text" name="mobile_no" size="50"/></td>
            </tr>
            <tr>
                <td><label for="password">Password: </label></td>
                <td><input type="password" name="password" size="50"/></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" name="loginuser" value="    Login    " /></td>
            </tr>
        </table>
    </form>
</div>


</body>
</html>