	<?php 
	require "init.php";
	require 'vendor/phpmailer/PHPMailerAutoload.php';

	if ($_POST) {
		if (isset($_POST['email'])) {		

			$email=$_POST['email'];

			$user = $connection->query("SELECT * FROM user WHERE email = '" . $email . "'")->fetch();

			$code = $user["code"];


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
			$mail->Body       = '<h1>Forgetten</h1>
								<strong><h2>Welcome to My First Project</h2></strong>
								http://localhost/proje4/refreshPassword.php?code='.$code;
			if(!$mail->Send()){
				
				echo "Did NOT Send Message";
			}else {
				
			}
		}
	}

	?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Forgotten</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">	
	</head>
	<body>
		<div class="container">
			<h1>Forgetten Password</h1>
			<? if(!is_null($message)): ?>
				<p><?=$message?></p>
			<? endif; ?>
			<form action="" method="post">
				<input type="email" name="email" placeholder="E-mail..">
				<input type="submit" name="Gönder"> 
			</form>
		</div>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		
	</body>
	</html>