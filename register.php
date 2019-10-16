<?php
require_once("registration_model.php");
if(isset($_POST["registeruser"])){
    $registrationObject = new Registration();
    $registrationObject->register_user();
}
?>


<?php include_once("headers/header_public.php"); ?>


<div class="contents">
        <form action="#" method="post">
            <table>
                <caption><h1>User Registration Form</h1></caption>
                <tr>
                    <td><label for="mobile_no">Mobile No: </label></td>
                    <td><input type="text" name="mobile_no" size="50"/></td>
                </tr>
                <tr>
                    <td><label for="password">Password: </label></td>
                    <td><input type="password" name="password" size="50"/></td>
                </tr>
                <tr>
                    <td><label for="full_name">Full_Name: </label></td>
                    <td><input type="text" name="full_name" size="50"/></td>
                </tr>
                <tr>
                    <td><label for="email">Email: </label></td>
                    <td><input type="text" name="email" size="50"/></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><input type="submit" name="registeruser" value="    Register User    " /></td>
                </tr>
            </table>
        </form>  
</div>


</body>
</html>