<?php
require_once("user_model.php");
$userObject = new User();
if(isset($_POST["updateuser"]))
{
    $userObject->update_user();
}
$user = NULL;
if(isset($_GET['mobile_no']))
{
    $user = $userObject->get_user($_GET["mobile_no"]);    
}
?>

<?php include_once("../headers/header_admin.php"); ?>

<div class="contents">
<?php
if(count($user) > 0)
{
?>
    <form action="edit_user.php" method="post">
        <table>
            <caption><h1>Edit User</h1></caption>
            <tr>
                <td><label for="mobile_number">Mobile No: </label></td>
                <td><input type="text" name="mobile_no" size="50" value="<?php echo $user["mobile_no"]; ?>" readonly /></td>
            </tr>
            <tr>
                <td><label for="password">Password: </label></td>
                <td><input type="password" name="password" size="50" value="<?php echo $user["password"]; ?>" /></td>
            </tr>
            <tr>
                <td><label for="full_name">Full Name: </label></td>
                <td><input type="text" name="full_name" size="50" value="<?php echo $user["full_name"]; ?>" /></td>
            </tr>
            <tr>
                <td><label for="email">Email: </label></td>
                <td><input type="text" name="email" size="50" value="<?php echo $user["email"]; ?>" /></td>
            </tr>
            <tr>
                <td><label for="role">Role: </label></td>
                <td><input type="text" name="role" size="50" value="<?php echo $user["role"]; ?>" /></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" name="updateuser" value="    Update User    " /></td>
            </tr>
        </table>    
    <?php
    } // end if
    ?>
</form>
</div>

</body>
</html>