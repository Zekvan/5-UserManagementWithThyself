<meta charset="utf-8">
<?php 
require "init.php";

if (isset($_GET["code"]) && !empty($_GET["code"])) {
	$code = (string)$_GET["code"];

	$query=$connection->prepare("SELECT * FROM user where code=?");
	$query->execute(array($code));

	$count=$query->rowCount();

	if ($count > 0 ) {
		$update = $connection->prepare("UPDATE user SET active=? WHERE code=?");
		$update->execute(array("1",$code));
		if($update){
			echo "Your account has been successfully verified.Redirecting ... ";
			header("refresh:2; url=signIn.php");

		}
	}
}else
header("url=signUp.php");
?>