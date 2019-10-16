<?php

session_start();

if(isset($_POST['submitLogout'])){
	unset($_SESSION['mobile_no']);
	header("Location: ../index.php");
	exit;
}

if (!isset($_SESSION['mobile_no'])) {
	header("Location: ../index.php.php");
	exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>User functions</title>
	<link rel="stylesheet" href="../styles/styles.css" type="text/css">
</head>
<body>
	<header>
		<h1>Online Quiz Application</h1>
		<form action="#" method="post">
			<input type="submit" name="submitLogout" value="Logout" style="float: right; text-align: center; margin-right: 20px;">
		</form>
	</header>
	<nav>
	</nav>