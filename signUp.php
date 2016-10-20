<?php 

require "init.php";
if ($_POST) {
	if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["password"])) {
		
		$name     = $_POST['name'];
		$email    = $_POST['email'];
		$password = $_POST['password'];
		$active   = "0";
		$code     =  md5(mt_rand());

		// in addQuery variable, preparing this variables for database 
		$addQuery = $connection->prepare("INSERT INTO user (name, email, password, active, code) VALUES ( ?, ?, ?, ?, ?)");
		//and add database
		$isAdded = $addQuery->execute(array($name, $email, $password, $active, $code));
	}
	if ($isAdded) {
		
		require 'vendor/phpmailer/PHPMailerAutoload.php';
		
		$mail = new PHPMailer;

		
		$mail->isSMTP();                                     		// Set mailer to use SMTP
		$mail->Host       = 'cpanel04.reseller.radorehosting.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth   = true;                               	// Enable SMTP authentication
		$mail->Username   = 'zekvanarslan';                			// SMTP username
		$mail->Password   = 'xem6VlDBb2x@';                         // SMTP password
		$mail->SMTPSecure = 'ssl';                            		// Enable TLS encryption, `ssl` also accepted
		$mail->Port       = 465;                                    // TCP port to connect to
		
		$mail->setFrom('zekvanarslan@zekvanarslan.lyk2016php.com', 'Zekvan Arslan');
		$mail->addAddress($email);     								// Add a recipient   
		$mail->isHTML(true);                                  		// Set email format to HTML
		
		$mail->Subject    = 'Deneme Maili';
		$mail->Body       = '<h1>Activation</h1>
							<strong><h2>Welcome to My First Project</h2></strong>
							http://localhost/proje4/activation.php?code='.$code;
		if(!$mail->send()) {
			$_SESSION['message']="Mailer Error:". $mail->ErrorInfo;
		} else {
			$_SESSION['message']="Message has been sent";
		}
		header("Location: signIn.php");
	}else {
		$_SESSION['message']="Did NOT Sign Up.";
		header("Location:signUp.php");
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<a href=""></a>
	<meta charset="UTF-8">
	<title>Sign Up</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<? if(!is_null($message)): ?>
		<p><?=$message?></p>
	<? endif; ?>

	<h1>Sign Up</h1>

	<form  method="POST"> 

		<input type="text" name="name" placeholder="Your Name.."><br>
		<input type="email" name="email" placeholder="Your Email.."><br>
		<input type="password" name="password" placeholder="Your Password.."><br>
		<input type="submit" name="submit"><br>

	</form>
</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>