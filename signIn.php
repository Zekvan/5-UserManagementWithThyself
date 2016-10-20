<?php

require "init.php";

if ($_POST) {
	if (isset($_POST["email"]) && isset($_POST["password"])) {
		
		$email    = $_POST["email"];
		$password = $_POST["password"];


		$control = $connection->prepare("SELECT * FROM user WHERE email=? and password=?");
		$control->execute(array($email,$password));
		$user = $control->fetch();


		if ($user) {
			if ($user["active"] == "0") {
				header("Location:index.php");
				$_SESSION['name'] = $user['name'];
				$_SESSION['id']   = $user['id'];
			}else{	
				$_SESSION["message"]="Please activate your account";
				header("Location: signUp.php");
			}	
		}else {
			$_SESSION["message"]="Please,Sign up";
			 header("Location: signUp.php");
		}
	}
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<? if(!is_null($message)): ?>
	<p><?=$message?></p>
<? endif; ?>
<h1>Sign In</h1>
<form action="" method="POST">
	<input type="email" name="email" placeholder="Your Email"><br>
	<input type="password" name="password" placeholder="Your Password">
	<a href="forgotten.php">Forgotten Your Password..</a><br>
	<input type="submit" name="submit" value="Sign In">
</form>

</body>
</html>