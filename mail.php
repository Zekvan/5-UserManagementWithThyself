<?php
require "connection.php";
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
?>
