<?php 
require "init.php";
$code= (string)$_GET['code'];

$user = $connection->query("SELECT * FROM user WHERE code = $code")->fetch();

if ($_POST) {
	if ($password1 == $password2) {

		$update = $connection->prepare("UPDATE user SET password=? WHERE code= ?");
		$update ->execute(array($password1, $code ));
		if ($update) {
			echo "Update new password successfully.Redirecting...";
			header("refresh:2; url=index.php");
		}else{
			echo "Did NOT Update";
			header("refresh:2; url=signIn.php");
		}
	}else {
		echo "Are you sure you enter the same password?";
		header("refresh:2; url=forgotten.php");
	}
}else {
	header("url=signIn.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Refresh Password</title>
</head>
<body>
	<div class="container">
		<h1>Refresh Password</h1>
		<form action="" method="post">
			<input type="password" name="password1" placeholder="New Password.."><br>
			<input type="password" name="password2" placeholder="Again New Password.."><br>
			<input type="submit" name="Gönder">
		</form>
	</div>

</body>
</html>